<?php
include_once 'controler/mainControler.php';
$request = $_SERVER['REQUEST_URI'];
// switch ($request) {
//     case '/':
//         require __DIR__ . '/views/home.html';
//         break;
//     case '':
//         require __DIR__ . '/views/home.html';
//         break;
//     case '/orders':
//         require __DIR__ . '/views/orders.html';
//         break;
//     case '/contact':
//         require __DIR__ . '/views/contact.html';
//         break;
//     default:
//         http_response_code(404);
//         require __DIR__ . '/views/404.html';
//         break;
// }
$page = new mainControler();
$page->loadView($request);
