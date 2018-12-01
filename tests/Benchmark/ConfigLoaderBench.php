<?php

namespace Phpactor\ConfigLoader\Tests\Benchmark;

use Phpactor\ConfigLoader\Adapter\Deserializer\JsonDeserializer;
use Phpactor\ConfigLoader\Adapter\PathCandidate\AbsolutePathCandidate;
use Phpactor\ConfigLoader\Adapter\PathCandidate\XdgPathCandidate;
use Phpactor\ConfigLoader\Core\ConfigLoader;
use Phpactor\ConfigLoader\Core\Deserializers;
use Phpactor\ConfigLoader\Core\PathCandidate;
use Phpactor\ConfigLoader\Core\PathCandidates;
use Phpactor\ConfigLoader\Tests\TestCase;

/**
 * @BeforeMethods({"setUp"})
 * @Iterations(30)
 * @Revs(50)
 * @OutputTimeUnit("milliseconds")
 */
class ConfigLoaderBench extends TestCase
{
    /**
     * @var string
     */
    private $config1;
    /**
     * @var string
     */
    private $config2;

    public function setUp()
    {
        parent::setUp();
        $this->config1 = $this->workspace->path('config1.json');
        $this->config2 = $this->workspace->path('config2.json');
        file_put_contents($this->config1, json_encode(['one' => 'two']));
        file_put_contents($this->config2, json_encode(['two' => 'three']));
    }

    public function benchLoadConfig()
    {
        $loader = new ConfigLoader(
            new Deserializers([
                'json' => new JsonDeserializer(),
            ]),
            new PathCandidates([
                new AbsolutePathCandidate($this->config1, 'json'),
                new AbsolutePathCandidate($this->config2, 'json'),
            ])
        );
        $loader->load();
    }

    public function benchPlainPhp()
    {
        $config = array_merge(
            json_decode(file_get_contents($this->config1), true),
            json_decode(file_get_contents($this->config2), true)
        );
    }
}
