<?php
class Rom_Blog_Block_Adminhtml_Blog_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
   public function __construct()
   {
       parent::__construct();
       $this->setId('contactGrid');
       $this->setDefaultSort('id_rom_blog');
       $this->setDefaultDir('DESC');
       $this->setSaveParametersInSession(true);
   }
   protected function _prepareCollection()
   {
      $collection = Mage::getModel('blog/mymodel')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
    }
   protected function _prepareColumns()
   {
       $this->addColumn('id_rom_blog',
             array(
                    'header' => 'ID',
                    'align' =>'right',
                    'width' => '50px',
                    'index' => 'id_rom_blog',
               ));
       $this->addColumn('titre',
               array(
                    'header' => 'Titre',
                    'align' =>'left',
                    'index' => 'titre',
              ));
       $this->addColumn('message', array(
                    'header' => 'Message',
                    'align' =>'left',
                    'index' => 'message',
             ));
        $this->addColumn('image', array(
                     'header' => 'Image',
                     'align' =>'left',
                     'index' => 'image',
          ));
          $this->addColumn('date', array(
                     'header' => 'Date',
                     'align' =>'left',
                     'index' => 'date',
          ));
         return parent::_prepareColumns();
    }
    public function getRowUrl($row)
    {
         return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}