<?php 

class Model_Language
{
    /**
     * @var integer
     */
    private $languageId;
    
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var string
     */
    private $lastUpdate;
    
	/**
     * @return the $languageId
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

	/**
     * @param number $languageId
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;
        return $this;
    }

	/**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

	/**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

	/**
     * @return the $lastUpdate
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

	/**
     * @param string $lastUpdate
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }
    
    public function getNameToFr()
    {
        if ($this->getName() == 'English')
            return 'Anglais';
        elseif ($this->getName() == 'Italian')
            return 'Italien';
        elseif ($this->getName() == 'Japanese')
            return 'Japonais';
        elseif ($this->getName() == 'Mandarin')
            return 'Chinois';
        elseif ($this->getName() == 'French')
            return 'Français';
        elseif ($this->getName() == 'German')
            return 'Allemand';
        else
            return $this->getName();
    }
}