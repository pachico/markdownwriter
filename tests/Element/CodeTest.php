<?php

namespace Pachico\MarkdownWriter\Element;

use Pachico\MarkdownWriter\Element\Code;

class CodeTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {

        // Arrange
        $code = <<<EOD
<?php
use Pachico\MarkdownWriter as MW;
use Pachico\MarkdownWriter\Element\Code;
EOD;
        $code = new Code($code, Code::PHP);

        // Act
        $content = $code->toMarkDown();

        //Assert
        $expectedContent = <<<EOD

```php
<?php
use Pachico\MarkdownWriter as MW;
use Pachico\MarkdownWriter\Element\Code;
```


EOD;

        $this->assertSame($expectedContent, $content);
    }
}
