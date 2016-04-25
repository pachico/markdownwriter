# MarkdownWriter

Php package to write markdown documents.

**What it is: ** a markdown writer.

**What it isn't: ** a markdown parser.

## Install

Via Composer


```
$ composer require pachico/markdownwriter
```

## Usage


```php
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

If you discover any security related issues, please email nanodevel@gmail.com instead of using the issue tracker.

## Credits

* [Mariano F.co Benítez Mulet](https://github.com/pachico)
* [All Contributors](link-contributors)

## Licence

The MIT License (MIT). Please see  [License File](LICENSE.md) for more information.

