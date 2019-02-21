<?php

namespace Phpactor\ConfigLoader\Tests\Unit\Adapter\Deserializer;

use Phpactor\ConfigLoader\Adapter\Deserializer\JsonDeserializer;
use Phpactor\ConfigLoader\Core\Exception\CouldNotDeserialize;
use Phpactor\ConfigLoader\Tests\TestCase;

class JsonDeserializerTest extends TestCase
{
    public function testThrowsExceptionIfInvalidJson()
    {
        $this->expectException(CouldNotDeserialize::class);
        $this->expectExceptionMessage('Could not decode JSON: "Syntax error"');
        (new JsonDeserializer())->deserialize('FOo BAR');
    }

    public function testDeserialize()
    {
        $decoded = (new JsonDeserializer())->deserialize('{"key": "value"}');

        $this->assertSame(['key' => 'value'], $decoded);
    }
}
