<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
function test_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$errorMessages = [
    "ID" => "ID must be 2 upper letters followed by 8 digits",
    "first" => "Please enter your first name",
    "last" => "Please enter your last name",
    "age" => "Age must be <19",
    "email" => "Please enter a valid email address",
    "password" => "Please enter a valid password",
    "address" => "Please enter a valid address",
    "state" => "Please select a state",
    "gender" => "Please select a gender",
    "Community" => "Please select at least one community"
];

if(isset($_POST['submit'])){
    $errors=[];
    if (isset($_GET['Id'])) {
        $id = $_GET['Id'];
        if (preg_match('~^[A-Z]{2}\d{8}$~', $id) == 0) {
            $errors['ID'] = $errorMessages["ID"];
        }
    }
    else {
        echo("ZBi");
        exit();
    }
    $Age= $_POST['Age'];
    if($Age < 19){
        $errors['Age']=$errorMessages["age"];
    }

    $FirstName=$_POST["FirstName"];
    if(empty($FirstName)) {
        $errors["first"] = $errorMessages["first"];
    }

    $LastName=$_POST["LastName"];
    if(empty($LastName)) {
        $errors["last"] = $errorMessages["last"];
    }

    $Email=$_POST["Email"];
    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = $errorMessages["email"];
    }

    $Password=$_POST['Password'];
    if(empty($Password) || strlen($Password) < 10) {
        $errors["password"] = $errorMessages["password"];
    }

    $Adress=$_POST['Adress'];
    if(empty($Adress)) {
        $errors["address"] = $errorMessages["address"];
    }

    $State=$_POST['State'];
    if(empty($State)) {
        $errors["state"] = $errorMessages["state"];
    }

$gender=$_POST['Gender'];
    if(isset($_POST['Gender'])) {
        $gender = $_POST['Gender'];
    }else{
        $errors["gender"]=$errorMessages["gender"];
    }

    if(empty($_POST['Community'])) {
        $errors["Community"] = $errorMessages["Community"];
    }

    if(empty($errors)){
        require_once("connect.php");
        $choice= implode(',',$_POST['Community']);
        $sql = "UPDATE bdf SET Id='$id', FirstName='$FirstName', LastName='$LastName', Email='$Email', Age='$Age', Community='$choice', Gender='$gender' WHERE Id='$id'";
        if (!empty($conn)) {
            $req = mysqli_query($conn, $sql);
        }
        else {
            echo("sike no conn");
        }
        if ($req) {
            header("location:views.php");
            exit();
        } else {
            echo "Error updating record: " ;
        }
    }
}


