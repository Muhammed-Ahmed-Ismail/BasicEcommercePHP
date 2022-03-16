<?php

// added secured remember me feature
use Illuminate\Database\Capsule\Manager;

class CookieGenerator
{
    private DatabaseConnector $DBC;
    private Manager $connection;


    function __construct()
    {
        $this->DBC = new DatabaseConnector();
        $this->connection = $this->DBC->getDbc();
    }

    /**
     *Generate tokens
     *generate two tokens selector and validator
     *
     */
    function generateToken(): array
    {

        $selector = bin2hex(random_bytes(16));
        $validator = bin2hex(random_bytes(32));


        return [$selector, $validator, $selector . ":" . $validator];
    }

    /**
     * parsing the token
     * splits the token stored in the cookie into:
     *  1) selector
     *  2) validator
     *              $validator:$selector
     */
    function parseToken(string $token): ?array
    {
        $parts = explode(':', $token);
        if ($parts && count($parts) == 2) {
            return [$parts[0], $parts[1]];
        }
        return null;
    }

    /**
     * adding new row to token table in database
     */
    function insertToken(string $selector, int $user_id, string $validator, string $expiry): bool
    {
        $hashed_validator = password_hash($validator,null);
        return $this->connection->table("token")
            ->insert(['selector' => $selector, 'hashed_validator' => $hashed_validator,
                'user_id' => $user_id, 'expiry' => $expiry]);
    }
    /**
     * delete user token
     */
    function deleteToken(int $user_id): int
    {
        return $this->connection->table("token")->delete($user_id);
    }

    /**
     * find token by a selector
     * @param string $selector
     * @return object|null
     */
    function FindTokenBySelector(string $selector): object|null
    {
        return $this->connection->table("token")
            ->where("selector", "=", ":selector")
            ->select(["selector", "hashed_validator", "user_id", "expiry"])->first();
    }

    /**
     * this function will return user_id and username bya token
     */
    function FindUserByToken(string $token){
        $tokensParts = $this->parseToken($token);
        $this->connection->table("users")
            ->join("token","user.ID","=","token.user_id")
            ->select(["ID","e_mail"])->first();
    }


    /**
     *
     */
    function isValidToken(string $token): bool
    {
        [$selector, $validator] = $this->parseToken($token);
        $tokens = $this->FindTokenBySelector($selector);
        if (!$tokens) {
            return false;
        }
        return password_verify($validator, $tokens['hashed_validator']);
    }
}
