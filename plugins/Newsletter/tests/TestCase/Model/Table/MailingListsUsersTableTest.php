<?php
namespace Newsletter\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Newsletter\Model\Table\MailingListsUsersTable;

/**
 * Newsletter\Model\Table\MailingListsUsersTable Test Case
 */
class MailingListsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Newsletter\Model\Table\MailingListsUsersTable
     */
    public $MailingListsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.newsletter.mailing_lists_users',
        'plugin.newsletter.mailing_lists',
        'plugin.newsletter.campaigns',
        'plugin.newsletter.templates',
        'plugin.newsletter.logs',
        'plugin.newsletter.users',
        'plugin.newsletter.campaigns_mailing_lists'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MailingListsUsers') ? [] : ['className' => 'Newsletter\Model\Table\MailingListsUsersTable'];
        $this->MailingListsUsers = TableRegistry::get('MailingListsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MailingListsUsers);

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
