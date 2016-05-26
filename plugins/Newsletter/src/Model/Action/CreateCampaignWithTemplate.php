<?php
namespace Newsletter\Model\Action;

use Newsletter\Model\Entity\Campaign;
use Newsletter\Model\Entity\Template;
use Newsletter\Model\Table\TemplatesTable;

class CreateCampaignWithTemplate
{

    protected $templatesTable;

    protected $action;

    public function __construct($templates, CreateCampaign $action)
    {
        $this->templatesTable = $templates;
        $this->action = $action;
    }

    public function __invoke(Campaign $campaign, array $properties)
    {
        $template = $this->templatesTable->newEntity([
            'name' => 'some_name',
            'subject' => 'Edit me!',
            'body' => 'Edit me too!!!1!'
        ]);
        $action = $this->action;
        return $action($campaign, $template, $properties);
    }
}

