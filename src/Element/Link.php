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

/**
 * Spans of text with links
 *
 * @see http://daringfireball.net/projects/markdown/syntax#link
 */
class Link implements ElementInterface, InlinableInterface
{

    /**
     * @var string Content of text
     */
    private $text;

    /**
     * @var string The link url
     */
    private $link;

    /**
     * Creates instance of Link
     *
     * @param string $text Content of text
     * @param string $link The link url
     */
    public function __construct($text, $link)
    {
        $this->text = trim($text);
        $this->link = trim($link);
    }

    /**
     * {@inheritDoc}
     */
    public function toMarkDown()
    {
        return '[' . $this->text . '](' . $this->link . ')';
    }
}
