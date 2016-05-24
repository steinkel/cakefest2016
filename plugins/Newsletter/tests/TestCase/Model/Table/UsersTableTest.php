<?php
namespace Newsletter\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Newsletter\Model\Table\UsersTable;

/**
 * Newsletter\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Newsletter\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.newsletter.users',
        'plugin.newsletter.logs',
        'plugin.newsletter.campaigns',
        'plugin.newsletter.templates',
        'plugin.newsletter.mailing_lists',
        'plugin.newsletter.campaigns_mailing_lists',
        'plugin.newsletter.mailing_lists_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'Newsletter\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

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
