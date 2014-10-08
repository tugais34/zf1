<?php

class ActorController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $filmApi = new Service_Film();
        $this->view->actors = $filmApi->getActorList();
    }
}