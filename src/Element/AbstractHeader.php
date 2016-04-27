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
 * Headers for documents
 *
 * @see http://daringfireball.net/projects/markdown/syntax#header
 */
class AbstractHeader implements ElementInterface
{

    /**
     * @var string Content of heading
     */
    private $content = '';

    /**
     * @var string Prefix of heading
     */
    protected $prefix = '';

    /**
     * Creates instance of Header
     *
     * @param string $content Content of the header
     */
    public function __construct($content)
    {
        $this->content = trim($content);
    }

    /**
     * {@inheritdoc}
     */
    public function toMarkdown()
    {
        $content = $this->prefix . ' ' . $this->content;

        return trim($content) . PHP_EOL . PHP_EOL;
    }
}
