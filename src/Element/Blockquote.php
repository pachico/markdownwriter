<?php

namespace Pachico\MarkdownWriter\Element;

class Blockquote implements ElementInterface
{
    /**
     *
     * @var string
     */
    private $content;

    /**
     * @param string $content
     */
    public function __construct($content)
    {
        $this->content = trim($content);
    }

    /**
     * @inheritDoc
     */
    public function toMarkDown()
    {
        return '> ' . $this->content . PHP_EOL . PHP_EOL;
    }
}
