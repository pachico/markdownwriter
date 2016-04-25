<?php

namespace Pachico\MarkdownWriter\Element;

class Lizt implements ElementInterface
{
    const ORDERED = 'ordered';
    const UNORDERED = 'unordered';
    const LEVEL_INDENTATION = '  ';

    /**
     * @var array
     */
    private $content = [];
    /**
     * @var int The current indentation level
     */
    private $currentLevel = 0;

    /**
     * @param \Pachico\MarkdownWriter\Element\Text $content
     * @param string $type
     *
     * @return \Pachico\MarkdownWriter\Element\Lizt
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
     * @param mixed string|Text $content
     *
     * @return \Pachico\MarkdownWriter\Element\Lizt
     */
    public function addUnorderedItem($content)
    {
        $this->addItem($content, static::UNORDERED);

        return $this;
    }

    /**
     * @param mixed string|Text $content
     *
     * @return \Pachico\MarkdownWriter\Element\Lizt
     */
    public function addOrderedItem($content)
    {
        $this->addItem($content, static::ORDERED);

        return $this;
    }

    /**
     * @return \Pachico\MarkdownWriter\Element\Lizt
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
     * @return \Pachico\MarkdownWriter\Element\Lizt
     */
    public function levelDown()
    {
        $this->currentLevel++;

        return $this;
    }

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
