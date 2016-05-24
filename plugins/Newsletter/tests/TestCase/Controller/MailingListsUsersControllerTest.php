<?php
namespace Newsletter\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Newsletter\Controller\MailingListsUsersController;

/**
 * Newsletter\Controller\MailingListsUsersController Test Case
 */
class MailingListsUsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.newsletter.mailing_lists_users',
        'plugin.newsletter.users',
        'plugin.newsletter.mailing_lists',
        'plugin.newsletter.campaigns',
        'plugin.newsletter.templates',
        'plugin.newsletter.logs',
        'plugin.newsletter.campaigns_mailing_lists'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
