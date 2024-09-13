<?php

require './vendor/autoload.php';

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

// create new manager instance with desired driver
$manager = new ImageManager(new Driver());

$name = 'Rahul Kumar';
$address = '123 Main Street';
$flyer = base_url('assets/images/flyer.png');
$logo = base_url('assets/images/logo.png');
$footer = base_url('assets/images/footer.png');

?>

<div class="text-red-600">
	Hello world
</div>
