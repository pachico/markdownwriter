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
