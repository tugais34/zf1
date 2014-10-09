<?php 

class Form_Actor_Add extends Zend_Form
{
    public function init()
    {
        $this->addElement('text', 'firstName', array(
            'label' => 'Prénom',
            'placeholder' => 'Prénom',
            'required' => true
        ));
        
        $this->getElement('firstName')
             ->addValidator(new Zend_Validate_StringLength(array('max' => 45)))
             ->addValidator(new Zend_Validate_Alnum())
             ->addFilter(new Zend_Filter_StripTags());
        
        
        $this->addElement('text', 'lastName', array(
            'label' => 'Nom',
            'placeholder' => 'Nom',
            'required' => true
        ));
        
        $this->getElement('lastName')
             ->addValidator(new Zend_Validate_StringLength(array('max' => 45)))
             ->addValidator(new Zend_Validate_Alnum())
             ->addFilter(new Zend_Filter_StripTags());
    
        $this->addElement('button', 'add', array(
            'type' => 'submit',
            'label' => 'Enregistrer',
            'class' => 'btn btn-success'
        ));
    }
}