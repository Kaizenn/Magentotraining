<?php
/**
 *	Ce fichier sert a définir la collection pour votre model olivier/olivier.
 */
?>

<?php
class Rom_Olivier_Model_Mysql4_Action_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
 {
     public function _construct()
     {
         parent::_construct();
         $this->_init('olivier/action');
     }
}