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

use Pachico\MarkdownWriter\Element\Paragraph;
use Pachico\MarkdownWriter\Element\Text;

class ParagraphTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructorWithStrings()
    {
        // Arrange
        $paragraph = new Paragraph('This is some text.', 'This is some more text.');

        // Act
        $output = $paragraph->toMarkDown();

        // Assert
        $this->assertSame('This is some text. This is some more text.' . PHP_EOL . PHP_EOL, $output);
    }

    public function testConstructorWithText()
    {
        // Arrange
        $paragraph = new Paragraph(new Text('This is some text.'), new Text('This is some more text.'));

        // Act
        $output = $paragraph->toMarkDown();

        // Assert
        $this->assertSame('This is some text. This is some more text.' . PHP_EOL . PHP_EOL, $output);
    }

    public function testConstructorWithMixedArguments()
    {
        // Arrange
        $paragraph = new Paragraph(new Text('This is some text.'), 'This is some more text.');

        // Act
        $output = $paragraph->toMarkDown();

        // Assert
        $this->assertSame('This is some text. This is some more text.' . PHP_EOL . PHP_EOL, $output);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructorException()
    {
        // Arrange
        new Paragraph(new \DateTime);

        // Act
        //..

        // Assert
        //..
    }

    public function testComplexConstructor()
    {
        // Arrange
        $paragraph = new Paragraph('This is some text.', 'And this is more text.');

        // Act
        $output = $paragraph->toMarkDown();

        // Assert
        $this->assertSame('This is some text. And this is more text.' . PHP_EOL . PHP_EOL, $output);
    }

    public function testAddContent()
    {
        // Arrange
        $paragraph = new Paragraph();
        $paragraph->addContent('This is some text.');
        $paragraph->addContent(new Text('Some italic', Text::ITALIC));

        // Act
        $output = $paragraph->toMarkDown();

        // Assert
        $this->assertSame('This is some text. _Some italic_' . PHP_EOL . PHP_EOL, $output);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddContentException()
    {
        // Arrange
        $paragraph = new Paragraph();
        $paragraph->addContent(new \DateTime);

        // Act
        //..

        // Assert
        //..
    }
}
