<?php
class Rom_Olivier_Model_Observer extends Varien_Event_Observer
{
   public function __construct()
   {
   }
   public function checkActionObserve($observer)
   {
    	$event = $observer->getEvent(); 	
    	$model = $event->getAction();
	 		//print_r($model);
        //die('olivier');
        
        $data = Mage::getModel('olivier/action');
        switch($model)
		{
			case 'ajout':
				$data->setData('ajout', 1);
			break;
			case 'sauver':
				$data->setData('sauver', 1);
			break;
			case 'suppression':
				$data->setData('suppression', 1);
			break;
		}
		
		date_default_timezone_set('Europe/Paris');
        $data->setData('date_action', date("F j, Y, g:i a"));
		$data->save();
 }
}
?>