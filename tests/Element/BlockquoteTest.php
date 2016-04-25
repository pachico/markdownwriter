<?php

namespace Pachico\MarkdownWriter\Element;

class BlockquoteTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        // Arrange
        $blockquote = new Blockquote('Something important.');

        // Act
        $content = $blockquote->toMarkDown();

        // Assert
        $this->assertSame('> Something important.' . PHP_EOL . PHP_EOL, $content);
    }
}
