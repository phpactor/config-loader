<?php

namespace Phpactor\ConfigLoader\Tests\Unit\Adapter\PathCandidate;

use PHPUnit\Framework\TestCase;
use Phpactor\ConfigLoader\Adapter\PathCandidate\AbsolutePathCandidate;
use RuntimeException;

class AbsolutePathCandidateTest extends TestCase
{
    public function testExceptionifNotAbsolute()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Path is not absolute "hello"');
        new AbsolutePathCandidate('hello', 'foo');
    }
}
