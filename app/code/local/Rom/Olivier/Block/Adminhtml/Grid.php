<?php
class Rom_Olivier_Block_Adminhtml_Grid extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
     //on indique ou va se trouver le controller
     $this->_controller = 'adminhtml_olivier';
     $this->_blockGroup = 'olivier';
     //le texte du header qui s’affichera dans l’admin
     $this->_headerText = 'Olivier - Annuaire';
     //le nom du bouton pour ajouter une un contact
     $this->_addButtonLabel = 'Ajouter un contact';
     parent::__construct();
     }
}