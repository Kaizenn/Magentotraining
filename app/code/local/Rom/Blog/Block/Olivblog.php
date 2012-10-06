<?php
class Rom_Blog_Block_Olivblog extends Mage_Core_Block_Template
{
	public function afficheBlog() 
	{
		$retour='';
		$model = $this->getBlogModel();
		$collection = Mage::getModel('blog/mymodel')->getCollection()->setOrder('id_rom_blog','asc');
		foreach($collection as $data)
    	{
            $retour .= '<h1>#'.$data->getData('id_rom_blog').' '.$data->getData('titre').'</h1> <p>'.$data->getData('message').'</p> </b>'.$data->getData('image').'<br />'.$data->getData('date').'<hr />';
    	}
    	return $retour;
	}
	
	public function getLastMessage()
	{
		$retour='';
		$model = $this->getBlogModel();
		$collection = Mage::getModel('blog/mymodel')->getCollection()->setOrder('id_rom_blog','desc');
		foreach($collection as $data)
    	{
            $retour = '<h1>#'.$data->getData('id_rom_blog').' '.$data->getData('titre').'</h1> <p>'.$data->getData('message').'</p> </b>'.$data->getData('image').'<br />'.$data->getData('date').'<hr />';
    		break;
    	}
    	return $retour;
	}
}
?>