<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter as MW;
use Pachico\MarkdownWriter\Element;
use Pachico\MarkdownWriter\Element\Text;
use League\Flysystem\Adapter;

$document = new MW\Document();

$document->add(new Element\H1('This is a simple example'))
    ->add(new Element\Paragraph('And here is something I want to say.', 'And something more.'))
    ->add(new Element\Code('$variable =  new Foo\Bar();'))
    ->add(new Element\Paragraph('Time to wrap up.', new Text('Something italic', Text::ITALIC)));

$paragraph = new Element\Paragraph;
$paragraph->addContent(new Text('Some bold text', Text::BOLD));

$document->add($paragraph);

$document->add(new Element\H2('Some subtitle too'));

$document->add(new Element\HRule(Element\HRule::ASTERISK));

$adapter = new Adapter\Local(__DIR__);

$document->save($adapter, basename(__FILE__, 'php') . 'md');
