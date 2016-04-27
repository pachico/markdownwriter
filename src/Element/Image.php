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

use Webmozart\Assert\Assert;

/**
 * Image element, which can optionally have link, alt and title
 *
 * @see http://daringfireball.net/projects/markdown/syntax#img
 */
class Image implements ElementInterface, InlinableInterface
{

    /**
     * @var string Path to the image
     */
    private $path;

    /**
     * @var string Url of the link
     */
    private $link;

    /**
     * @var string Alt text
     */
    private $alt;

    /**
     * @var string Title text
     */
    private $title;

    /**
     * Creates instance of Image
     *
     * @param string $path Path to the image
     * @param string $link Url of the link
     * @param string $alt Alt text
     * @param string $title Title text
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
