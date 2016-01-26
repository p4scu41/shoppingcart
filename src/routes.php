<?php
require_once('model/Product.php');
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
