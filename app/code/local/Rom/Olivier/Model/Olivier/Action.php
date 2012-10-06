<?php
/**
 *	Ceci est votre model Olivier, vous lui indiquez que c’est une entitée olivier de votre module Olivier.
 */
?>
<?php
class Rom_Olivier_Model_Olivier_Action extends Mage_Core_Model_Abstract
{
     public function _construct()
     {
         parent::_construct();
         $this->_init('olivier/olivier_action');
     }
}
?>