<?php

namespace Sampler;

interface SamplerInterface
{
    /**
     * @param  int $length
     * 
     * @return array
     */
    public function getSample($length);
}
