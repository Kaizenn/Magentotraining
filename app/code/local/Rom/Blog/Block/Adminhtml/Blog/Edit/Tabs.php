  <?php
  class Rom_Blog_Block_Adminhtml_Blog_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
  {
     public function __construct()
     {
          parent::__construct();
          $this->setId('blog_tabs');
          $this->setDestElementId('edit_form');
          $this->setTitle('Message');
      }
      protected function _beforeToHtml()
      {
          $this->addTab('form_section', array(
                   'label' => 'Liste des messages',
                   'title' => 'Liste des messages',
                   'content' => $this->getLayout()
     ->createBlock('blog/adminhtml_blog_edit_tab_form')
     ->toHtml()
         ));
         $this->addTab('image_section', array(
                   'label' => 'Images',
                   'title' => 'Images',
                   'content' => $this->getLayout()
     ->createBlock('blog/adminhtml_blog_edit_tab_image')
     ->toHtml()
         ));
         return parent::_beforeToHtml();
    }
}