<?php
namespace Newsletter\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Newsletter\Model\Table\CampaignsMailingListsTable;

/**
 * Newsletter\Model\Table\CampaignsMailingListsTable Test Case
 */
class CampaignsMailingListsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Newsletter\Model\Table\CampaignsMailingListsTable
     */
    public $CampaignsMailingLists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.newsletter.campaigns_mailing_lists',
        'plugin.newsletter.campaigns',
        'plugin.newsletter.templates',
        'plugin.newsletter.logs',
        'plugin.newsletter.mailing_lists'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CampaignsMailingLists') ? [] : ['className' => 'Newsletter\Model\Table\CampaignsMailingListsTable'];
        $this->CampaignsMailingLists = TableRegistry::get('CampaignsMailingLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CampaignsMailingLists);

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
