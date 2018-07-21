<?php

use PHPUnit\Framework\TestCase;
use Sampler\ReservoirSampler;

class ReservoirSamplerTest extends TestCase
{
    /**
     * @var ReservoirSampler
     */
    private $sampler;
    
    protected function setUp()
    {
        $this->sampler = new ReservoirSampler(new \ArrayIterator([0,1,2,3,4,5,6,7,8,9]));
    }
    
    public function testSampler()
    {
        $this->assertCount(3, $this->sampler->getSample(3));
        $this->assertCount(6, $this->sampler->getSample(6));
        $this->assertCount(9, $this->sampler->getSample(9));
    }
}