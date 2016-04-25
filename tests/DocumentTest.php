<?php

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
