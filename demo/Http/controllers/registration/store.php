<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);

// validate the form inputs
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// check if the account already exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // then this user with that email already exists and has an account
    // If yes, redirect to a login page
    header('location: /');
    exit();
} else {
    // If not, save one to the database, and then log the user in, and redirect.
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // mark that the user has logged in
    login($user);

    header('location: /');
    exit();
}
