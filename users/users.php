<?php
declare(strict_types=1);

function getUsers(): array {
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function getUserById(string $id): array {
    $users = getUsers();
    return array_values(array_filter($users, fn($user)=> $user['id'] == $id));
}

function createUser($data){
    $users = getUsers();
    $data['id'] = rand(100, 1000) + time();

    $users[] = $data;

    putJson($users);

    return $data;
}

function updateUser(array $data, string | int $id, string | null $extention): void {
    $users = getUsers();
    $updateUsers = array_map(function($user) use ($data, $id, $extention){
        if($user['id'] === +$id){
            $newUser = [...$user,...$data];
            if($extention){
                $newUser['extension'] = $extention;
            }
            return $newUser;
        } else {
            return $user;
        }
    }, $users);

    putJson($updateUsers);
}

function deleteUser(string $id): void{
    $users = getUsers();
    $newUsers = array_filter($users, fn($user)=> $user['id'] !== +$id);
    putJson($newUsers);
}

function uploadImage(array $file, string $name): void {
    $user = [...array_filter(getUsers(), fn($item) => $item['name'] === $name)][0];

    $userId = $user['id'];

    if(!is_dir(__DIR__ . "/images")){
        mkdir(__DIR__ . "/images");
    }

    $fileName = $file['full_path'];
    echo $fileName;
    $dotPosition = strpos($fileName, '.');
    $extention = substr($fileName, $dotPosition+1);
    move_uploaded_file($file['tmp_name'], __DIR__ . "/images/{$userId}.$extention");
    updateUser($user, $userId, $extention);
}

function putJson($updateUsers){
    file_put_contents(__DIR__ . '/users.json', json_encode($updateUsers, JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors){
    list($id, $name, $username, $email, $phone, $website) = array_values($user);

    if(!$name) $errors['name'] = "Name is required";
    if(!$username) $errors['username'] = "Username is required";
    if(!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Email is required or Email not valid";
    if(!$phone) $errors['phone'] = "Phone is required";
    if(!$website) $errors['website'] = "Website is required";

    return $name && $username && $email && filter_var($email, FILTER_VALIDATE_EMAIL) && $phone && $website && $isValid = true;;
}