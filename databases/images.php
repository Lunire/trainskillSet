<?php

function uploadImage($fileInputName)
{
    $statusMsg = "";
    $targetDIR = __DIR__ . "/../public/uploads/";

    if (!empty($_FILES[$fileInputName]["name"])) {
        $fileName = basename($_FILES[$fileInputName]["name"]);
        $targetFilePath = $targetDIR . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg');

        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetFilePath)) {
                $insert = getConnection()->query("INSERT INTO images(file_name, uploaded_on) VALUES ('$fileName', NOW())");

                if ($insert) {
                    $statusMsg = "The file " . $fileName . " has been uploaded.";
                } else {
                    $statusMsg = "Sorry, there was an error saving file info to the database.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading the file.";
            }
        } else {
            $statusMsg = "Sorry, only JPG, JPEG, and PNG files are allowed.";
        }
    } else {
        $statusMsg = "Please select a file to upload.";
    }

    return $statusMsg;
}