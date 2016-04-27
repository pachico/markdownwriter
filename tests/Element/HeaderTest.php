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

class HeaderTest extends \PHPUnit_Framework_TestCase
{

    private $headers = [1, 2, 3, 4, 5, 6];

    public function testHeaders()
    {
        foreach ($this->headers as $header) {
            // Arrange
            $class = __NAMESPACE__ . '\\H' . (string) $header;

            $element = new $class('My header');

            // Act
            $content = $element->toMarkdown();

            // Assert
            $this->assertSame(str_pad('', $header, '#') . ' My header' . PHP_EOL . PHP_EOL, $content);
        }
    }
}
