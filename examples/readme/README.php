<?php

require __DIR__ . '/../../vendor/autoload.php';

use Pachico\MarkdownWriter as MW;
use Pachico\MarkdownWriter\Element as El;
use League\Flysystem\Adapter;

$examplesFolder = __DIR__ . '/../';


// Create document
$document = new MW\Document();

// Add Title
$document->add(new El\H1('MarkdownWriter'));

// Add badges
$document->add(new El\Paragraph(
    new El\Image(
    'https://travis-ci.org/pachico/markdownwriter.svg?branch=master', 'https://travis-ci.org/pachico/markdownwriter', 'Build Status', 'Markdown Writer'
    )
));

//
$document->add(
    (new El\Paragraph())->addContent('Php package to write markdown documents.')
);

$document->add(new El\Paragraph(
    new El\Text('What it is: ', El\Text::BOLD), new El\Text('a markdown writer.'),
    new El\Text('What it isn\'t: ', El\Text::BOLD), new El\Text('a markdown parser.')
));

$document->add(new El\Paragraph(
    new El\Text('Why?', El\Text::BOLD),
    'Because coding it was fun and because you might want to programmatically write documentation, blog entries, etc. '
    . ' with data that comes from a databases, csv files, etc. More and more there are static site generators that use'
    . ' markdown as source so, I thought I would give it a try.'
));

// Add Index
$document->add(new El\H2('Table of Contents'));
$document->add((new El\Lizt())
    ->addUnorderedItem(new El\Link('Install', '#install'))
    ->addUnorderedItem(new El\Link('Usage', '#usage'))
    ->levelDown()
    ->addUnorderedItem(new El\Link('Headers', '#headers'))
    ->addUnorderedItem(new El\Link('Paragraph', '#paragraph'))
    ->addUnorderedItem(new El\Link('Blockquote', '#blockquote'))
    ->addUnorderedItem(new El\Link('Code', '#code'))
    ->addUnorderedItem(new El\Link('Horizontal rule', '#horizontal-rule'))
    ->addUnorderedItem(new El\Link('Image', '#image'))
    ->addUnorderedItem(new El\Link('Link', '#link'))
    ->addUnorderedItem(new El\Link('Lizt (list)', '#lizt-list'))
    ->addUnorderedItem(new El\Link('Output', '#output'))
    ->addUnorderedItem(new El\Link('Example', '#example'))
);

// Add Install
$document->add(new El\H2('Install'));
$document->add(
    (new El\Paragraph())->addContent('Via Composer')
);
$document->add(new El\Code('$ composer require pachico/markdownwriter'));

// Add Usage
$document->add(new El\H2('Usage'));
//
$document->add(new El\H3('Headers'));
$document->add(new El\Code(file_get_contents($examplesFolder . '02-headers.php'), El\Code::PHP));
$document->add(new El\Paragraph('Will output:'));
$document->add(new El\Code(file_get_contents($examplesFolder . '02-headers.md')));
//
$document->add(new El\H3('Paragraph'));
$document->add(new El\Code(file_get_contents($examplesFolder . '03-paragraph.php'), El\Code::PHP));
$document->add(new El\Paragraph('Will output:'));
$document->add(new El\Code(file_get_contents($examplesFolder . '03-paragraph.md')));
//
$document->add(new El\H3('Blackquote'));
$document->add(new El\Code(file_get_contents($examplesFolder . '04-blockquote.php'), El\Code::PHP));
$document->add(new El\Paragraph('Will output:'));
$document->add(new El\Code(file_get_contents($examplesFolder . '04-blockquote.md')));
//
$document->add(new El\H3('Code'));
$document->add(new El\Code(file_get_contents($examplesFolder . '05-code.php'), El\Code::PHP));
$document->add(new El\Paragraph(new El\Link('Will output:', 'examples/05-code.md')));
//
$document->add(new El\H3('Horizontal rule'));
$document->add(new El\Code(file_get_contents($examplesFolder . '06-hrule.php'), El\Code::PHP));
$document->add(new El\Paragraph('Will output:'));
$document->add(new El\Code(file_get_contents($examplesFolder . '06-hrule.md')));
//
$document->add(new El\H3('Image'));
$document->add(new El\Code(file_get_contents($examplesFolder . '07-image.php'), El\Code::PHP));
$document->add(new El\Paragraph('Will output:'));
$document->add(new El\Code(file_get_contents($examplesFolder . '07-image.md')));
//
$document->add(new El\H3('Link'));
$document->add(new El\Code(file_get_contents($examplesFolder . '08-link.php'), El\Code::PHP));
$document->add(new El\Paragraph('Will output:'));
$document->add(new El\Code(file_get_contents($examplesFolder . '08-link.md')));
//
$document->add(new El\H3('Lizt (list)'));
$document->add(new El\Blockquote('Lists are called ', new El\Text('Lizt', El\Text::ITALIC), ' since the word "list" is a php reserved word.'));
$document->add(new El\Code(file_get_contents($examplesFolder . '09-lizt.php'), El\Code::PHP));
$document->add(new El\Paragraph('Will output:'));
$document->add(new El\Code(file_get_contents($examplesFolder . '09-lizt.md')));
//
$document->add(new El\H3('Output'));
$document->add(new El\Code(file_get_contents($examplesFolder . '10-output.php'), El\Code::PHP));
$document->add(new El\Blockquote('Check ', new El\Link('FlySystem', 'http://flysystem.thephpleague.com/'), ' for the complete list of adapters.'));
//
$document->add(new El\H3('Example'));
$document->add(new El\Code(file_get_contents($examplesFolder . '01-example.php'), El\Code::PHP));
$document->add(new El\Paragraph(
    'This README file has been written using this package.', 'Check the examples folder for more details.'
));

// Add Changelog
$document->add(new El\H2('Changelog'));
$document->add(new El\Paragraph(
    'Please see ', new El\Link('CHANGELOG', 'CHANGELOG.md'), ' for more information what has changed recently.'
));

// Add Testing
$document->add(new El\H2('Testing'));
$document->add(new El\Code('$ composer test'));

// Add Contributing
$document->add(new El\H2('Contributing'));
$document->add(new El\Paragraph(
    'Please see ', new El\Link('CONTRIBUTING', 'CONTRIBUTING.md'), ' and ', new El\Link('CONDUCT', 'CONDUCT.md'), ' for details.'
));

// Add Security
$document->add(new El\H2('Security'));
$document->add(new El\Paragraph('If you discover any security related issues, '
    . 'please email pachicodev@gmail.com instead of using the issue tracker.'));

// Add Credits
$document->add(new El\H2('Credits'));
$document->add((new El\Lizt())
        ->addUnorderedItem(new El\Link('Mariano F.co Benítez Mulet', 'https://github.com/pachico'))
);

// Add Licence
$document->add(new El\H2('Licence'));
$document->add(new El\Paragraph(
    'The MIT License (MIT). Please see ', new El\Link('License File', 'LICENSE.md'), ' for more information.'
));

// Save document
$adapter = new Adapter\Local(__DIR__ . '/../../');
$document->save($adapter, basename(__FILE__, 'php') . 'md');
