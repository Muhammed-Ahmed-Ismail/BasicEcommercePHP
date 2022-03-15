<?php
/**
* generate random string
* @param int $length: default = 10
* @return int
*/
function generateRandomString(int $length = 10) : int
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Create a random name symlink
 * @param string $pathToTheFile
 * @param string $fileName
 * @return string
 */
function symLinkCreator(string $pathToTheFile, string $fileName): string
{
    $targetName = $pathToTheFile . $fileName;
    $linkName = generateRandomString() . ".zip";
    $test = symlink($targetName, $linkName);
    if($test){
        return $linkName;
    }else{
        return "error";
    }
}