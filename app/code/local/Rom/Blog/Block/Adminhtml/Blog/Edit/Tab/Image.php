<?php
class Rom_Blog_Block_Adminhtml_Blog_Edit_Tab_Image extends Mage_Adminhtml_Block_Widget_Form
{
   protected function _prepareForm()
   {
       $form = new Varien_Data_Form();
       $this->setForm($form);
       $fieldset = $form->addFieldset('blog_form',
                                       array('legend'=>'Gérer les images'));

		$fieldset->addField('image', 'text',
                       array(
                          'label' => 'Nom',
                          'class' => 'required-entry',
                          'required' => true,
                           'name' => 'nom',
                    ));
					
 if ( Mage::registry('blog_data') )
 {
    $form->setValues(Mage::registry('blog_data')->getData());
  }
  return parent::_prepareForm();
 }
}