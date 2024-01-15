<?php
include 'partials/header.php';
require_once __DIR__ . '/users/users.php';

if(!isset($_GET['id'])){
    include 'partials/not_found.php';
    exit;
}

$userId = $_GET['id'];
$user = getUserById($userId);

if($user){
    $user = $user[0];
}

$errors = [
    "id" => "",
    "name"=> "",
    "username"=> "",
    "email"=> "",
    "phone"=> "",
    "website"=> ""
];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $isValid = validateUser([...$_GET,...$_POST], $errors);

    if($isValid){
        updateUser($user, $userId, null);
        
        if(isset($_FILES['picture'])){
            uploadImage($_FILES['picture'], $user['name']);
        }

        header("Location: index.php");
    }
}

?>

<?php include "_form.php"?>
<?php include 'partials/footer.php'?>