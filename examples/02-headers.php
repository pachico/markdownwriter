<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter\Document;
use League\Flysystem\Adapter;
use Pachico\MarkdownWriter\Element as El;

// Create Document
$document = new Document;

// Add Header elements
$document
    ->add(new El\H1('This is a H1 header.'))
    ->add(new El\H2('This is a H2 header.'))
    ->add(new El\H3('This is a H3 header.'))
    ->add(new El\H4('This is a H4 header.'))
    ->add(new El\H5('This is a H5 header.'))
    ->add(new El\H6('This is a H6 header.'))
;

$adapter = new Adapter\Local(__DIR__);
$document->save($adapter, basename(__FILE__, 'php') . 'md');