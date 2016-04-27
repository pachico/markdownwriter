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
    new El\Text('What it is: ', El\Text::BOLD), new El\Text('a markdown writer.')
));

$document->add(new El\Paragraph(
    new El\Text('What it isn\'t: ', El\Text::BOLD), new El\Text('a markdown parser.')
));

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
$document->add(new El\H3('Complete example'));
$document->add(new El\Code(file_get_contents($examplesFolder . '01-simple.php'), El\Code::PHP));
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
        ->addUnorderedItem(new El\Link('All Contributors', 'link-contributors'))
);

// Add Licence
$document->add(new El\H2('Licence'));
$document->add(new El\Paragraph(
    'The MIT License (MIT). Please see ', new El\Link('License File', 'LICENSE.md'), ' for more information.'
));

// Save document
$adapter = new Adapter\Local(__DIR__ . '/../../');
$document->save($adapter, basename(__FILE__, 'php') . 'md');
