<?php

namespace Pachico\MarkdownWriter;

use Pachico\MarkdownWriter\Element\ElementInterface;
use League\Flysystem;

class Document
{
    /**
     * @var array Of ElementInterface
     */
    private $content = [];
    /**
     * @var Flysystem\Filesystem;
     */
    private $fileSystem;

    /**
     * @param ElementInterface $element
     *
     * @return \Pachico\MarkdownWriter\Document
     */
    public function add(ElementInterface $element)
    {
        $this->content[] = $element;
        return $this;
    }

    /**
     * @return type
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
     * @param \League\Flysystem\AdapterInterface $adapter
     * @param string $fileName
     *
     * @return bool
     */
    public function save(Flysystem\AdapterInterface $adapter, $fileName)
    {
        $this->fileSystem = new Flysystem\Filesystem($adapter);

        $content = $this->toMarkdown();

        return $this->fileSystem->put($fileName, $content);
    }
}
