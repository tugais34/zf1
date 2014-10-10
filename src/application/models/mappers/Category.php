<?php 

class Model_Mapper_Category
{
    /**
     * @var Model_DbTable_Category
     */
    private $categoryTable;
    
    public function create(Model_Category $category)
    {
        $data = $this->objectToRow($category);
        return $this->getCategoryTable()->insert($data);
    }
    
    public function read($categoryId)
    {
        $result = $this->getCategoryTable()->find($categoryId);
        
        if (0 === $result->count())
            return false;
        
        return $this->rowToObject($result[0]);
    }
    
    public function update(Model_Category $category)
    {
        $data = $this->objectToRow($category);
        $where = array('category_id = ?' => $category->getCategoryId());
        return $this->getCategoryTable()->update($data, $where);
    }
    
    public function delete($categoryId)
    {
        return $this->getCategoryTable()->delete($categoryId);
    }
    
    public function fetchAll($where = null, $order = null, $count = null, $offset = null)
    {
        $categories = array();
        $result = $this->getCategoryTable()->fetchAll($where, $order, $count, $offset);
        
        if (0 === $result->count())
            return false;
        
        foreach ($result as $row)
            $categories[] = $this->rowToObject($row);
        
        return $categories;
    }
    
    public function fetchByFilm($filmId)
    {
        $categories = array();
        $table = new Model_DbTable_FilmCategory;
        $result = $table->fetchAll(array('film_id = ?' => $filmId));
        
        foreach ($result as $row)
            $categories[] = $this->read($row['category_id']);
        
        return $categories;
    }
    
    /**
     * @return Model_DbTable_Category
     */
    private function getCategoryTable()
    {
        if (null === $this->categoryTable)
            $this->categoryTable = new Model_DbTable_Category;
        
        return $this->categoryTable;
    }
    
    /**
     * @return Model_Category
     */
    private function rowToObject($data)
    {
        $category = new Model_Category;
        $category->setCategoryId($data['category_id'])
              ->setName($data['name'])
              ->setLastUpdate($data['last_update']);
        return $category;
    }
    
    /**
     * @param Model_Category $category 
     */
    private function objectToRow(Model_Category $category)
    {
        return array(
            'category_id' => $category->getCategoryId(),
            'name' => $category->getName(),
            'last_update' => $category->getLastUpdate()
        );
    }
}