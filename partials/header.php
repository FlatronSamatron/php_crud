<?php 
    require_once 'users/users.php';
    $users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <title>Simple php crud</title>
    <style>
        td {
         vertical-align: middle !important;
        }
    </style>
</head>
<body>

