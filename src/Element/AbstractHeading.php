<?php

namespace Pachico\MarkdownWriter\Element;

class AbstractHeading implements ElementInterface
{
    /**
     * @var string
     */
    private $content = '';
    /**
     * @var string
     */
    protected $prefix = '';

    /**
     * @param string $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * @inheritDoc
     */
    public function toMarkdown()
    {
        $content = $this->prefix . ' ' . $this->content;

        return trim($content) . PHP_EOL . PHP_EOL;
    }
}
