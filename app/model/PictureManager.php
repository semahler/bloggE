<?php

class PictureManager
{
    protected $directoryPath;
    protected $pictureFileName;

    public function __construct()
    {
        $this->directoryPath = UPLOAD_DIR;
    }

    public function uploadPicture(array $picture)
    {
        if (!$this->checkUploadDirectory()) {
            $this->createUploadDirectory();
        }

        $this->pictureFileName = $this->directoryPath . basename($picture['name']);

        move_uploaded_file($picture['tmp_name'], $this->pictureFileName);
        // ToDo: Fehlerbehandlung
    }

    public function getUploadedPictures()
    {
        $pictures = [];

        if ($this->checkUploadDirectory()) {
            $handle = opendir($this->directoryPath);

            while ($file = readdir($handle)) {
                if (is_file($this->directoryPath . $file)) {
                    $picture = $this->preparePictureData($file);

                    $pictures[] = $picture;
                }
            }

            closedir($handle);
        }

        return $pictures;
    }

    public function deletePicture($fileName)
    {
        $pictureFile = $this->directoryPath . '/' . $fileName;
        if (file_exists($pictureFile)) {
            @unlink($pictureFile);
        }
    }

    protected function checkUploadDirectory()
    {
        if(!is_dir($this->directoryPath)) {
            return false;
        }

        return true;
    }

    protected function createUploadDirectory()
    {
        mkdir($this->directoryPath, 0755, true);
    }

    protected function preparePictureData($file) {
        $picture = [];

        $picture['name'] = $file;
        $picture['path'] = $this->getRelativePicturePath(UPLOAD_DIR . $file);

        $filesize = $this->getFormattedFileSizeForFile($this->directoryPath . $file);
        $picture['size'] = $filesize;

        return $picture;
    }

    protected function getFormattedFileSizeForFile($file)
    {
        $filesize = filesize($file);

        $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $filesize > 0 ? floor(log($filesize, 1024)) : 0;

        return number_format($filesize / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }

    protected function getRelativePicturePath($picturePath)
    {
        $picturePath = str_replace(APPLICATION_ROOT_DIR, "", $picturePath);
        $picturePath = "/" . $picturePath;

        return $picturePath;
    }
}