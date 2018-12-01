<?php

namespace Phpactor\ConfigLoader\Tests;

use PHPUnit\Framework\TestCase as PhpunitTestCase;
use Phpactor\TestUtils\Workspace;

class TestCase extends PhpunitTestCase
{
    /**
     * @var Workspace
     */
    protected $workspace;

    public function setUp()
    {
        $this->workspace = Workspace::create(__DIR__  . '/Workspace');
        $this->workspace->reset();
    }
}
