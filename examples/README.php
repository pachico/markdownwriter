<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter as MW;
use Pachico\MarkdownWriter\Element;
use League\Flysystem\Adapter;

// Create document
$document = new MW\Document();

// Add Title
$document->add(new Element\H1('MarkdownWriter'));
$document->add(
    (new Element\Paragraph())->addContent('Php package to write markdown documents.')
);

$document->add(new Element\Paragraph(
    new Element\Text('What it is: ', Element\Text::BOLD),
    new Element\Text('a markdown writer.')
));

$document->add(new Element\Paragraph(
    new Element\Text('What it isn\'t: ', Element\Text::BOLD),
    new Element\Text('a markdown parser.')
));

// Add Install
$document->add(new Element\H2('Install'));
$document->add(
    (new Element\Paragraph())->addContent('Via Composer')
);
$document->add(new Element\Code('$ composer require pachico/markdownwriter'));

// Add Usage
$document->add(new Element\H2('Usage'));
$document->add(new Element\Code(file_get_contents(__DIR__ . '/01-simple.php'), Element\Code::CODE_PHP));
$document->add(new Element\Paragraph(
    'This README file has been written using this package.',
    'Check the examples folder for more details.'
));

// Add Changelog
$document->add(new Element\H2('Changelog'));
$document->add(new Element\Paragraph(
    'Please see ',
    new Element\Link('CHANGELOG', 'CHANGELOG.md'),
    ' for more information what has changed recently.'
));

// Add Testing
$document->add(new Element\H2('Testing'));
$document->add(new Element\Code('$ composer test'));

// Add Contributing
$document->add(new Element\H2('Contributing'));
$document->add(new Element\Paragraph(
    'Please see ',
    new Element\Link('CONTRIBUTING', 'CONTRIBUTING.md'),
    ' and ',
    new Element\Link('CONDUCT', 'CONDUCT.md'),
    ' for details.'
    ));

// Add Security
$document->add(new Element\H2('Security'));
$document->add(new Element\Paragraph('If you discover any security related issues, '
    . 'please email nanodevel@gmail.com instead of using the issue tracker.'));

// Add Credits
$document->add(new Element\H2('Credits'));
$document->add((new Element\Lizt())
    ->addUnorderedItem(new Element\Link('Mariano F.co Benítez Mulet', 'https://github.com/pachico'))
    ->addUnorderedItem(new Element\Link('All Contributors', 'link-contributors'))
);

// Add Licence
$document->add(new Element\H2('Licence'));
$document->add(new Element\Paragraph(
    'The MIT License (MIT). Please see ',
    new Element\Link('License File', 'LICENSE.md'),
    ' for more information.'
));

// Save document
$adapter = new Adapter\Local(__DIR__.'/../');
$document->save($adapter, basename(__FILE__, 'php') . 'md');
