<?php

$errors = [];

if (!empty($errors)) {
    return view("registration/show", [
        'errors' => $errors
    ]);
}

header("location: /");
die();