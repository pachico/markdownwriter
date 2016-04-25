<?php

namespace Pachico\MarkdownWriter\Element;

class H1 extends AbstractHeading
{
    const PREFIX = '#';

    /**
     * {inheritDoc}
     */
    public function __construct($content)
    {
        $this->prefix = static::PREFIX;
        parent::__construct($content);
    }
}
