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
 * Class that groups InlinableInterface elements as Paragraph or Blockquote
 */
abstract class AbstractInliner implements ElementInterface
{
    /**
     * @var array|InlinableInterface Content of the paragraph
     */
    protected $content = [];

    /**
     * Creates instance of Paragraph
     *
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        foreach (func_get_args() as $index => $argument) {
            if ($argument instanceof InlinableInterface) {
                $this->content [] = $argument;
            } elseif (is_string($argument)) {
                $this->content[] = new Text($argument);
            } else {
                throw new \InvalidArgumentException('Argument in position ' . $index . ' '
                . 'must be instance of Text or string.');
            }
        }
    }

    /**
     * Adds a text to the paragraph
     *
     * @param string|ElementInterface $content Content to be added
     *
     * @return Paragraph
     */
    public function addContent($content)
    {
        if ($content instanceof InlinableInterface) {
            $this->content [] = $content;
        } elseif (is_string($content)) {
            $this->content[] = new Text($content);
        } else {
            throw new \InvalidArgumentException('Added content must be instance of Text or string.');
        }

        return $this;
    }

}
