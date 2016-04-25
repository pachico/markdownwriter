<?php

namespace Pachico\MarkdownWriter\Element;

class Text implements ElementInterface, InlinableInterface
{
    const ITALIC = 'italic';
    const BOLD = 'bold';
    const STRIKETHROUGH = 'strikethrough';

    private $content = '';
    private $decorator;

    /**
     * @param string $string
     * @param string $decorator
     */
    public function __construct($string, $decorator = null)
    {
        $this->content = $string;

        if (in_array($decorator, [static::ITALIC, static::BOLD, static::STRIKETHROUGH])) {
            $this->decorator = $decorator;
        }
    }

    /**
     * @inheritDoc
     */
    public function toMarkDown()
    {
        switch ($this->decorator) {
            case static::BOLD:
                return '**' . $this->content . '** ';
            case static::ITALIC:
                return '_' . $this->content . '_ ';
            case static::STRIKETHROUGH:
                return '--' . $this->content . '-- ';
            default:
                return $this->content . ' ';
        }
    }
}
