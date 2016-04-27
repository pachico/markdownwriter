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

class HRuleTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        // Arrange
        $hRule = new HRule();

        // Act
        $content = $hRule->toMarkDown();

        // Assert
        $this->assertSame('___' . PHP_EOL . PHP_EOL, $content);
    }

    public function testTypes()
    {
        // Arrange
        $hRule = new HRule(HRule::DASH);

        // Act
        $content = $hRule->toMarkDown();

        // Assert
        $this->assertSame('---' . "\n\n", $content);
    }
}
