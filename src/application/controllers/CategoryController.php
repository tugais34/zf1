<?php

class CategoryController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $filmApi = new Service_Film();
        $this->view->categories = $filmApi->getCategoryList();
    }
    
    public function addAction()
    {
        $form = new Form_Category_Add;
        $form->setAction('');
        $this->view->message = '';
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                $filmApi = new Service_Film();
                $filmApi->createCategory($form->getValue('name'));
                $this->view->message = 'Catégorie créée.';
                $form->reset();
            }
        }
        
        $this->view->form = $form;
    }
}