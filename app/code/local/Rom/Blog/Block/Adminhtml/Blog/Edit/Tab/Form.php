<?php
class Rom_Blog_Block_Adminhtml_Blog_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
   protected function _prepareForm()
   {
       $form = new Varien_Data_Form();
       $this->setForm($form);
       $fieldset = $form->addFieldset('blog_form',
                                       array('legend'=>'Article informations'));
                                       
        $fieldset->addField('titre', 'text',
                       array(
                          'label' => 'Titre',
                          'class' => 'required-entry',
                          'required' => true,
                           'name' => 'titre',
                    ));
        $fieldset->addField('date', 'text',
                    array(
                        'label' => 'Date',
                        'class' => 'required-entry',
                        'required' => true,
                        'name' => 'date',
                 ));                  
                 
        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig(
        	  array('add_variables' => false, 
        			'add_widgets' => false
        			//'add_images' => true,
        			//'files_browser_window_url' => Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg_images/index'),
          			//'files_browser_window_width' => (int) Mage::getConfig()->getNode('adminhtml/cms/browser/window_width'),
          			//'files_browser_window_height'=> (int) Mage::getConfig()->getNode('adminhtml/cms/browser/window_height')
          			));
        $fieldset->addField('message', 'editor', array(
            'name'      => 'message',
            'style'     => 'height:18em; width:400px;',
            'required'  => true,
            'wysiwyg'	=> true,
            'config'    => $wysiwygConfig,
        ));
        /*$fieldset->addField('message', 'text',
                         array(
                          'label' => 'Message',
                          'class' => 'required-entry',
                          'required' => true,
                          'name' => 'message',
                      ));
        */
        
 if ( Mage::registry('blog_data') )
 {
    $form->setValues(Mage::registry('blog_data')->getData());
  }
  return parent::_prepareForm();
 }
}