<?php

class AbstractReader
{
    protected function readFileToJsonString($fileName)
    {
        $fileContent = "";

        if (file_exists($fileName) && filesize($fileName) > 0) {
            $handle = fopen($fileName, 'r');
            $fileContent = fread($handle, filesize($fileName));

            fclose($handle);
        }
        
        return $fileContent;
    }

}