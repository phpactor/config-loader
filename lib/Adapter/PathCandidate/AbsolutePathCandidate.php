<?php

namespace Phpactor\ConfigLoader\Adapter\PathCandidate;

use Phpactor\ConfigLoader\Core\PathCandidate;
use RuntimeException;
use Webmozart\PathUtil\Path;

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

        if ('/' !== $absolutePath[0] && '\\' !== $absolutePath[0]) {
            throw new RuntimeException(sprintf(
                'Path is not absolute "%s"',
                $absolutePath
            ));
        }
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
