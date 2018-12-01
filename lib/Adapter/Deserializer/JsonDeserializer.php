<?php

namespace Phpactor\ConfigLoader\Adapter\Deserializer;

use Exception;
use Phpactor\ConfigLoader\Core\Deserializer;

class JsonDeserializer implements Deserializer
{
    public function load(string $contents): array
    {
        $decoded = json_decode($contents, true);
        if (null === $decoded) {
            throw new Exception(json_last_error_msg());
        }

        return $decoded;
    }
}
