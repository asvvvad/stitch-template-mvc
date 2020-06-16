<?php

/* You're not obliged to use controllers even when using MVC method. */

// HTML 
Stitch::get('/handle', 'This route has been <em>handled</em>');

// Voila! function as a service in one line.
Stitch::get('/uppercase', isset($_GET['text']) ? strtoupper($_GET['text']) : 'Pass the text as a GET parameter.');

// You can use all methods supported by FastRoute
// POST request support JSON data so to test you can:
Stitch::post('/echo[/{name}]', function (array $vars) : array {
	return [
		'body' => [
			'success' => isset($_POST['message']),
			'message' => $_POST['message'] ?? 'Message not specified',
			'name' => $vars['name'] ?? 'Name not set',
		],
		'status_code' => isset($_POST['message']) ? 200 : 400
	];
});

// HTTP Redirects / custom status code
// Redirects are made easy! simply set redirect to the uri you want
// There is no default redirect HTTP code sent by Stitch so set your own
// depending on the situation by setting status_code to the appropriate code
// status_code isn't limited to any method or body type and can be used in all calls to addRoute
Stitch::get('/old', function () : array {
	return ['redirect' => '/', 'status_code' => 301];
});

// HTTP headers
Stitch::post('/headers', function () : array {
    return ['header' => ['ONION-ADDRESS', 'asvvvadzqpxmkfjc.onion']];
});


// Different content types
// You can easily set custom headers and override ones set by the server
// This may be used to output content Custom headers & dother than HTML (images, file downloads, pdf documents, etc.)

Stitch::get('/image', function () : array {
    return ['body' => file_get_contents($_ENV['STATIC_DATA'] . '/img/pfp.png'), 'headers' => ['content-type' => 'image/png']];
});