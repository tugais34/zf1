<?php

class Model_Film
{
    /**
     * @var integer
     */
    private $filmId;
    
    /**
     * @var string
     */
    private $title;
    
    /**
     * @var string
     */
    private $description;
    
    /**
     * @var integer
     */
    private $releaseYear;
    
    /**
     * @var integer
     */
    private $languageId;
    
    /**
     * @var integer
     */
    private $originalLanguageId;
    
    /**
     * @var integer
     */
    private $rentalDuration;
    
    /**
     * @var float
     */
    private $rentalRate;
    
    /**
     * @var integer
     */
    private $length;
    
    /**
     * @var float
     */
    private $replacementCost;
    
    /**
     * @var string
     */
    private $rating;
    
    /**
     * @var string
     */
    private $specialFeatures;
    
    /**
     * @var string
     */
    private $lastUpdate;
    
    private $categories;
    
    private $actors;
    
	/**
     * @return the $filmId
     */
    public function getFilmId()
    {
        return $this->filmId;
    }

    /**
     * @param number $filmId
     * @return Model_Film
     */
    public function setFilmId($filmId)
    {
        $this->filmId = $filmId;
        return $this;
    }

	/**
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Model_Film
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

	/**
     * @return the $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Model_Film
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

	/**
     * @return the $releaseYear
     */
    public function getReleaseYear()
    {
        return $this->releaseYear;
    }

    /**
     * @param number $releaseYear
     * @return Model_Film
     */
    public function setReleaseYear($releaseYear)
    {
        $this->releaseYear = $releaseYear;
        return $this;
    }

	/**
     * @return the $languageId
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @param number $languageId
     * @return Model_Film
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;
        return $this;
    }

	/**
     * @return the $originalLanguageId
     */
    public function getOriginalLanguageId()
    {
        return $this->originalLanguageId;
    }

    /**
     * @param number $originalLanguageId
     * @return Model_Film
     */
    public function setOriginalLanguageId($originalLanguageId)
    {
        $this->originalLanguageId = $originalLanguageId;
        return $this;
    }

	/**
     * @return the $rentalDuration
     */
    public function getRentalDuration()
    {
        return $this->rentalDuration;
    }

    /**
     * @param number $rentalDuration
     * @return Model_Film
     */
    public function setRentalDuration($rentalDuration)
    {
        $this->rentalDuration = $rentalDuration;
        return $this;
    }

	/**
     * @return the $rentalRate
     */
    public function getRentalRate()
    {
        return $this->rentalRate;
    }

    /**
     * @param number $rentalRate
     * @return Model_Film
     */
    public function setRentalRate($rentalRate)
    {
        $this->rentalRate = $rentalRate;
        return $this;
    }

	/**
     * @return the $length
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param number $length
     * @return Model_Film
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

	/**
     * @return the $replacementCost
     */
    public function getReplacementCost()
    {
        return $this->replacementCost;
    }

    /**
     * @param number $replacementCost
     * @return Model_Film
     */
    public function setReplacementCost($replacementCost)
    {
        $this->replacementCost = $replacementCost;
        return $this;
    }

	/**
     * @return the $rating
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     * @return Model_Film
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }

	/**
     * @return the $specialFeatures
     */
    public function getSpecialFeatures()
    {
        
        return $this->specialFeatures;
    }

    /**
     * @param string $specialFeatures
     * @return Model_Film
     */
    public function setSpecialFeatures($specialFeatures)
    {
        $this->specialFeatures = $specialFeatures;
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
     * @return Model_Film
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }
    
    public function getCategories()
    {
        if (null === $this->categories) {
            $categoryMapper = new Model_Mapper_Category();
            $this->categories = $categoryMapper->fetchByFilm($this->filmId);
        }
        
        return $this->categories;
    }
    
    public function getActors()
    {
        if (null === $this->actors) {
            $actorMapper = new Model_Mapper_Actor();
            $this->actors = $actorMapper->fetchByFilm($this->filmId);
        }
    
        return $this->actors;
    }
}
