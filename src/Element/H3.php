<?php

namespace Pachico\MarkdownWriter\Element;

class H3 extends AbstractHeading
{
    const PREFIX = '###';

    /**
     * {inheritDoc}
     */
    public function __construct($content)
    {
        $this->prefix = static::PREFIX;
        parent::__construct($content);
    }
}
