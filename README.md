# MarkdownWriter

[![Build Status](https://travis-ci.org/pachico/markdownwriter.svg?branch=master)](https://travis-ci.org/pachico/markdownwriter "Markdown Writer")

Php package to write markdown documents.

**What it is:** a markdown writer.

**What it isn't:** a markdown parser.

## Install

Via Composer


```
$ composer require pachico/markdownwriter
```

## Usage

### Headers


```php
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
```

Will output:


```
# This is a H1 header.

## This is a H2 header.

### This is a H3 header.

#### This is a H4 header.

##### This is a H5 header.

###### This is a H6 header.
```

### Paragraph


```php
<?php

require __DIR__ . '/../vendor/autoload.php';

use Pachico\MarkdownWriter\Document;
use League\Flysystem\Adapter;
use Pachico\MarkdownWriter\Element as El;

// Create Document
$document = new Document;

// Create a first paragraph with elements in its constructor
// Direct string and Text objects will be put inline
// You can also add instances of Image and Link
$paragraph1 = new El\Paragraph(
    'First span of text as simple string.',
    new El\Text('Second span of text as instance of Text.'),
    new El\Text('Third span of text as decorated instance of Text.', El\Text::BOLD)
);
$document->add($paragraph1);

// Paragraphs can also be injected with content after being instantiated
$paragraph2 = new El\Paragraph();
$paragraph2->addContent('Fourth span of text added to second paragraph.');
$paragraph2->addContent(new El\Text('Fifth span of text added to second paragraph as instance of Text.'));
$paragraph2->addContent(new El\Text('Sixth span of text added to second paragraph as decorated instance of Text.'));
$document->add($paragraph2);

$adapter = new Adapter\Local(__DIR__);
$document->save($adapter, basename(__FILE__, 'php') . 'md');
```

Will output:


```
First span of text as simple string. Second span of text as instance of Text. **Third span of text as decorated instance of Text.**

Fourth span of text added to second paragraph. Fifth span of text added to second paragraph as instance of Text. Sixth span of text added to second paragraph as decorated instance of Text.
```

### Blackquote


```php
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

```

Will output:


```
> First span of text as simple string. Second span of text as instance of Text. **Third span of text as decorated instance of Text.**

> Fourth span of text added to second blockquote. Fifth span of text added to second blockquote as instance of Text. Sixth span of text added to second blockquote as decorated instance of Text.
```

### Code


```php
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
```

[Will output:](examples/05-code.md)

### Horizontal rule


```php
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

```

Will output:


```
***

---

___
```

### Complete example


```php
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

```

This README file has been written using this package. Check the examples folder for more details.

## Changelog

Please see  [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing


```
$ composer test
```

## Contributing

Please see  [CONTRIBUTING](CONTRIBUTING.md) and  [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email pachicodev@gmail.com instead of using the issue tracker.

## Credits

* [Mariano F.co Benítez Mulet](https://github.com/pachico)
* [All Contributors](link-contributors)

## Licence

The MIT License (MIT). Please see  [License File](LICENSE.md) for more information.