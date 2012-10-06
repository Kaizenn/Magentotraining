<?php
class Rom_Olivier_Block_Olivbloc extends Mage_Core_Block_Template
{
	public function mainFonction() {
		return 'Ceci est la méthode methodbloc() @ Rom_Olivier_Block_Olivbloc';
	}
	
	 public function afficheAnnuaire()
    {
		//on initialize la variable
        $retour='';
        /* on fait une requette : aller chercher Tous les elements
        de la table rom_olivier (grace à notre model olivier/olivier
    	et les trier par id_rom_olivier */
	$collection = Mage::getModel('olivier/olivier')->getCollection()->setOrder('id_rom_olivier','asc');
        /* ensuite on parcours le resultat de la requette et
        avec la fonction getData(), on stocke dans la variable retour
    	(pour l’affichage dans le template) les données voulues */
    	foreach($collection as $data)
    	{
            $retour .= '<b>'.$data->getData('nom').' '.$data->getData('prenom').' : </b>'.$data->getData('telephone').'<br />';
    	}
    	return $retour;
	}
	
	public function saveAnnuaire()
 	{
		//on recuperes les données envoyées en POST
		$nom = ''.$this->getRequest()->getPost('nom');
		$prenom = ''.$this->getRequest()->getPost('prenom');
		$telephone = ''.$this->getRequest()->getPost('telephone');
		
		//on verifie que les champs ne sont pas vide
		if(isset($nom)&&($nom!='') && isset($prenom)&&($prenom!='') && isset($telephone)&&($telephone!='') )
		{
		  //on cree notre objet et on l'enregistre en base
		  $contact = Mage::getModel('olivier/olivier');
		  $contact->setData('nom', $nom);
		  $contact->setData('prenom', $prenom);
		  $contact->setData('telephone', $telephone);
		  $contact->save();
		}
	}
	
    public function supprimerAnnuaire()
    {
        $retour='';    	
        $model = Mage::getModel('olivier/olivier');
		for($i=0; $i<count($_POST['choix']);$i++)
		{			
			if(isset($_POST['choix'][$i])):
				$model->setId($_POST['choix'][$i])->delete();				
			endif;
		}
		$collection = $model->getCollection()->setOrder('id_rom_olivier','asc');
    	$i=0;
    	foreach($collection as $data)
    	{
            $retour .= '<div class="contact"><input type="checkbox" name="choix[]" name="" value="'.$data->getData('id_rom_olivier').'"> '.$data->getData('nom').' '.$data->getData('prenom').' : '.$data->getData('telephone').
            		   '</div>';
    		$i++;
    	}
    	return $retour;
	}
}
?>