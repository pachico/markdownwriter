<?php

namespace Pachico\MarkdownWriter\Element;

class LinkTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        // Arrange
        $link = new Link('MarkdownWriter', 'https://github.com/pachico/markdownwriter');

        // Act
        $output = $link->toMarkDown();

        // Assert
        $this->assertSame('[MarkdownWriter](https://github.com/pachico/markdownwriter)', $output);
    }
}
