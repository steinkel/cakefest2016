<?php
namespace Newsletter\Test\TestCase\Form;

use Cake\TestSuite\TestCase;
use Newsletter\Form\CreateCampaignForm;

/**
 * Newsletter\Form\CreateCampaignForm Test Case
 */
class CreateCampaignFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Newsletter\Form\CreateCampaignForm
     */
    public $CreateCampaign;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->CreateCampaign = new CreateCampaignForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CreateCampaign);

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
