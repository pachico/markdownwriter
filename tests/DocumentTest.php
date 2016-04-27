<?php

/**
 * This file is part of Pachico/MarkdownWriter. (https://github.com/pachico/markdownwriter)
 *
 * @link https://github.com/pachico/markdownwriter for the canonical source repository
 * @copyright Copyright (c) 2016 Mariano F.co Benítez Mulet. (https://github.com/pachico/)
 * @author Mariano F.co Benítez Mulet <pachicodev@gmail.com>
 * @license https://raw.githubusercontent.com/pachico/markdownwriter/master/LICENSE.md MIT
 */

namespace Pachico\MarkdownWriter\Element;

use Pachico\MarkdownWriter as MW;
use Pachico\MarkdownWriter\Element\Paragraph;
use League\Flysystem\Adapter;

class DocumentTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        // Arrange
        $document = new MW\Document();

        // Act
        $content = $document->toMarkdown();

        // Assert
        $this->assertSame('', $content);
    }

    public function testAddParagraph()
    {

        // Arrange
        $document = new MW\Document();
        $document->add(new Paragraph('This is some text.'));

        $paragraph = new Paragraph('Here some more.');
        $document->add($paragraph);

        // Act
        $content = $document->toMarkdown();

        // Assert
        $this->assertSame('This is some text.' . PHP_EOL . PHP_EOL
            . 'Here some more.' . PHP_EOL . PHP_EOL, $content);
    }

    public function testSave()
    {

        // Arrange
        $document = new MW\Document();
        $document->add(new Paragraph('This is some text.'));

        $paragraph = new Paragraph('Here some more.');
        $document->add($paragraph);

        // Act
        $result = $document->save(new Adapter\NullAdapter(), 'bogus.md');

        // Assert
        $this->assertTrue($result);
    }
}
