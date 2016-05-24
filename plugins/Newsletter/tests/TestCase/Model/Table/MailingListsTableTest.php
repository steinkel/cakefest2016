<?php
namespace Newsletter\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Newsletter\Model\Table\MailingListsTable;

/**
 * Newsletter\Model\Table\MailingListsTable Test Case
 */
class MailingListsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Newsletter\Model\Table\MailingListsTable
     */
    public $MailingLists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.newsletter.mailing_lists',
        'plugin.newsletter.campaigns',
        'plugin.newsletter.templates',
        'plugin.newsletter.logs',
        'plugin.newsletter.users',
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
        $config = TableRegistry::exists('MailingLists') ? [] : ['className' => 'Newsletter\Model\Table\MailingListsTable'];
        $this->MailingLists = TableRegistry::get('MailingLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MailingLists);

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
}
