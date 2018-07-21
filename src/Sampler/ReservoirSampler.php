<?php

namespace Sampler;

final class ReservoirSampler implements SamplerInterface
{
    /**
     * @var \Traversable
     */
    private $iterator;

    /**
     * @param \Traversable $iterator
     */
    public function __construct(\Traversable $iterator)
    {
        $this->iterator = $iterator;
    }

    /**
     * @see SamplerInterface::getSample
     */
    public function getSample($length)
    {
        $i = 0;
        $res = [];
        
        foreach($this->iterator as $item) {
            if($i < $length) {
                $res[$i] = $item;
            } else {
                $key = (int) mt_rand(0, $i);
                if($key < $length) {
                    $res[$key] = $item;
                }
            }

            $i++;
        }

        return $res;
    }
}