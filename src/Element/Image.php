<?php

namespace Pachico\MarkdownWriter\Element;

use Webmozart\Assert\Assert;

class Image implements ElementInterface, InlinableInterface
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $link;
    /**
     * @var string
     */
    private $alt;
    /**
     * @var string
     */
    private $title;

    /**
     * @param string $path
     * @param string $link
     * @param string $alt
     * @param string $title
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($path, $link = null, $alt = null, $title = null)
    {
        Assert::string($path, '$path must be a string');
        $this->path = $path;

        if (!is_null($link)) {
            Assert::string($link, '$link must be a string');
            $this->link = $link;
        }

        if (!is_null($alt)) {
            Assert::string($alt, '$alt must be a string');
            $this->alt = $alt;
        }

        if (!is_null($title)) {
            Assert::string($title, '$alt must be a string');
            $this->title = $title;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function toMarkDown()
    {
        $content = '[!';
        $content .= $this->alt ? '[' . $this->alt . ']' : '';
        $content .= '(' . $this->path . ')]';
        if ($this->link || $this->title) {
            $content .= '(';
            $content .= $this->link ? $this->link : '';
            $content .= $this->title ? ' "' . $this->title . '"' : '';
            $content .= ')';
        }

        return $content;
    }
}
