<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\HtmlHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\HtmlHelper Test Case
 */
class HtmlHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\HtmlHelper
     */
    public $Html;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Html = new HtmlHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Html);

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
