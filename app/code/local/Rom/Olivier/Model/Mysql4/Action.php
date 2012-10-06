<?php
/**
 *	C’est ici que vous indiquez a Magento que votre model olivier/olivier va utiliser comme clef primaire le champ id_rom_olivier.
 */
?>

<?php
class Rom_Olivier_Model_Mysql4_Action extends Mage_Core_Model_Mysql4_Abstract
{
     public function _construct()
     {
         $this->_init('olivier/action', 'id_rom_olivier_action');
     }
}