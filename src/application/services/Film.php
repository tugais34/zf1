<?php 

class Service_Film
{
    /**
     * @var Model_Mapper_Film
     */
    private $filmMapper;
    
    /**
     * @var Model_Mapper_Actor
     */
    private $actorMapper;
    
    /**
     * @var Model_Mapper_Category
     */
    private $categoryMapper;
    
    /**
     * @param Model_Film $film
     */
    public function create(Model_Film $film)
    {
        return $this->getFilmMapper()->insert($film);
    }
    
    public function createCategory($name)
    {
        $category = new Model_Category;
        $category->setName($name);
        $this->getCategoryMapper()->create($category);
    }
    
    public function createActor($data)
    {
        $actor = new Model_Actor;
        $actor->setFirstName(strtoupper($data['firstName']));
        $actor->setLastName(strtoupper($data['lastName']));
        $this->getActorMapper()->create($actor);
    }
    
    /**
     * @param unknown $filmId
     * @return Ambigous <boolean, Model_Film>
     */
    public function read($filmId)
    {
        return $this->getFilmMapper()->find($filmId);
    }
    
    /**
     * @param Model_Film $film
     */
    public function update(Model_Film $film)
    {
        return $this->getFilmMapper()->update($film);
    }
    
    /**
     * @param integer $filmId
     */
    public function delete($filmId)
    {
        $filmTable = new Model_DbTable_Film;
        return $filmTable->delete($filmId);
    }
    
    public function getList($where = null, $order = null, $count = null, $offset = null)
    {
        return $this->getFilmMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    public function getActorList($where = null, $order = null, $count = null, $offset = null)
    {
        return $this->getActorMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    public function getCategoryList($where = null, $order = null, $count = null, $offset = null)
    {
        return $this->getCategoryMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    public function getCategoriesByFilm($filmId)
    {
        return $this->getCategoryList(array('film_id = ?' => $filmId));
    }
    
    /**
     * Lazy loading du mapper Film
     * @return Model_Mapper_Film
     */
    private function getFilmMapper()
    {
        if (null === $this->filmMapper)
            $this->filmMapper = new Model_Mapper_Film;
        
        return $this->filmMapper;
    }
    
    /**
     * Lazy loading du mapper Actor
     * @return Model_Mapper_Actor
     */
    private function getActorMapper()
    {
        if (null === $this->actorMapper)
            $this->actorMapper = new Model_Mapper_Actor();
    
        return $this->actorMapper;
    }
    
    /**
     * Lazy loading du mapper Category
     * @return Model_Mapper_Category
     */
    private function getCategoryMapper()
    {
        if (null === $this->categoryMapper)
            $this->categoryMapper = new Model_Mapper_Category();
    
        return $this->categoryMapper;
    }
}