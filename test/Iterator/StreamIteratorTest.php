<?php

use PHPUnit\Framework\TestCase;
use Iterator\StreamIterator;
use org\bovigo\vfs\vfsStream;

class StreamIteratorTest extends TestCase
{
    public function testIterator()
    {
        $content = <<<EOT
0
1
2
3
4
5
6
7
8
9
EOT;
        $root = vfsStream::setup('home');
        $file = vfsStream::newFile('test.txt')->at($root)->setContent($content);
        
        $iterator = new StreamIterator($file->url());
        $result = array();
        foreach ($iterator as $item) {
            $result[] = (int)$item;
        }
        
        $this->assertEquals([0,1,2,3,4,5,6,7,8,9], $result);
    }
}
