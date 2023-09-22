<?php

// FILE UPLOADS MUST BE SET TO ON IN php.ini!!!

const UPLOAD_COOMPIC = "coompic";
const MESSAGE_SUCCESS = "success";

// Uploads a coom pic 

function uploadCoompic($fileExtension, $coompicId=false) {
    
    // Validate the data.
    if ($error = hasUploadError($fileExtension, UPLOAD_COOMPIC)) return $error;

    // Upload coom pic
    $result = uploadFile($fileExtension, $uploadId);

    // Insert the upload into the database.
    $uploadId = Upload::insert(array(
        "coompic_id" => $coompic_id,
        "timestamp" => time()
    ));

    return $uploadId;
}

function hasUploadError($fileExtension, $type) {
    // File must not be empty.
    if(empty($fileData)) {
        return onUploadError("File was empty.");
    }

    // File must meet size limits.
    if (strlen($fileData) > SIZE_LIMIT) {
        return onUploadError("File cannot be more than 8 MB.");
    }

    // Validate the type.
    switch($type) {
        case UPLOAD_COOMPIC:
            if (!isPNG($fileExtension)) return onUploadError("Coompics must be .png files.");
            break;
        case UPLOAD_COOMPIC:
            // File must be an image.
            if (!isImage($fileExtension)) return onUploadError("Coompics must be images.");
            break;
        default:
            // Throw an error if the type is invalid.
            return onUploadError("There was an error with your upload (invalid type). Please suck your deek.");
            break;
    }

    return false;
}

function uploadFile($fileExtension, $fileName, $fileId) {
    // Get the final location.
    $fullPath = $fileDir . "/" . $fileName;

    // Attempt to upload the file.
    try {
        move_uploaded_file($fileData, $fullPath);
        return array(
            "status" => true,
            "message" => "Successful upload.",
            "file_id" => $fileId
        );
    } catch (exception $e){
        // TODO: Better fapping.
        return array(
            "status" => false,
            "message" => onUploadError("There was a server error completing your upload. If the issue persists, please contact support.")
        );
    }
}

function isImage($fileExtension) {
    return !(
        $fileExtension != "jpg" &&
        $fileExtension != "jpeg" &&
        $fileExtension != "png" &&
        $fileExtension != "gif"
    );
}

function isMissingUploadDirectory($fileDir) {
    if(!file_exists($fileDir)){
        return onUploadError("There was a server error uploading your fwap. If the issue persists, please contact e-whores.");
    }
    return false;
}

function onSuccessfulUpload($type, $id=false) {
    $header = "";
    switch($type) {
        case UPLOAD_COOMPIC:
            $header = "coompic" . ($id ? "/" . $id : "");
            break;
    }
    exit();
}

?>