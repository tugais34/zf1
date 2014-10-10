<?php 

class Form_Film_Add extends Zend_Form
{
    public function init()
    {
        $this->addElement('text', 'title', array(
            'label' => 'Titre',
            'placeholder' => 'Titre',
            'required' => true,
            'class' => 'form-control'
        ));
        
        $this->getElement('title')
             ->addValidator(new Zend_Validate_StringLength(array('max' => 255)))
             ->addFilter(new Zend_Filter_StripTags());
        
        $this->addElement('textarea', 'description', array(
            'label' => 'Description',
            'placeholder' => 'Description du film',
            'cols' => 50,
            'rows' => 7,
            'class' => 'form-control'
        ));
        
        $this->getElement('description')
             ->addFilter(new Zend_Filter_StripTags());
    
        $this->addElement('text', 'releaseYear', array(
            'label' => 'Année de réalisation',
            'placeholder' => 'ex: 2010',
            'class' => 'form-control'
        ));
        
        $this->getElement('releaseYear')
             ->addValidator(new Zend_Validate_Int())
             ->addValidator(new Zend_Validate_StringLength(array('min' => 4, 'max' => 4)));
        
        $this->addElement('text', 'rentalDuration', array(
            'label' => 'Durée de location',
            'placeholder' => 'Durée en jours',
            'required' => true,
            'class' => 'form-control'
        ));
        
        $this->getElement('rentalDuration')
             ->addValidator(new Zend_Validate_Int());
        
        $this->addElement('text', 'rentalRate', array(
            'label' => 'Tarif de location par jour',
            'placeholder' => 'ex : 5,15',
            'required' => true,
            'class' => 'form-control'
        ));
        
        $this->getElement('rentalRate')
            ->addValidator(new Zend_Validate_Float());
        
        $this->addElement('text', 'length', array(
            'label' => 'Durée du film',
            'placeholder' => 'Durée en minutes',
            'class' => 'form-control'
        ));
        
        $this->getElement('length')
             ->addValidator(new Zend_Validate_Int());
       
        $this->addElement('text', 'replacementCost', array(
            'label' => 'Prix de remplacement',
            'placeholder' => 'ex : 21,50',
            'required' => true,
            'class' => 'form-control'
        ));
        
        $this->getElement('replacementCost')
             ->addValidator(new Zend_Validate_Float());
        
        $this->addElement('select', 'rating', array(
            'label' => 'Signalétique',
            'multiOptions' => array(
                'G' => 'Tous publics',
                'PG' => 'Interdit au moins de 10 ans',
                'PG-13' => 'Interdit au moins de 13 ans',
                'R' => 'Interdit au moins de 16 ans',
                'NC-17' => 'Interdit au moins de 18 ans'
            ),
            'class' => 'form-control'
        ));
        
        $this->addElement('multiCheckbox', 'specialFeatures', array(
            'label' => 'Bonus',
            'multiOptions' => array(
                'Trailers' => 'Bandes annonces',
                'Commentaries' => 'Commentaires',
                'Deleted Scenes' => 'Scènes coupées',
                'Behind the Scenes' => 'En coulisse'
            ),
            'class' => 'form-control'
        ));
        
        $this->addElement('select', 'languageId', array(
            'label' => 'Langue',
            'class' => 'form-control'
        ));
        
        $this->addElement('select', 'originalLanguageId', array(
            'label' => 'Langue originale',
            'class' => 'form-control'
        ));
        
        $this->addElement('button', 'add', array(
            'type' => 'submit',
            'label' => 'Enregistrer',
            'class' => 'btn btn-success'
        ));
    }
}