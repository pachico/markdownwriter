<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter\Document;
use League\Flysystem\Adapter;
use Pachico\MarkdownWriter\Element as El;

// Create Document
$document = new Document;

// Create a list
$list = new El\Lizt;
$list->addOrderedItem('First item.')
    ->addOrderedItem('Second item.')
    ->addOrderedItem('Third item.')
    ->levelDown() // Go one level down/right
    ->addUnorderedItem('Some more.')
    ->addUnorderedItem('Some more again.')
    ->levelUp()
    ->addOrderedItem('Fourth item.');

// Add it to the document
$document->add($list);

$adapter = new Adapter\Local(__DIR__);
$document->save($adapter, basename(__FILE__, 'php') . 'md');
