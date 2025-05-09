<?php

// log in the user if the credentials match.

use Core\Validator;
use Http\Forms\LoginForm;
use Core\Authenticator;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$SignedIn = (new Authenticator())->attempt($attributes['email'], $attributes['password']);

if (!$SignedIn) {
    $form->error('email', 'No matching account found for that email address and password.')->throw();
}

redirect('/');






