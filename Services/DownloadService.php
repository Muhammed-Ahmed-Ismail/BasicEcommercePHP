<?php

class DownloadService{
    /**
     * generate random string
     * @param int $length : default = 10
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
     * rename string (not needed but kept for reference and possible future feature
     * @param string $oldname is the name of the file that you want to rename.
     * @param string $newname is the new name of the file.
     * @param string $context is a valid context resource
     * @return bool success ? true : false
     */
    /** rename ( string $oldname , string $newname , resource $context = ? ) : bool */

    function renameString(string $oldName, string $newName) : bool
    {
        if (rename($oldName, $newName)) {
            $message = sprintf(
                'The file %s was renamed to %s successfully!',
                $oldName,
                $newName
            );
            echo $message;
            return true;
        } else {
            $message = sprintf(
                'There was an error renaming file %s',
                $oldName
            );
            echo $message;
            return false;
        }
    }



    /**
     * Download with curl.
     * curl download the file without permission, link, or notification
     * @param string $url
     * @return void
     */
    function donwloadWithCurl(string $url)
    {
        // Initialize the cURL session
        $ch = curl_init($url);

        // Initialize directory name where
        // file will be save
        $dir = './';

        // Use basename() function to return
        // the base name of file
        $file_name = basename($url);

        // Save file into file location
        $save_file_loc = $dir . $file_name;

        // Open file
        $fp = fopen($save_file_loc, 'wb');

        // It set an option for a cURL transfer
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Perform a cURL session
        curl_exec($ch);

        // Closes a cURL session and frees all resources
        curl_close($ch);

        // Close file
        fclose($fp);
    }

    /**
     * @param string $Downloadlink
     * @return void
     */
    function donwloadWithHref(string $Downloadlink)
    {
        echo "<p><a href= $Downloadlink > new download link </a></p>";
    }

    /**
     * @param string $pathToTheFile
     * @param string $fileName
     * @return string
     */
    function symLinkCreator(string $pathToTheFile, string $fileName): string
    {
        $targetName = $pathToTheFile . $fileName;
        $linkName = $this->generateRandomString() . ".zip";

        $test = symlink($targetName, $linkName);

        return $test? $linkName : "failed";

    }

}