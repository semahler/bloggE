<?php

class PictureManager
{
    protected $directoryPath;
    protected $pictureFileName;

    /**
     * PictureManager constructor.
     */
    public function __construct()
    {
        $this->directoryPath = UPLOAD_DIR;
    }

    /**
     * Uploading a picture to the upload-directory
     *
     * @param array $picture
     * @return int
     */
    public function uploadPicture(array $picture)
    {
        if (!$this->checkUploadDirectory()) {
            $this->createUploadDirectory();
        }

        $this->pictureFileName = $this->directoryPath . basename($picture['name']);

        if ((($picture['size']/1024) > PICTURE_UPLOAD_MAX_FILESIZE) || ($picture['error'] == 1)) {
            return 1;
        }

        if (!in_array($picture['type'], PICTURE_UPLOAD_FILETYPES)) {
            return 2;
        }

        if ($picture['error'] != 0) {
            return 3;
        }

        move_uploaded_file($picture['tmp_name'], $this->pictureFileName);

        return 0;
    }

    /**
     * Read out all pictures from the upload-directory
     *
     * @return array
     */
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

    /**
     * Delete a picture from the server
     *
     * @param string $fileName
     */
    public function deletePicture($fileName)
    {
        $pictureFile = $this->directoryPath . '/' . $fileName;
        if (file_exists($pictureFile)) {
            @unlink($pictureFile);
        }
    }

    /**
     * Check, if the defined upload directory exists
     *
     * @return bool
     */
    protected function checkUploadDirectory()
    {
        if(!is_dir($this->directoryPath)) {
            return false;
        }

        return true;
    }

    /**
     * Create the upload directory
     */
    protected function createUploadDirectory()
    {
        mkdir($this->directoryPath, 0755, true);
    }

    /**
     * Collect some information for a picture
     *
     * @param string $file
     * @return array
     */
    protected function preparePictureData($file) {
        $picture = [];

        $picture['name'] = $file;
        $picture['path'] = $this->getRelativePicturePath(UPLOAD_DIR . $file);

        $filesize = $this->getFormattedFileSizeForFile($this->directoryPath . $file);
        $picture['size'] = $filesize;

        return $picture;
    }

    /**
     * Converts the filesize in byte to a human readable format
     *
     * @param string $file
     * @return string
     */
    protected function getFormattedFileSizeForFile($file)
    {
        $filesize = filesize($file);

        $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $filesize > 0 ? floor(log($filesize, 1024)) : 0;

        return number_format($filesize / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }

    /**
     * Get the relative-path of a picture
     *
     * @param string $picturePath
     * @return mixed|string
     */
    protected function getRelativePicturePath($picturePath)
    {
        $picturePath = SUB_DIR . '/' . $picturePath;

        return $picturePath;
    }
}