<?php
echo 'witaj!';
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/php/prosta_strona/':
        require __DIR__.'/views/home.html';
        break;
    case '':
        require __DIR__.'/views/home.html';
        break;
    case '/php/prosta_strona/Order':
        require __DIR__.'/views/about.html';
        break;
    case '/php/prosta_strona/contact':
        require __DIR__.'/views/contact.html';
        break;
    default:
        http_response_code(404);
        require __DIR__.'/views/404.html';
        break;
}