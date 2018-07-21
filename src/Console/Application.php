<?php

namespace Console;

use \Sampler\ReservoirSampler;
use \Iterator\StreamIterator;
use \Util\RandomGenerator;

final class Application
{
    const DEFAULT_INPUT_LENGTH = 5;
    
    /**
     * Run application.
     *
     * @return string
     */
    public function run()
    {
        $length = empty($_SERVER['argv'][1]) ? self::DEFAULT_INPUT_LENGTH : $_SERVER['argv'][1];
        
        // We can also use the Symfony component Console input class for more user friendly options
        //$argvInput = new ArgvInput();
        //$length = $argvInput->getParameterOption(['--length', '-l'], self::DEFAULT_INPUT_LENGTH);
        
        if (FALSE === ftell(STDIN)) {
            $randomString = RandomGenerator::getRandomString();
            $iterator = new \ArrayIterator(str_split($randomString));
        } else {
            $iterator = new StreamIterator('php://stdin');
        }
        
        $sampler = new ReservoirSampler($iterator);
        
        $sample = $sampler->getSample($length);
        return implode('', $sample);
    }
}