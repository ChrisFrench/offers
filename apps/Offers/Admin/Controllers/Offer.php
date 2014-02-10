<?php 
namespace Offers\Admin\Controllers;

class Offer extends \Admin\Controllers\BaseAuth 
{
	use \Dsc\Traits\Controllers\CrudItem;
	
	protected $list_route = '/admin/offers';
	protected $create_item_route = '/admin/offers/create';
	protected $get_item_route = '/admin/offers/view/{id}';
	protected $edit_item_route = '/admin/offers/edit/{id}';
	
	protected function getModel()
	{
		$model = new \Offers\Models\Offers;
		return $model;
	}
	
	protected function getItem()
	{
		$f3 = \Base::instance();
		$id = $this->inputfilter->clean( $f3->get('PARAMS.id'), 'alnum' );
		$model = $this->getModel()
		->setState('filter.id', $id);
		
		try {
			$item = $model->getItem();
		} catch ( \Exception $e ) {
			\Dsc\System::instance()->addMessage( "Invalid Item: " . $e->getMessage(), 'error');
			$f3->reroute( $this->list_route );
			return;
		}
	
		return $item;
	}
	
	function makeAlias($string) {
			// Remove any '-' from the string since they will be used as concatenaters
		$str = str_replace('-', ' ', $string);

		// Trim white spaces at beginning and end of alias and make lowercase
		$str = trim(strtolower($str));

		// Remove any duplicate whitespace, and ensure all characters are alphanumeric
		$str = preg_replace('/(\s|[^A-Za-z0-9\-])+/', '-', $str);

		// Trim dashes at beginning and end of alias
		$str = trim($str, '-');

		return $str;
	}
	protected function doAdd($data) 
    {
        if (empty($this->list_route)) {
            throw new \Exception('Must define a route for listing the items');
        }
                
        if (empty($this->create_item_route)) {
            throw new \Exception('Must define a route for creating the item');
        }
                
        if (empty($this->edit_item_route)) {
            throw new \Exception('Must define a route for editing the item'); 
        }
        
        if (!isset($data['submitType'])) {
            $data['submitType'] = "save_edit";
        }
        
        $f3 = \Base::instance();
        $flash = \Dsc\Flash::instance();
        $model = $this->getModel();
        
        if(!empty($data['issuer']['new-title'])) {
        	   $data['issuer']['title'] = $data['issuer']['new-title'];	
        	   $data['issuer']['slug'] = $this->makeAlias($data['issuer']['new-title']);
        }

        if(!empty($data['merchant']['new-title'])) {
        	   $data['merchant']['title'] = $data['merchant']['new-title'];	
        	   $data['merchant']['slug'] = $this->makeAlias($data['merchant']['new-title']);
        }
     


        
        unset($data['new-title']);

        // save
        try {
            $values = $data;
            unset($values['submitType']);
            //\Dsc\System::instance()->addMessage(\Dsc\Debug::dump($values), 'warning');
            $this->item = $model->create($values);
        }
        catch (\Exception $e) {
            \Dsc\System::instance()->addMessage('Save failed with the following errors:', 'error');
            \Dsc\System::instance()->addMessage($e->getMessage(), 'error');
            foreach ($model->getErrors() as $error)
            {
                \Dsc\System::instance()->addMessage($error, 'error');
            }
            
            if ($f3->get('AJAX')) {
                // output system messages in response object
                return $this->outputJson( $this->getJsonResponse( array(
                        'error' => true,
                        'message' => \Dsc\System::instance()->renderMessages()
                ) ) );
            }
            
            // redirect back to the create form with the fields pre-populated
            \Dsc\System::instance()->setUserState('use_flash.' . $this->create_item_route, true);
            $flash->store($data);
            
            $this->setRedirect( $this->create_item_route );
                        
            return false;
        }
                
        // redirect to the editing form for the new item
        \Dsc\System::instance()->addMessage('Item saved');
        
        if (method_exists($this->item, 'cast')) {
            $this->item_data = $this->item->cast();
        } else {
            $this->item_data = \Joomla\Utilities\ArrayHelper::fromObject($this->item);
        }
        
        if ($f3->get('AJAX')) {
            return $this->outputJson( $this->getJsonResponse( array(
                    'message' => \Dsc\System::instance()->renderMessages(),
                    'result' => $this->item_data
            ) ) );
        }
        
        switch ($data['submitType']) 
        {
            case "save_new":
                $route = $this->create_item_route;
                break;
            case "save_close":
                $route = $this->list_route;
                break;
            default:
                $flash->store($this->item_data);
                $id = $this->item->get( $this->getItemKey() );
                $route = str_replace('{id}', $id, $this->edit_item_route );                
                break;
        }

        $this->setRedirect( $route );
        
        return $this;
    }

	protected function displayCreate()
	{
		$f3 = \Base::instance();
		$f3->set('pagetitle', 'Create Offer');

		$model = new \Offers\Models\Offers;
		
		$f3->set('issuers', $model->getIssuers() );
        $f3->set('merchants', $model->getMerchants() );
		
		$view = new \Dsc\Template;
		echo $view->render('Offers/Admin/Views::offers/create.php');		

	}
	
	protected function displayEdit()
	{
		$f3 = \Base::instance();
		$f3->set('pagetitle', 'Edit Offer');
			
		$model = new \Offers\Models\Offers;
		
		$f3->set('issuers', $model->getIssuers() );
        $f3->set('merchants', $model->getMerchants() );
		
		
		$view = new \Dsc\Template;
		
		echo $view->render('Offers/Admin/Views::offers/edit.php');		
		
	}
	
	/**
	 * This controller doesn't allow reading, only editing, so redirect to the edit method
	 */
	protected function doRead(array $data, $key=null)
	{
		$f3 = \Base::instance();
		$id = $this->getItem()->get( $this->getItemKey() );
		$route = str_replace('{id}', $id, $this->edit_item_route );
		$f3->reroute( $route );
	}
	
	protected function displayRead() {}
}