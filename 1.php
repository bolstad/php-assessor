<?php 

require_once __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload

use Assessor\Validate;

$staticHtmlFile = "/tests/testdata/aftonbladet.html";
$html = file_get_contents(__DIR__ . $staticHtmlFile);

$html = 'http://karamell.net';
$validator = new Validate($html);
echo $validator->getTitle() . "\n";

$html = 'http://aftonbladet.se';
$validator = new Validate($html);
echo $validator->getTitle() . "\n";
