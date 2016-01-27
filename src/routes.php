<?php
require_once('model/Product.php');
require_once('model/Shoppingcart.php');
require_once('model/Purchase.php');

// Routes

// View HTML -> Index [Home]
$app->get('/', function ($request, $response, $args) {
    return $this->renderer->render($response, 'index.php', $args);
});

// REST
// Get Products
// Return array of products
$app->get('/products', function ($request, $response, $args) {
    return json_encode(Product::getAll());
});

// Get Product
// Return a specific product
$app->get('/product/{id}', function ($request, $response, $args) {
    return json_encode(Product::get($args['id']));
});

// Put Product
// Add product to the shopping cart
$app->put('/shoppingcart/{id}', function ($request, $response, $args) {
    Shoppingcart::addProduct($args['id']);

    return json_encode(Shoppingcart::countProducts());
});

// Get Shopping Cart
// Get detaills of the shopping cart
$app->get('/shoppingcart', function ($request, $response, $args) {
    return json_encode(Shoppingcart::getDetaills());
});

// Delete Shopping Cart
// Clean shopping cart
$app->delete('/shoppingcart', function ($request, $response, $args) {
    return json_encode(Shoppingcart::clean());
});

// Delete Product Shopping Cart
// Remove a specific product of the shopping cart
$app->delete('/shoppingcart/{id}', function ($request, $response, $args) {
    Shoppingcart::removeProduct($args['id']);

    return json_encode(Shoppingcart::countProducts());
});

// Get Count Shopping Cart
// Return the count of products in the shopping cart
$app->get('/shoppingcart/count', function ($request, $response, $args) {
    return json_encode(Shoppingcart::countProducts());
});

// Post Quantity Product
// Update quantity of the product in shopping cart
$app->post('/shoppingcart/{id}', function ($request, $response, $args) {
    $data = $request->getParsedBody();

    return json_encode(Shoppingcart::updateQuantityProduct($args['id'], $data['quantity']));
});

// Post Shopping Cart
// Purchase shopping cart
$app->post('/shoppingcart', function ($request, $response, $args) {
    $data = $request->getParsedBody();

    if (count($data['shoppingcart']['products'])) {
        $purchase = new Purchase();

        $purchase->loadPropierties($data);

        Shoppingcart::clean();

        return json_encode(true);
    }
});