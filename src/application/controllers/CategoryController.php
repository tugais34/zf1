<?php

class CategoryController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $filmApi = new Service_Film();
        $this->view->categories = $filmApi->getCategoryList();
    }
}