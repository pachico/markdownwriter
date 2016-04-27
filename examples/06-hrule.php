<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter\Document;
use League\Flysystem\Adapter;
use Pachico\MarkdownWriter\Element as El;

// Create Document
$document = new Document;

// Create diffent types of horizontal rules
$hRule1 = new El\HRule(El\HRule::ASTERISK);
$hRule2 = new El\HRule(El\HRule::DASH);
$hRule3 = new El\HRule(El\HRule::UNDERSCORE);

// Add them to the document
$document->add($hRule1)->add($hRule2)->add($hRule3);

$adapter = new Adapter\Local(__DIR__);
$document->save($adapter, basename(__FILE__, 'php') . 'md');
