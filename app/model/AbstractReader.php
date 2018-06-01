<?php

class AbstractReader
{
    protected function readFileToJsonString($fileName)
    {
        $fileContent = "";

        $handle = fopen($fileName, 'r');

        $fileContent = fread($handle, filesize($fileName));
        fclose($handle);

        return $fileContent;
    }

}