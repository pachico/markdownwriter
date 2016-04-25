<?php

namespace Pachico\MarkdownWriter\Element;

class Link implements ElementInterface, InlinableInterface
{
    /**
     * @var string
     */
    private $text;
    /**
     * @var type
     */
    private $link;

    /**
     * @param string $text
     * @param string $link
     */
    public function __construct($text, $link)
    {
        $this->text = trim($text);
        $this->link = trim($link);
    }

    /**
     * @inheritDoc
     */
    public function toMarkDown()
    {
        return '[' . $this->text . '](' . $this->link . ')';
    }
}
