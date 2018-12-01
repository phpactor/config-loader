<?php

namespace Phpactor\ConfigLoader\Core;

interface Deserializer
{
    public function load(string $contents): array;
}
