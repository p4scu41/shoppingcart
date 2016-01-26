<?php
require_once('model/Product.php');
require_once('model/Shoppingcart.php');

// Routes

// View HTML -> Index [Home]
$app->get('/', function ($request, $response, $args) {
    return $this->renderer->render($response, 'index.php', $args);
});

// REST
// Get Productos
$app->get('/products', function ($request, $response, $args) {
    return json_encode(Product::getAll());
});

$app->get('/product/{id}', function ($request, $response, $args) {
    return json_encode(Product::get($args['id']));
});

$app->put('/shoppingcart/{id}', function ($request, $response, $args) {
    Shoppingcart::addProduct($args['id']);

    return json_encode(Shoppingcart::countProducts());
});

$app->get('/shoppingcart', function ($request, $response, $args) {
    return json_encode(Shoppingcart::getDetaills());
});

$app->delete('/shoppingcart', function ($request, $response, $args) {
    return json_encode(Shoppingcart::clean());
});

$app->delete('/shoppingcart/{id}', function ($request, $response, $args) {
    Shoppingcart::removeProduct($args['id']);

    return json_encode(Shoppingcart::countProducts());
});

$app->get('/shoppingcart/count', function ($request, $response, $args) {
    return json_encode(Shoppingcart::countProducts());
});