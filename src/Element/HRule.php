<?php

namespace Pachico\MarkdownWriter\Element;

class HRule implements ElementInterface
{
    const UNDERSCORE = '_';
    const DASH = '-';
    const ASTERISK = '*';
    private $type;

    /**
     * @param string $type
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
     * @inheritDoc
     */
    public function toMarkDown()
    {
        return str_pad('', 3, $this->type) . PHP_EOL . PHP_EOL;
    }
}
