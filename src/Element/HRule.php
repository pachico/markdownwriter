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
 * Horizontal rule
 *
 * @see http://daringfireball.net/projects/markdown/syntax#hr
 */
class HRule implements ElementInterface
{

    const UNDERSCORE = '_';
    const DASH = '-';
    const ASTERISK = '*';

    /**
     * @var string Type of Horizontal rule
     */
    private $type;

    /**
     * Creates instance of HRule
     *
     * @param string $type Type of horizontal rule
     */
    public function __construct($type = null)
    {
        if (in_array($type, [static::ASTERISK, static::DASH, static::UNDERSCORE])) {
            $this->type = $type;
        } else {
            $this->type = static::UNDERSCORE;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function toMarkDown()
    {
        return str_pad('', 3, $this->type) . PHP_EOL . PHP_EOL;
    }
}
