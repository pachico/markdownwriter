<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter\Document;
use League\Flysystem\Adapter;
use Pachico\MarkdownWriter\Element as El;

// Create Document
$document = new Document;

// Create an image element
$image = new El\Image(
    'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Markdown-mark.svg/208px-Markdown-mark.svg.png', // path
    'https://es.wikipedia.org/wiki/Markdown', // link
    'Markdown logo', // alt text
    'Markdown logo' // title
);

// link, alt text and title are optional parameters

// Add it to the document
$document->add($image);

$adapter = new Adapter\Local(__DIR__);
$document->save($adapter, basename(__FILE__, 'php') . 'md');
