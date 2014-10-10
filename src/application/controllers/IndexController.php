<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $filmApi = new Service_Film;
        $this->view->films = $filmApi->getList(null, 'last_update DESC', 10);
    }
    
    public function filmAction()
    {
        $filmId = (int) $this->getRequest()->getParam('filmid');
        $filmApi = new Service_Film;
        $this->view->film = $filmApi->read($filmId);
        // $this->view->categories = $filmApi->getCategoriesByFilm($filmId);
        
        if (! $this->view->film)
            throw new Zend_Controller_Action_Exception('Film inexistant', 404);
    }
    
    public function deleteAction()
    {
        $filmId = (int) $this->getRequest()->getParam('filmid');
        $filmApi = new Service_Film;
        $filmApi->delete($filmId);
        $this->_request('/');
    }
    
    public function addAction()
    {
        $form = new Form_Film_Add;
        $filmApi = new Service_Film();
        $languageArray = array();
        $languages = $filmApi->getLanguageList();
        
        foreach ($languages as $language)
            $languageArray[$language->getLanguageId()] =  $language->getNameToFr();
        
        $originalLanguageArray = array('null' => '');
        $originalLanguageArray = array_merge($originalLanguageArray, $languageArray);
        
        $form->getElement('languageId')->options = $languageArray;
        $form->getElement('originalLanguageId')->options = $originalLanguageArray;
        $form->setAction('');
        $this->view->message = '';
    
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                $filmApi->createFilm($form->getValues());
                $this->view->message = 'Film créé.';
                $form->reset();
            }
        }
    
        $this->view->form = $form;
    }
}