<?php

class FileUploader
{
    private static array $file;
    private static string $fileName;
    private static string $filePath;

    /**
     * @return mixed
     */
    public static function getFileName(): string
    {
        return self::$fileName;
    }

    /**
     * @return mixed
     */
    public static function getFilePath(): string
    {
        return self::$filePath;
    }


    /**
     * Upload selected file from client to server and add it to Static/upload directory`
     */
    public static function uploadSelectedFile()
    {
        $file = $_FILES['selectedFile'];
        $name = $file['name'];
        $tmpName = $file['tmp_name'];
        $extension = explode('.', $name);
        $extension = strtolower(end($extension));

        // Temp file details
        $key = sha1(uniqid());
        self::$fileName = $name;
        self::$filePath = "./Static/uploads/" . $name;

        // Move file
        move_uploaded_file($tmpName, self::$filePath);
    }

}