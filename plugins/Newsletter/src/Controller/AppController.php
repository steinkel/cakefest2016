<?php

namespace Newsletter\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;

class AppController extends BaseController
{
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        $this->viewBuilder()->helpers(['Form' => [
            'className' => 'Newsletter.Form'
        ]]);
    }
}
