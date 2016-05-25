<?php
namespace Newsletter\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use Newsletter\Model\Behavior\ImportCSVBehavior;

/**
 * Newsletter\Model\Behavior\ImportCSVBehavior Test Case
 */
class ImportCSVBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Newsletter\Model\Behavior\ImportCSVBehavior
     */
    public $ImportCSV;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->ImportCSV = new ImportCSVBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ImportCSV);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
