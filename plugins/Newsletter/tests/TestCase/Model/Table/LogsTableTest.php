<?php
namespace Newsletter\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Newsletter\Model\Table\LogsTable;

/**
 * Newsletter\Model\Table\LogsTable Test Case
 */
class LogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Newsletter\Model\Table\LogsTable
     */
    public $Logs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.newsletter.logs',
        'plugin.newsletter.campaigns',
        'plugin.newsletter.templates',
        'plugin.newsletter.mailing_lists',
        'plugin.newsletter.campaigns_mailing_lists',
        'plugin.newsletter.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Logs') ? [] : ['className' => 'Newsletter\Model\Table\LogsTable'];
        $this->Logs = TableRegistry::get('Logs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Logs);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
