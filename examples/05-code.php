<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter\Document;
use League\Flysystem\Adapter;
use Pachico\MarkdownWriter\Element as El;

// Create Document
$document = new Document;

$code1 = new El\Code('var code = "This is Javascript code";', El\Code::JAVASCRIPT);
$code2 = new El\Code('This is generic code');

$document->add($code1)->add($code2);

$adapter = new Adapter\Local(__DIR__);
$document->save($adapter, basename(__FILE__, 'php') . 'md');
