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

use Pachico\MarkdownWriter\Element\ElementInterface;

/**
 * One or more consecutive lines of text
 *
 * @see http://daringfireball.net/projects/markdown/syntax#p
 */
class Paragraph extends AbstractInliner implements ElementInterface
{

    /**
     * {@inheritDoc}
     */
    public function toMarkDown()
    {
        $content = '';

        foreach ($this->content as $element) {
            $content .= $element->toMarkDown();
        }

        return rtrim($content) . PHP_EOL . PHP_EOL;
    }
}
