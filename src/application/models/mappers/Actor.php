<?php 

class Model_Mapper_Actor
{
    /**
     * @var Model_DbTable_Actor
     */
    private $actorTable;
    
    public function create(Model_Actor $actor)
    {
        $data = $this->objectToRow($actor);
        return $this->getActorTable()->insert($data);
    }
    
    public function read($actorId)
    {
        $result = $this->getActorTable()->find($actorId);
        
        if (0 === $result->count())
            return false;
        
        return $this->rowToObject($result[0]);
    }
    
    public function update(Model_Actor $actor)
    {
        $data = $this->objectToRow($actor);
        $where = array('actor_id = ?' => $actor->getActorId());
        return $this->getActorTable()->update($data, $where);
    }
    
    public function delete($actorId)
    {
        return $this->getActorTable()->delete($actorId);
    }
    
    public function fetchAll($where = null, $order = null, $count = null, $offset = null)
    {
        $actors = array();
        $result = $this->getActorTable()->fetchAll($where, $order, $count, $offset);
        
        if (0 === $result->count())
            return false;
        
        foreach ($result as $row)
            $actors[] = $this->rowToObject($row);
        
        return $actors;
    }
    
    public function fetchByFilm($filmId)
    {
        $actors = array();
        $table = new Model_DbTable_FilmActor;
        $result = $table->fetchAll(array('film_id = ?' => $filmId));
    
        foreach ($result as $row)
            $actors[] = $this->read($row['actor_id']);
    
        return $actors;
    }
    
    /**
     * @return Model_DbTable_Actor
     */
    private function getActorTable()
    {
        if (null === $this->actorTable)
            $this->actorTable = new Model_DbTable_Actor();
        
        return $this->actorTable;
    }
    
    /**
     * @return Model_Actor
     */
    private function rowToObject($data)
    {
        $actor = new Model_Actor();
        $actor->setActorId($data['actor_id'])
              ->setFirstName($data['first_name'])
              ->setLastName($data['last_name'])
              ->setLastUpdate($data['last_update']);
        return $actor;
    }
    
    /**
     * @param Model_Actor $actor 
     */
    private function objectToRow(Model_Actor $actor)
    {
        return array(
            'actor_id' => $actor->getActorId(),
            'first_name' => $actor->getFirstName(),
            'last_name' => $actor->getLastName(),
            'last_update' => $actor->getLastUpdate()
        );
    }
}