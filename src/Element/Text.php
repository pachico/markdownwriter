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
 * Single text element that can be styled and added to Paragraphs
 */
class Text implements ElementInterface, InlinableInterface
{

    const ITALIC = 'italic';
    const BOLD = 'bold';
    const STRIKETHROUGH = 'strikethrough';

    /**
     * @var string Content of text element
     */
    private $content = '';

    /**
     * @var string Decoration style
     */
    private $decorator;

    /**
     * Creates instance of Text
     *
     * @param string $string Content of text element
     * @param string $decorator Decoration style
     */
    public function __construct($string, $decorator = null)
    {
        $this->content = $string;

        if (in_array($decorator, [static::ITALIC, static::BOLD, static::STRIKETHROUGH])) {
            $this->decorator = $decorator;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function toMarkDown()
    {
        switch ($this->decorator) {
            case static::BOLD:
                return '**' . trim($this->content) . '** ';
            case static::ITALIC:
                return '_' . trim($this->content) . '_ ';
            case static::STRIKETHROUGH:
                return '--' . trim($this->content) . '-- ';
            default:
                return $this->content . ' ';
        }
    }
}
