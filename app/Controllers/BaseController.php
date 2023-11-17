<?php
class BaseController
{
    const VIEW_FOLDER_NAME = 'app/Views';
    const MODEL_FOLDER_NAME = 'app/Models';
    const UPLOAD_FOLDER_NAME = 'public/uploads/';

    protected function view($path, array $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        return require(self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $path) . '.php');
    }

    protected function model($path)
    {
        return require(self::MODEL_FOLDER_NAME . '/' . $path . '.php');
    }

    protected function upload_image(array $images = [], $oldImage = "")
    {
        $quantityImages = count($images['name']);
        $arrNameImages = [];
        for ($i = 0; $i < $quantityImages; $i++) {
            $image = self::UPLOAD_FOLDER_NAME . $images['name'][$i];
            $arrNameImages[] = $image;
            move_uploaded_file($images['tmp_name'][$i], $image);
        }
        $strNameImages = implode(",", $arrNameImages);
        if ($oldImage != "") {
            return $oldImage . "," . $strNameImages;
        }
        return $strNameImages;
    }
}