<?php

class ActorController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $filmApi = new Service_Film();
        $this->view->actors = $filmApi->getActorList();
    }
    
    public function addAction()
    {
        $form = new Form_Actor_Add;
        $form->setAction('');
        $this->view->message = '';
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                $filmApi = new Service_Film();
                $filmApi->createActor($form->getValues());
                $this->view->message = 'Acteur créé.';
                $form->reset();
            }
        }
        
        $this->view->form = $form;
    }
}