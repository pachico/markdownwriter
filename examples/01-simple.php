<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter\Document;
use League\Flysystem\Adapter;
use Pachico\MarkdownWriter\Element as El;

$document = new Document();

$document->add(new El\H1('This is a simple example'))
    ->add(new El\Paragraph('And here is something I want to say.', 'And something more.'))
    ->add(new El\Code('$variable =  new Foo\Bar();'))
    ->add(new El\Paragraph('Time to wrap up.', new El\Text('Something italic', El\Text::ITALIC)));

$paragraph = new El\Paragraph;
$paragraph->addContent(new El\Text('Some bold text', El\Text::BOLD));

$document->add($paragraph);

$document->add(new El\H2('Some subtitle too'));

$document->add(new El\HRule(El\HRule::ASTERISK));

$adapter = new Adapter\Local(__DIR__);

$document->save($adapter, basename(__FILE__, 'php') . 'md');
