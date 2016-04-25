<?php

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
        $this->assertSame('___' . "\n\n", $content);
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
