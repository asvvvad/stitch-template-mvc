<?php declare(strict_types=1);

// include the Composer autoloader
require '../data/vendor/autoload.php';

// New Stitch instance.
// The only parameter to be passed is the data directory
$stitch = new Stitch('../data');

try {
	$stitch->run();
} catch (\Throwable $th) {
	throw $th;
}