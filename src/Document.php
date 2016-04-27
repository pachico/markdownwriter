<?php

/**
 * This file is part of Pachico/MarkdownWriter. (https://github.com/pachico/markdownwriter)
 *
 * @link https://github.com/pachico/markdownwriter for the canonical source repository
 * @copyright Copyright (c) 2016 Mariano F.co Benítez Mulet. (https://github.com/pachico/)
 * @author Mariano F.co Benítez Mulet <pachicodev@gmail.com>
 * @license https://raw.githubusercontent.com/pachico/markdownwriter/master/LICENSE.md MIT
 */

namespace Pachico\MarkdownWriter;

use Pachico\MarkdownWriter\Element\ElementInterface;
use League\Flysystem;
use League\Flysystem\AdapterInterface;

/**
 * Markdown document
 */
class Document
{

    /**
     * @var array|ElementInterface Container for Elements
     */
    private $content = [];

    /**
     * @var Flysystem\Filesystem File system abstraction layer
     */
    private $fileSystem;

    /**
     * @param ElementInterface $element
     *
     * @return Document
     */
    public function add(ElementInterface $element)
    {
        $this->content[] = $element;

        return $this;
    }

    /**
     * @return string Markdown document
     */
    public function toMarkdown()
    {
        $content = '';

        foreach ($this->content as $element) {
            $content .= $element->toMarkDown();
        }

        return $content;
    }

    /**
     * @param AdapterInterface $adapter File system abstraction layer adapter
     * @param string $fileName Output file name
     *
     * @return bool Either saving operation was successful or not
     */
    public function save(AdapterInterface $adapter, $fileName)
    {
        $this->fileSystem = new Flysystem\Filesystem($adapter);

        $content = $this->toMarkdown();

        return $this->fileSystem->put($fileName, $content);
    }
}
