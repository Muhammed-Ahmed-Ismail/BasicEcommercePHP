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