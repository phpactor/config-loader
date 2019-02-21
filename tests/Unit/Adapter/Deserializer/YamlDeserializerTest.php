<?php

namespace Phpactor\ConfigLoader\Tests\Unit\Adapter\Deserializer;

use Phpactor\ConfigLoader\Adapter\Deserializer\YamlDeserializer;
use Phpactor\ConfigLoader\Core\Exception\CouldNotDeserialize;
use Phpactor\ConfigLoader\Tests\TestCase;

class YamlDeserializerTest extends TestCase
{
    public function testExceptionOnInvalid()
    {
        $this->expectException(CouldNotDeserialize::class);
        $this->expectExceptionMessage(
            <<<'EOT'
Could not deserialize YAML, error from parser "Unable to parse at line 1 (near "asd")."
EOT
        );
        (new YamlDeserializer())->deserialize(
            <<<'EOT'
asd
 \t
a
 1235
     123
EOT
        );
    }

    public function testDeserialize()
    {
        $config = (new YamlDeserializer())->deserialize(
            <<<'EOT'
one:
   two: three
EOT
        );

        $this->assertEquals([
            'one' => [
                'two' => 'three',
            ]
        ], $config);
    }
}
