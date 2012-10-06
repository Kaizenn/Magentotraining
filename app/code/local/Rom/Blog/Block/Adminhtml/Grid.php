<?php
class Rom_Blog_Block_Adminhtml_Grid extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
     //on indique ou va se trouver le controller
     $this->_controller = 'adminhtml_blog';
     $this->_blockGroup = 'blog';
     //le texte du header qui s’affichera dans l’admin
     $this->_headerText = 'Blog';
     //le nom du bouton pour ajouter une un contact
     $this->_addButtonLabel = 'Ajouter un message';
     parent::__construct();
     }
}