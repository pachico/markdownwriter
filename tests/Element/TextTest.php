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
