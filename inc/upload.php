<?php
// process.php
$errors         = array();
$data           = array();

// validate the variables ======================================================
    if (empty($_POST['prototype']))
    $errors['prototype'] = 'Prototype name is required.';

    if (empty($_POST['category']))
    $errors['category'] = 'Category is required.';

    if ($_FILES['fileImage']['error'] > UPLOAD_ERR_OK)
    $errors['fileImage'] = 'Prototype image is required.';

// return a response ===========================================================
    if (! empty($errors)) {
        $data['success'] = false;
        $data['errors']  = $errors;

    } else {

        $file = $_FILES['fileImage'];

        /* Allowed file extension */
        $allowedExtensions = ["gif", "jpeg", "jpg", "png", "svg"];
        
        $fileExtension = explode(".", $file["name"]);
        
        /* Contains file extension */
        $extension = end($fileExtension);
        
        /* Allowed Image types */
        $types = ['image/gif', 'image/png', 'image/x-png', 'image/pjpeg', 'image/jpg', 'image/jpeg','image/svg+xml'];
        
        if(in_array(strtolower($file['type']), $types) 
            // Checking for valid image type
            && in_array(strtolower($extension), $allowedExtensions) 
            // Checking for valid file extension
            && !$file["error"] > 0)
            // Checking for errors if any
            { 
            if(move_uploaded_file($file["tmp_name"], $_SERVER['DOCUMENT_ROOT'].'/prototypeshelter/uploads/'.$file['name'])) {
                header('Content-Type: application/json');
                //echo json_encode(['html' => 'File Upload successfull.']);    
            } else{
                header('Content-Type: application/json');
                //echo json_encode(['html' => 'Unable to move image. Is folder writable?']);    
            }
        } else{    
            header('Content-Type: application/json');
            //echo json_encode(['html' => 'Please upload only png, jpg images']);
        }

        require_once dirname(__FILE__) . '/conn.php';
           
        $sql = "INSERT INTO prototypeshelter_JDeS(prototype, version, category, fileName) VALUES (:prototype, :version, :category, :fileName)";
           
        $stmt = $conn->prepare($sql);
                                              
        $stmt->bindParam(':prototype', $_POST['prototype'], PDO::PARAM_STR);
        $stmt->bindParam(':version', $_POST['prototypeVersion'], PDO::PARAM_STR);       
        $stmt->bindParam(':category', $_POST['category'], PDO::PARAM_STR);     
        $stmt->bindParam(':fileName', $file['name'], PDO::PARAM_STR); 

        $stmt->execute(); 

        $data['success'] = true;
        $data['successMessage'] = 'Success!';
        $data['prototypeURL'] = $_POST['prototype'];
        $data['prototypeVersion'] = $_POST['prototypeVersion'];
    }

    echo json_encode($data);
    

