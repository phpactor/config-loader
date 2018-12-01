<?php

namespace Phpactor\ConfigLoader\Adapter\PathCandidate;

use Phpactor\ConfigLoader\Core\PathCandidate;

class AbsolutePathCandidate implements PathCandidate
{
    /**
     * @var string
     */
    private $absolutePath;

    /**
     * @var string
     */
    private $loader;

    public function __construct(string $absolutePath, string $loader)
    {
        $this->absolutePath = $absolutePath;
        $this->loader = $loader;
    }

    public function path(): string
    {
        return $this->absolutePath;
    }

    public function loader(): string
    {
        return $this->loader;
    }
}
