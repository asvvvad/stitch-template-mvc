<?php

// Setting the error handler is required
// unless you're okay with a blank page and only the status code being returned.
// It's easy to make as it is made to be just like a route:
Stitch::setErrorHandler(function(array $vars) : array{
    return [
        'view' => 'error',
        'data' => [
            'code' => $vars['code'],
            'error' => $vars['full'],
            'title' => $vars['code'].':'. $vars['full'],
            'description' => $vars['code'] == 404 ? 'This page doesn\'t exist.' : 'HTTP method not allowed',
        ]
    ];
});