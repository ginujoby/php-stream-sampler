<?php

namespace Iterator;

final class StreamIterator implements \IteratorAggregate
{
    /**
     * @var string
     */
    private $filename;

    /**
     * @param string filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @see \IteratorAggregate::getIterator
     */
    public function getIterator()
    {
        if (!$fp = fopen($this->filename, 'r')) {
            throw new \Exception();
        }
        
        while (false !== ($char = fgetc($fp))) {
        	if ("" != ($char = trim(preg_replace('/\s+/', '', $char)))) {
        	    yield $char;
            }
        }
     
        fclose($fp);
    }
}
