<?php
namespace Newsletter\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Newsletter\Model\Action\CreateCampaignWithTemplate;
use Newsletter\Model\Action\CreateCampaign;

/**
 * CreateCampaign Form.
 */
class CreateCampaignForm extends Form
{

    protected $Campaigns;

    public function __construct($campaigns)
    {
        $this->Campaigns = $campaigns;
    }

    /**
     * Builds the schema for the modelless form
     *
     * @param Schema $schema From schema
     * @return $this
     */
    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('name', 'string');
    }

    /**
     * Form validation builder
     *
     * @param Validator $validator to use against the form
     * @return Validator
     */
    protected function _buildValidator(Validator $validator)
    {
        return $validator->notEmpty('name', 'You lose!');
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @return bool
     */
    protected function _execute(array $data)
    {
       $action = new CreateCampaign($this->Campaigns);
       $template = null;

       if (empty($data['template_id'])) {
        $action = new CreateCampaignWithTemplate(
            $this->Campaigns->Templates,
            $action
        );
       } else {
           $template = $this->Campaigns->Templates->get($data['template_id']);
       }

       $campaign = $this->Campaigns->newEntity();
       $campaign = $action($campaign, $data, $template);
       return !$campaign->errors();
    }
}
