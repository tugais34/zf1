<?php 

class Model_Mapper_Language
{
    /**
     * @var Model_DbTable_Language
     */
    private $languageTable;
    
    public function create(Model_Language $language)
    {
        $data = $this->objectToRow($language);
        return $this->getLanguageTable()->insert($data);
    }
    
    public function read($languageId)
    {
        $result = $this->getLanguageTable()->find($languageId);
        
        if (0 === $result->count())
            return false;
        
        return $this->rowToObject($result[0]);
    }
    
    public function update(Model_Language $language)
    {
        $data = $this->objectToRow($language);
        $where = array('language_id = ?' => $language->getLanguageId());
        return $this->getLanguageTable()->update($data, $where);
    }
    
    public function delete($languageId)
    {
        return $this->getLanguageTable()->delete($languageId);
    }
    
    public function fetchAll($where = null, $order = null, $count = null, $offset = null)
    {
        $languages = array();
        $result = $this->getLanguageTable()->fetchAll($where, $order, $count, $offset);
        
        if (0 === $result->count())
            return false;
        
        foreach ($result as $row)
            $languages[] = $this->rowToObject($row);
        
        return $languages;
    }
    
    /**
     * @return Model_DbTable_Language
     */
    private function getLanguageTable()
    {
        if (null === $this->languageTable)
            $this->languageTable = new Model_DbTable_Language;
        
        return $this->languageTable;
    }
    
    /**
     * @return Model_Language
     */
    private function rowToObject($data)
    {
        $language = new Model_Language;
        $language->setLanguageId($data['language_id'])
              ->setName($data['name'])
              ->setLastUpdate($data['last_update']);
        return $language;
    }
    
    /**
     * @param Model_Language $language 
     */
    private function objectToRow(Model_Language $language)
    {
        return array(
            'language_id' => $language->getLanguageId(),
            'name' => $language->getName(),
            'last_update' => $language->getLastUpdate()
        );
    }
}