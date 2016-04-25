<?php

namespace Pachico\MarkdownWriter\Element;

class TextTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        // Arrange
        $text = new Text('Some text.');

        // Act
        $content = $text->toMarkDown();

        // Assert
        $this->assertSame('Some text. ', $content);
    }

    public function testItalic()
    {
        // Arrange
        $text = new Text('Some italic text.', Text::ITALIC);

        // Act
        $content = $text->toMarkDown();

        // Assert
        $this->assertSame('_Some italic text._ ', $content);
    }

    public function testBold()
    {
        // Arrange
        $text = new Text('Some italic text.', Text::BOLD);

        // Act
        $content = $text->toMarkDown();

        // Assert
        $this->assertSame('**Some italic text.** ', $content);
    }

    public function testStrikeThrough()
    {
        // Arrange
        $text = new Text('Some italic text.', Text::STRIKETHROUGH);

        // Act
        $content = $text->toMarkDown();

        // Assert
        $this->assertSame('--Some italic text.-- ', $content);
    }
}
