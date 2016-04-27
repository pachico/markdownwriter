<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter\Document;
use League\Flysystem\Adapter;
use Pachico\MarkdownWriter\Element as El;

// Create Document
$document = new Document;

// Create a first blockquote with elements in its constructor
// Direct string and Text objects will be put inline
// You can also add instances of Image and Link
$blockquote1 = new El\Blockquote(
    'First span of text as simple string.',
    new El\Text('Second span of text as instance of Text.'),
    new El\Text('Third span of text as decorated instance of Text.', El\Text::BOLD)
);
$document->add($blockquote1);

// Blockquotes can also be injected with content after being instantiated
$blockquote2 = new El\Blockquote();
$blockquote2->addContent('Fourth span of text added to second blockquote.');
$blockquote2->addContent(new El\Text('Fifth span of text added to second blockquote as instance of Text.'));
$blockquote2->addContent(new El\Text('Sixth span of text added to second blockquote as decorated instance of Text.'));
$document->add($blockquote2);

$adapter = new Adapter\Local(__DIR__);
$document->save($adapter, basename(__FILE__, 'php') . 'md');
