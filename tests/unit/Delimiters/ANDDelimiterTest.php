<?php
namespace tests\unit\Delimiters;

use Codeception\Test\Unit;
use studxxx\conditionclient\Delimiters\ANDDelimiter;
use studxxx\conditionclient\Delimiters\DelimiterInterface;

class ANDDelimiterTest extends Unit
{
    /** @var array */
    public $data = [];

    /** @var DelimiterInterface */
    protected $delimiter;

    /** @var \Unitunit */
    protected $tester;
    
    protected function _before()
    {
        $this->delimiter = new ANDDelimiter($this->data);
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $this->tester->assertInstanceOf('studxxx\conditionclient\Delimiters\DelimiterInterface', $this->delimiter);
    }
}
