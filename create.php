<?php
include 'partials/header.php';
require_once __DIR__ . '/users/users.php';

$user = [
    "id" => "",
    "name"=> "",
    "username"=> "",
    "email"=> "",
    "phone"=> "",
    "website"=> ""
];

$errors = [
    "id" => "",
    "name"=> "",
    "username"=> "",
    "email"=> "",
    "phone"=> "",
    "website"=> ""
];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $user = [...$user, ...$_POST];
    $isValid = validateUser($user, $errors);

    if($isValid){
        $user = createUser($_POST);
        
        if(isset($_FILES['picture'])){
            uploadImage($_FILES['picture'], $user['name']);
        }

        header("Location: index.php");
    }

}

?>

<?php include "_form.php"?>
<?php include 'partials/footer.php'?>