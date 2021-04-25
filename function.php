<?php 

function old($inputName) {
    if(isset($_POST[$inputName])) {
        return $_POST[$inputName];
    }else {
        return "";
    }
}

function textFilter($text) {
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripcslashes($text);
    return $text;
}

function setError($inputName,$message) {
    $_SESSION['error'][$inputName] = $message;
}

function getError($inputName) {
    if(isset($_SESSION['error'][$inputName])) {
        return $_SESSION['error'][$inputName];
    }else {
        return "";
    }
}

function clearError() {
    $_SESSION['error'] = [];
}






function register() {

    $errorStatus = 0;

    global $conn;


    $name = "";
    $email = "";
    $phone = "";
    $upload = "";



    if(empty($_POST['name'])){
        setError("name","Name is required");
        $errorStatus = 1;
    }else {
        if(strlen($_POST['name']) < 5) {
            setError("name","Name is too short");
            $errorStatus = 1;
        }else {
            if(strlen($_POST['name']) > 20) {
                setError("name","Name is too long");
                $errorStatus = 1;
            }else {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])) {
                    setError("name","Only letters and white space allowed");
                    $errorStatus = 1;
                  }else {
                      $name = textFilter($_POST['name']);
                  }
            }

        }
    }

    if(empty($_POST['email'])){
        setError("email","Email  is required");
        $errorStatus = 1;
    }else{
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError("email","Email format incorrect");
            $errorStatus = 1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }

    if(empty($_POST['phone'])){
        setError("phone","Phone  is required");
        $errorStatus = 1;
    }else{
        if(!preg_match("/^[0-9 ]*$/",$_POST['phone'])){
            setError("phone","phone format incorrect");
            $errorStatus = 1;
        }else{
            $phone = textFilter($_POST['phone']);
        }
    }

    

    
    $supportFileType = ['image/jpeg','image/png'];
    

    
    if(isset($_FILES['upload']['name'])){
        $tempFile = $_FILES['upload']['tmp_name'];
        $fileName = $_FILES['upload']['name'];
        if(in_array($_FILES['upload']['type'],$supportFileType)){
            $saveFolder = "store/";
            //This function use for moving file to new place .
            $newName = $saveFolder.uniqid().$fileName;
            if(move_uploaded_file($tempFile,$newName)) {
                
            }
        }else{
            setError("upload","File is required");
            $errorStatus = 1;
        }
    }else{
        setError("upload","File  is incorrect");
        $errorStatus = 1;
    }





    if(!$errorStatus) {
        // print_r($_POST);
        $sql = "INSERT INTO contacts (name,phone,email,photo) VALUES ('$name','$phone','$email','$newName')";
        if (mysqli_query($conn,$sql)){
            header("location:read.php");
            // echo "Aung p";
            // die($sql);
        }else{
            
        }
        // print_r($_FILES);

    }
}