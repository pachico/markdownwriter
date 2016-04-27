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
 * Span of code for generic or specific languages
 *
 * @see http://daringfireball.net/projects/markdown/syntax#code
 */
class Code implements ElementInterface
{

    const JAVASCRIPT = 'javascript';
    const PHP = 'php';
    const RUBY = 'ruby';
    const PYTHON = 'python';
    const BASH = 'bash';

    /**
     * @var string Content of element
     */
    private $content = '';

    /**
     *
     * @var string Language of span of code
     */
    private $language = '';

    /**
     * Creates instance of Code
     *
     * @param string $content Content of element
     * @param string $language Language of span of code
     */
    public function __construct($content, $language = null)
    {
        $this->content = $content;

        if (!is_null($language)) {
            $this->language = $language;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function toMarkDown()
    {
        $string = PHP_EOL . '```' . $this->language . PHP_EOL;
        $string .= $this->content;
        $string .= PHP_EOL . '```' . PHP_EOL . PHP_EOL;

        return $string;
    }
}
