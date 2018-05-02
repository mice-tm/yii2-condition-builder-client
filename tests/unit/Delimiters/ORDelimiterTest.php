<?php
namespace Delimiters;

use Codeception\Test\Unit;
use studxxx\conditionclient\Delimiters\DelimiterInterface;
use studxxx\conditionclient\Delimiters\ORDelimiter;

class ORDelimiterTest extends Unit
{
    /** @var array */
    public $data = [];

    /** @var DelimiterInterface */
    protected $delimiter;

    /** @var \Unitunit */
    protected $tester;

    protected function _before()
    {
        $this->delimiter = new ORDelimiter($this->data);
    }

    protected function _after()
    {
    }

    public function testInstance()
    {
        $this->tester->assertInstanceOf('studxxx\conditionclient\Delimiters\DelimiterInterface', $this->delimiter);
    }

    public function testGetDataSuccess()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
