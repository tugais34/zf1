<?php 

class Model_DbTable_FilmActor extends Zend_Db_Table_Abstract
{
    protected $_name = 'film_actor';
    protected $_primary = array('actor_id', 'film_id');
}