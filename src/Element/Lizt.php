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

use Pachico\MarkdownWriter\Element\Text;

/**
 * List of Inlineable elements.
 * It's called Lizt and not List because the latter is a reserved word in PHP
 *
 * @see http://daringfireball.net/projects/markdown/syntax#list
 */
class Lizt implements ElementInterface
{

    const ORDERED = 'ordered';
    const UNORDERED = 'unordered';
    const LEVEL_INDENTATION = '  ';

    /**
     * @var array|InlineableInterface List elements
     */
    private $content = [];

    /**
     * @var int The current indentation level
     */
    private $currentLevel = 0;

    /**
     * Adds to the list an element
     *
     * @param Text $content Content of list element
     * @param string $type Type of list element
     *
     * @return Lizt
     * @throws \InvalidArgumentException
     */
    private function addItem($content, $type)
    {
        if ($content instanceof InlinableInterface) {
            $element = $content;
        } elseif (is_string($content)) {
            $element = new Text($content);
        } else {
            throw new \InvalidArgumentException('List element must be instance of Text or string.');
        }

        $this->content [] = [
            $this->currentLevel,
            $element,
            $type
        ];

        return $this;
    }

    /**
     * Adds to the list an UNORDERED element
     *
     * @param string|Text $content Content of list element
     *
     * @return Lizt
     */
    public function addUnorderedItem($content)
    {
        $this->addItem($content, static::UNORDERED);

        return $this;
    }

    /**
     * Adds to the list an ORDERED element
     *
     * @param string|Text $content Content of list element
     *
     * @return Lizt
     */
    public function addOrderedItem($content)
    {
        $this->addItem($content, static::ORDERED);

        return $this;
    }

    /**
     * Moves the cursor of the list one element to the left/up
     *
     * @return Lizt
     *
     * @throws \RuntimeException
     */
    public function levelUp()
    {
        if (($this->currentLevel - 1) < 0) {
            throw new \RuntimeException('Cannot decrease list indentation level below 0.');
        }

        $this->currentLevel--;

        return $this;
    }

    /**
     * Moves the cursor of the list one element to the right/down
     *
     * @return Lizt
     */
    public function levelDown()
    {
        $this->currentLevel++;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function toMarkDown()
    {
        $content = [];

        $lastLevelOrderedNumber = [];

        foreach ($this->content as $item) {
            $level = $item[0];
            $element = $item[1];
            $type = $item[2];

            if (!isset($lastLevelOrderedNumber[$level])) {
                $lastLevelOrderedNumber[$level] = 1;
            }

            $indentation = '';

            if ($level > 0) {
                $indentation = str_repeat(static::LEVEL_INDENTATION, $level);
            }

            $prefix = '';

            switch ($type) {
                case static::UNORDERED:
                    $prefix = '* ';
                    break;
                case static::ORDERED:
                    $prefix = (string) $lastLevelOrderedNumber[$level] . '. ';
                    $lastLevelOrderedNumber[$level] ++;
                    break;
            }

            $content[] = $indentation . $prefix . $element->toMarkDown();
        }

        return rtrim(implode(PHP_EOL, $content)) . PHP_EOL . PHP_EOL;
    }
}
