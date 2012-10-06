  <?php
  class Rom_Olivier_Block_Adminhtml_Olivier_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
  {
     public function __construct()
     {
          parent::__construct();
          $this->setId('olivier_tabs');
          $this->setDestElementId('edit_form');
          $this->setTitle('Information sur le contact');
      }
      protected function _beforeToHtml()
      {
          $this->addTab('form_section', array(
                   'label' => 'Contact Information',
                   'title' => 'Contact Information',
                   'content' => $this->getLayout()
     ->createBlock('olivier/adminhtml_olivier_edit_tab_form')
     ->toHtml()
         ));
         return parent::_beforeToHtml();
    }
}