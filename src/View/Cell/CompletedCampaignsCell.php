<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * CompletedCampaigns cell
 */
class CompletedCampaignsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $campaigns = $this->loadModel('Newsletter.Campaigns');
        $completed = $campaigns->find()->where(['status' => 'completed'])->toList();
        $this->set(compact('completed'));
    }
}
