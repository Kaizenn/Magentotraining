<?php
class Rom_Blog_Model_Mysql4_Mymodel extends Mage_Core_Model_Mysql4_Abstract
{
     public function _construct()
     {
         $this->_init('blog/mymodel', 'id_rom_blog');
     }
}