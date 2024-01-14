<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only("auth");
$router->post('/notes', 'notes/store.php');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');
$router->patch('/note', 'notes/update.php');
$router->get('/note/edit', 'notes/edit.php');
$router->get('/note/create', 'notes/create.php');

$router->get('/register', 'registration/show.php')->only("guest");
$router->post('/register', 'registration/store.php');

$router->get('/login', 'session/create.php')->only("guest");
$router->post('/login', 'session/store.php')->only("guest");
$router->delete('/logout', 'session/destroy.php')->only("auth");