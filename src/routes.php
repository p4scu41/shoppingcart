<?php
// Routes

// View HTML -> Index [Home]
$app->get('/', function ($request, $response, $args) {
    return $this->renderer->render($response, 'index.php', $args);
});

