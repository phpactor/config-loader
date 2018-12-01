<?php

namespace Phpactor\ConfigLoader\Tests\Unit\Adapter\PathCandidate;

use PHPUnit\Framework\TestCase;
use Phpactor\ConfigLoader\Adapter\PathCandidate\XdgPathCandidate;

class XdgPathCandidateTest extends TestCase
{
    public function testCandidate()
    {
        $candidate = new XdgPathCandidate('phpactor', 'phpactor', 'foo');
        $this->assertContains('phpactor', $candidate->path());
        $this->assertEquals('foo', $candidate->loader());
    }
}
