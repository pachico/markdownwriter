<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter\Document;
use League\Flysystem\Adapter;
use Pachico\MarkdownWriter\Element as El;

// Create Document
$document = new Document;

// Create a link
$link = new El\Link('Markdown Writer!', 'https://github.com/pachico/markdownwriter');

// Add it to the document
$document->add($link);

$adapter = new Adapter\Local(__DIR__);
$document->save($adapter, basename(__FILE__, 'php') . 'md');
