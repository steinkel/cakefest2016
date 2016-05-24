<?php
namespace Newsletter\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Newsletter\Model\Table\CampaignsTable;

/**
 * Newsletter\Model\Table\CampaignsTable Test Case
 */
class CampaignsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Newsletter\Model\Table\CampaignsTable
     */
    public $Campaigns;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.newsletter.campaigns',
        'plugin.newsletter.templates',
        'plugin.newsletter.logs',
        'plugin.newsletter.mailing_lists',
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
        $config = TableRegistry::exists('Campaigns') ? [] : ['className' => 'Newsletter\Model\Table\CampaignsTable'];
        $this->Campaigns = TableRegistry::get('Campaigns', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Campaigns);

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
