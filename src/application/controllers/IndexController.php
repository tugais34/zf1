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
}