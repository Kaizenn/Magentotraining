<?php
class Rom_Blog_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu('blog/set_time')
                ->_addBreadcrumb('blog Manager','blog Manager');
       return $this;
     }
      public function indexAction()
      {
         $this->_initAction();
         $this->renderLayout();
      }
      public function editAction()
      {      
           $olivierId = $this->getRequest()->getParam('id');
           $olivierModel = Mage::getModel('blog/mymodel')->load($olivierId);
           if ($olivierModel->getId() || $olivierId == 0)
           {            
             Mage::register('blog_data', $olivierModel);
             $this->loadLayout();
             $this->_setActiveMenu('blog/set_time');
             $this->_addBreadcrumb('blog Manager', 'blog Manager');
             $this->_addBreadcrumb('blog Description', 'blog Description');             
             if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
				$this->getLayout()->getBlock('head')
				->setCanLoadTinyMce(true)
				->setCanLoadExtJs(true)
				->addItem('js','tiny_mce/tiny_mce.js')
				->addItem('js','mage/adminhtml/wysiwyg/tiny_mce/setup.js')
				->addJs('mage/adminhtml/browser.js')
				->addJs('prototype/window.js')
				->addJs('lib/flex.js')
				->addJs('mage/adminhtml/flexuploader.js')
				->addItem('js_css','prototype/windows/themes/default.css')
				->addItem('js_css','prototype/windows/themes/magento.css');
			 }
             $this->_addContent($this->getLayout()
                  ->createBlock('blog/adminhtml_blog_edit'))
                  ->_addLeft($this->getLayout()
                  ->createBlock('blog/adminhtml_blog_edit_tabs')
              );
             $this->renderLayout();
           }
           else
           {
                 Mage::getSingleton('adminhtml/session')
                       ->addError('blog does not exist');
                 $this->_redirect('*/*/');
            }
       }
       public function newAction()
       {
          $this->_forward('edit');
       }
       public function saveAction()
       {          	
         if ($this->getRequest()->getPost())
         {
         	if(isset($_FILES['fileinputname']['name']) and (file_exists($_FILES['fileinputname']['tmp_name']))) {
			  try {
				$uploader = new Varien_File_Uploader('fileinputname');
				$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png')); // or pdf or anything
			 
			 
				$uploader->setAllowRenameFiles(false);
			 
				// setAllowRenameFiles(true) -> move your file in a folder the magento way
				// setAllowRenameFiles(true) -> move your file directly in the $path folder
				$uploader->setFilesDispersion(false);
			   
				$path = Mage::getBaseDir('media') . DS ;
						   
				$uploader->save($path, $_FILES['fileinputname']['name']);
			 
				$data['fileinputname'] = $_FILES['fileinputname']['name'];
			  }catch(Exception $e) {
			 
			  }
			}
           try {
                 $postData = $this->getRequest()->getPost();
                 $olivierModel = Mage::getModel('blog/mymodel');
               if( $this->getRequest()->getParam('id') <= 0 )               	
                  $olivierModel->setCreatedTime(
                     Mage::getSingleton('core/date')
                            ->gmtDate()
                    );
                  $olivierModel
                    ->addData($postData)
                    ->setUpdateTime(
                             Mage::getSingleton('core/date')
                             ->gmtDate())
                    ->setId($this->getRequest()->getParam('id'))
                    ->save();
                    
                    // Observeur
					// $data = array( 'data' => 'foo', 'layout' => $this->getLayout());
					// Mage::dispatchEvent('rom_olivier_action');
					 
                 Mage::getSingleton('adminhtml/session')
                               ->addSuccess('successfully saved');
                 Mage::getSingleton('adminhtml/session')
                                ->setolivierData(false);
                 $this->_redirect('*/*/');
                return;
          } catch (Exception $e){
                Mage::getSingleton('adminhtml/session')
                                  ->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')
                 ->setolivierData($this->getRequest()
                                    ->getPost()
                );
                $this->_redirect('*/*/edit',
                            array('id' => $this->getRequest()
                                                ->getParam('id')));
                return;
                }
              }
              $this->_redirect('*/*/');
            }
          public function deleteAction()
          {          
              if($this->getRequest()->getParam('id') > 0)
              {
                try
                {
                    $olivierModel = Mage::getModel('blog/mymodel');
                    $olivierModel->setId($this->getRequest()
                                        ->getParam('id'))
                              ->delete();
                    Mage::getSingleton('adminhtml/session')
                               ->addSuccess('successfully deleted');
                    $this->_redirect('*/*/');
                 }
                 catch (Exception $e)
                  {
                           Mage::getSingleton('adminhtml/session')
                                ->addError($e->getMessage());
 $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                  }
             }
            $this->_redirect('*/*/');
       }
}
?>