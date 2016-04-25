<?php

namespace Pachico\MarkdownWriter\Element;

class Code implements ElementInterface
{
    const CODE_JAVASCRIPT = 'javascript';
    const CODE_PHP = 'php';

    /**
     * @var string
     */
    private $content = '';
    /**
     *
     * @var string
     */
    private $language = '';

    /**
     * @param string $content
     * @param string $language
     */
    public function __construct($content, $language = null)
    {
        $this->content = $content;

        if (!is_null($language)) {
            $this->language = $language;
        }
    }

    /**
     * {inheritDoc}
     */
    public function toMarkDown()
    {
        $string = PHP_EOL . '```' . $this->language . PHP_EOL;
        $string .= $this->content;
        $string .= PHP_EOL . '```' . PHP_EOL . PHP_EOL;

        return $string;
    }
}
