<?php 

class Model_Mapper_Film
{
    /**
     * @var Model_DbTable_Film
     */
    private $filmTable;
    
    /**
     * @param string $where
     * @param string $order
     * @param string $count
     * @param string $offset
     */
    public function fetchAll($where = null, $order = null, $count = null, $offset = null)
    {
        $films = array();
        $result = $this->getFilmTable()->fetchAll($where, $order, $count, $offset);
        
        if (0 === $result->count())
            return false;
        
        foreach ($result as $row)
            $films[] = $this->rowToObject($row);
        
        return $films;
    }
    
    /**
     * @param integer $filmId
     */
    public function find($filmId) 
    {
        $result = $this->getFilmTable()->find($filmId);
        
        if (0 === $result->count())
            return false;
        
        return $this->rowToObject($result[0]);
    }
    
    /**
     * @param Model_Film $film
     */
    public function insert(Model_Film $film)
    {
        $data = $this->objectToRow($film);
        return $this->getFilmTable()->insert($data);
    }
    
    /**
     * @param Model_Film $film
     */
    public function update(Model_Film $film)
    {
        $data = $this->objectToRow($film);
        $where = array('film_id = ?' => $film->getFilmId());
        return $this->getFilmTable()->update($data, $where);
    }
    
    /**
     * @return Model_DbTable_Film
     */
    private function getFilmTable()
    {
        if (null === $this->filmTable)
            $this->filmTable = new Model_DbTable_Film;
        
        return $this->filmTable;
    }
    
    /**
     * @param Model_Film $film
     */
    private function objectToRow(Model_Film $film)
    {
        return array(
            'film_id' => $film->getFilmId(),
            'title' => $film->getTitle(),
            'description' => $film->getDescription(),
            'release_year' => $film->getReleaseYear(),
            'language_id' => $film->getLanguageId(),
            'original_language_id' => $film->getOriginalLanguageId(),
            'rental_duration' => $film->getRentalDuration(),
            'rental_rate' => $film->getRentalRate(),
            'length' => $film->getLength(),
            'replacement_cost' => $film->getReplacementCost(),
            'rating' => $film->getRating(),
            'special_features' => $film->getSpecialFeatures(),
            'last_update' => $film->getLastUpdate()
        );
    }
    
    /**
     * @param array $data
     * @return Model_Film
     */
    private function rowToObject($data)
    {
        $film = new Model_Film;
        $film->setFilmId($data['film_id'])
             ->setTitle($data['title'])
             ->setDescription($data['description'])
             ->setReleaseYear($data['release_year'])
             ->setLanguageId($data['language_id'])
             ->setOriginalLanguageId($data['original_language_id'])
             ->setRentalDuration($data['rental_duration'])
             ->setRentalRate($data['rental_rate'])
             ->setLength($data['length'])
             ->setReplacementCost($data['replacement_cost'])
             ->setRating($data['rating'])
             ->setSpecialFeatures($data['special_features'])
             ->setLastUpdate($data['last_update']);
        return $film;
    }
}