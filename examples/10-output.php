<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter\Document;
use League\Flysystem\Adapter;

// Create Document
$document = new Document();

//...

// To fetch the markdown as a string simply
$markdown = $document->toMarkdown();

// To save it somewhere we use the great FlySystem abstraction layer:
// Define file system adapter
$adapter = new Adapter\Local(__DIR__);

// Inject it to the save method and it will be persisted
$document->save($adapter, basename(__FILE__, 'php') . 'md');

// Check http://flysystem.thephpleague.com/ to see the adapters list