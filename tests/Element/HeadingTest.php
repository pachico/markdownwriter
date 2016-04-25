<?php

namespace Pachico\MarkdownWriter\Element;

class HeadingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $headings = [1, 2, 3, 4, 5, 6];

    public function testHeadings()
    {
        foreach ($this->headings as $heading) {
            // Arrange
            $class = __NAMESPACE__ . '\\H' . (string) $heading;

            $element = new $class('My heading');

            // Act
            $content = $element->toMarkdown();

            // Assert
            $this->assertSame(str_pad('', $heading, '#') . ' My heading' . "\n\n", $content);
        }
    }
}
