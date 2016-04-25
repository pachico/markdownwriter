<?php

namespace Pachico\MarkdownWriter\Element;

class ImageTest extends \PHPUnit_Framework_TestCase
{

    public function testComplete()
    {
        // Arrange
        $image = new Image(
            'https://travis-ci.org/pachico/magoo.svg?branch=master', // Path
            'https://travis-ci.org/pachico/magoo', // Link
            'Build Status', // Alt
            'Magoo!' // Title
        );

        // Act
        $content = $image->toMarkDown();

        // Assert
        $expected = '[![Build Status](https://travis-ci.org/pachico/magoo.svg?branch=master)]'
            .'(https://travis-ci.org/pachico/magoo "Magoo!")';
        $this->assertSame($expected, $content);
    }

    public function testImageAndAlt()
    {
        // Arrange
        $image = new Image(
            'https://travis-ci.org/pachico/magoo.svg?branch=master', // Path
            null, // Link
            'Build Status', // Alt
            null // Title
        );

        // Act
        $content = $image->toMarkDown();

        // Assert
        $expected = '[![Build Status](https://travis-ci.org/pachico/magoo.svg?branch=master)]';
        $this->assertSame($expected, $content);
    }

    public function testImageAndLink()
    {
        // Arrange
        $image = new Image(
            'https://travis-ci.org/pachico/magoo.svg?branch=master', // Path
            'https://travis-ci.org/pachico/magoo' // Link
        );

        // Act
        $content = $image->toMarkDown();

        // Assert
        $expected = '[!(https://travis-ci.org/pachico/magoo.svg?branch=master)](https://travis-ci.org/pachico/magoo)';
        $this->assertSame($expected, $content);
    }

    public function testJustImage()
    {
        // Arrange
        $image = new Image('https://travis-ci.org/pachico/magoo.svg?branch=master');

        // Act
        $content = $image->toMarkDown();

        // Assert
        $expected = '[!(https://travis-ci.org/pachico/magoo.svg?branch=master)]';
        $this->assertSame($expected, $content);
    }
}
