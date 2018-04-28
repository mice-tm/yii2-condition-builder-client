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
    public function testInstance()
    {
        $this->tester->assertInstanceOf('studxxx\conditionclient\Delimiters\DelimiterInterface', $this->delimiter);
    }

    public function testCheckSuccess()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testGetDataSuccess()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testSetDataSuccess()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testSetOperatorSuccess()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testSetConditionSuccess()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
