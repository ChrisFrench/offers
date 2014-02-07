<?php 
namespace Offers;

class Listener extends \Prefab 
{
    public function onSystemRebuildMenu( $event )
    {
        if ($mapper = $event->getArgument('mapper')) 
        {
        	$mapper->reset();
        	$mapper->priority = 30;
            $mapper->id = 'fa-offers';
        	$mapper->title = 'Offers';
        	$mapper->route = '';
        	$mapper->icon = 'fa fa-offer';
        	$mapper->children = array(
        			json_decode(json_encode(array( 'title'=>'List', 'route'=>'/admin/offers', 'icon'=>'fa fa-list' )))
        			,json_decode(json_encode(array( 'title'=>'Add New Offer', 'route'=>'/admin/offers/create', 'icon'=>'fa fa-plus' )))
        			,json_decode(json_encode(array( 'title'=>'Detail', 'route'=>'/admin/offers/view', 'hidden'=>true ))
                    )

        	);
        	$mapper->save();
        	
        	\Dsc\System::instance()->addMessage('Offers added its admin menu items.');
        }
        
    }
}