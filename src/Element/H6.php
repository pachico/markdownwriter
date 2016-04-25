<?php

namespace Pachico\MarkdownWriter\Element;

class H6 extends AbstractHeading
{
    const PREFIX = '######';

    /**
     * {inheritDoc}
     */
    public function __construct($content)
    {
        $this->prefix = static::PREFIX;
        parent::__construct($content);
    }
}
