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

class LiztTest extends \PHPUnit_Framework_TestCase
{

    public function testSimpleUnordered()
    {
        // Arrange
        $list = new Lizt();
        $list->addUnorderedItem('This is an item')
            ->addUnorderedItem(new Text('This is the second item'));

        // Act
        $output = $list->toMarkDown();

        // Assert
        $this->assertSame('* This is an item ' . PHP_EOL
            . '* This is the second item'
            . PHP_EOL . PHP_EOL, $output);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddItemException()
    {
        // Arrange
        $list = new Lizt();
        $list->addUnorderedItem(new \DateTime);

        // Act
        //...
        // Assert
        //...
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testLevelUpException()
    {
        // Arrange
        $list = new Lizt();
        $list->levelUp();

        // Act
        //...
        // Assert
        //...
    }

    public function testSimpleUnorderedWithLevels()
    {
        // Arrange
        $list = new Lizt();
        $list->addUnorderedItem('This is an item')
            ->levelDown()
            ->addUnorderedItem('This is the second item');

        // Act
        $output = $list->toMarkDown();

        // Assert
        $this->assertSame('* This is an item ' . PHP_EOL
            . Lizt::LEVEL_INDENTATION . '* This is the second item'
            . PHP_EOL . PHP_EOL, $output);
    }

    public function testSimpleOrdered()
    {
        // Arrange
        $list = new Lizt();
        $list->addOrderedItem('This is an item')
            ->addOrderedItem('This is the second item');

        // Act
        $output = $list->toMarkDown();

        // Assert
        $this->assertSame('1. This is an item ' . PHP_EOL
            . '2. This is the second item'
            . PHP_EOL . PHP_EOL, $output);
    }

    public function testSimpleOrderedWithLevels()
    {
        // Arrange
        $list = new Lizt();
        $list->addOrderedItem('This is item 1.')
            ->addOrderedItem('This is item 2.')
            ->levelDown()
            ->addOrderedItem('This is item 3.')
            ->addOrderedItem('This is item 4.')
            ->levelUp()
            ->addOrderedItem('This is item 5.');

        // Act
        $output = $list->toMarkDown();

        // Assert
        $this->assertSame('1. This is item 1. ' . PHP_EOL
            . '2. This is item 2. ' . PHP_EOL
            . Lizt::LEVEL_INDENTATION . '1. This is item 3. ' . PHP_EOL
            . Lizt::LEVEL_INDENTATION . '2. This is item 4. ' . PHP_EOL
            . '3. This is item 5.' . PHP_EOL . PHP_EOL, $output);
    }

    public function testMixedList()
    {
        // Arrange
        $list = new Lizt();
        $list->addOrderedItem('This is item 1.')
            ->addOrderedItem('This is item 2.')
            ->addUnorderedItem('This is item 3.')
            ->addOrderedItem('This is item 4.')
            //
            ->levelDown()
            ->addOrderedItem('This is item 5.')
            ->addOrderedItem('This is item 6.')
            ->addUnorderedItem('This is item 7.')
            //
            ->levelDown()
            ->addOrderedItem('This is item 8.')
            //
            ->levelUp()
            ->levelUp()
            ->addOrderedItem('This is item 9.');

        // Act
        $output = $list->toMarkDown();

        $this->assertSame('1. This is item 1. ' . PHP_EOL
            . '2. This is item 2. ' . PHP_EOL
            . '* This is item 3. ' . PHP_EOL
            . '3. This is item 4. ' . PHP_EOL
            //
            . Lizt::LEVEL_INDENTATION . '1. This is item 5. ' . PHP_EOL
            . Lizt::LEVEL_INDENTATION . '2. This is item 6. ' . PHP_EOL
            . Lizt::LEVEL_INDENTATION . '* This is item 7. ' . PHP_EOL
            //
            . Lizt::LEVEL_INDENTATION . Lizt::LEVEL_INDENTATION . '1. This is item 8. ' . PHP_EOL
            //
            . '4. This is item 9.' . PHP_EOL . PHP_EOL, $output);
    }
}
