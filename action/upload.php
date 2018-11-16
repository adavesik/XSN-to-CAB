<?php
require "../inc/CabArchive.php";
require "../config/dbconfig.php";
$configs = include('../config/config.php');


if(!empty($_POST['firstName']) || !empty($_POST['email']) || !empty($_FILES['file']['name'])){


    $temporary = explode(".", $_FILES["file"]["name"]);



    $file_extension = end($temporary);

    if(!in_array($file_extension, $configs['valid_extensions'])){
        die("Only xsn files allowed");
    }


    /* Rename both the xsn file and the extension */
    $uploadfile = tempnam_sfx($configs['uploaddir'], ".cab");


    /* Upload the file to a secure directory with the new name and extension */
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {

        /* Setup query */
        $query = 'INSERT INTO uploads (user_name, user_lastname, email, name, original_name, upload_date) VALUES (:username, :lastname, :email, :name, :oriname, now())';

        /* Prepare query */
        $stmt = $db->prepare($query);

        /* Bind parameters */
        $stmt->bindParam(':username', $_POST['firstName']);
        $stmt->bindParam(':lastname', $_POST['lastName']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':name', basename($uploadfile));
        $stmt->bindParam(':oriname', basename($_FILES['file']['name']));

        /* Execute query */
        try {
            $stmt->execute();
            echo "ok";
        }
        catch(PDOException $e){
            // Remove the uploaded file
            unlink($uploadfile);
            die("Error!: " . $e->getMessage());
        }
    } else {
        echo "err";
        die("XSN upload failed!");
    }


    $cab = new CabArchive('/var/www/html/music/storage/'.basename($uploadfile));
    $cab->extract($configs['xmldir'], $configs['files_to_be_extracted']);
    //print_r($cab->getFileNames());
}


/* Generates random filename and extension */
function tempnam_sfx($path, $suffix){


    if(!is_dir($path)){
        mkdir($path, 0777, true);
    }

    do {
        $file = $path . DIRECTORY_SEPARATOR . mt_rand () . $suffix;
    } while (file_exists($file));

    return $file;
}
?>