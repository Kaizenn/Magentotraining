<?php
class Rom_Olivier_Block_Catalog_Navigation_Menuleft extends Mage_Catalog_Block_Product_View
{
   public function getNavigationProducts($categoryId)
   {
     $_productCollection = Mage::getResourceModel('catalog/product_collection')
		->addCategoryFilter(Mage::getModel('catalog/category')->load($categoryId))
		->addAttributeToSelect(Mage::getSingleton('catalog/config')->getProductAttributes());
	
	return $_productCollection;
   }

}

?>