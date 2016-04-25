<?php

namespace Pachico\MarkdownWriter\Element;

use Webmozart\Assert\Assert;

class Paragraph implements ElementInterface
{
    /**
     * @var type
     */
    private $content = [];

    /**
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
     * @param \Pachico\MarkdownWriter\Element\ElementInterface $content
     *
     * @return \Pachico\MarkdownWriter\Element\Paragraph
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

    /**
     * {inheritDoc}
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
