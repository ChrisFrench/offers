<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "site":
        // register event listener
       // \Dsc\System::instance()->getDispatcher()->addListener(\Msft\Userlistener::instance());   
        //
        $f3->config( $f3->get('PATH_ROOT').'apps/Offers/config.ini');
        
        $f3->route('GET /', '\Offers\Site\Controllers\Base->display');
        $f3->route('GET /issuer', '\Offers\Site\Controllers\Issuer->display');
        $f3->route('GET /merchant', '\Offers\Site\Controllers\Merchant->display');
        $f3->route('GET /issuer/@issuer', '\Offers\Site\Controllers\Issuer->offers');
        $f3->route('GET /merchant/@merchant', '\Offers\Site\Controllers\Merchant->offers');


	    $f3->route('GET|POST /logout', function() {
             \Base::instance()->clear('SESSION');
             \Base::instance()->clear('COOKIE');
	         setcookie('id','',time()-3600);
	         \Base::instance()->reroute('/');
        });          
        
        // append this app's UI folder to the path
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "apps/Offers/Site/Views/";
        $f3->set('UI', $ui);

	;
            
        break;

    case "admin":
        // register event listener
        \Dsc\System::instance()->getDispatcher()->addListener(\Offers\listener::instance());   
        //
        $f3->config( $f3->get('PATH_ROOT').'apps/Offers/config.ini');
        
       // register all the routes
        $f3->route('GET|POST /admin/offers', '\Offers\Admin\Controllers\Offers->display');
        $f3->route('GET|POST /admin/offers/@page', '\Offers\Admin\Controllers\Offers->display');
        $f3->route('GET|POST /admin/offers/delete', '\Offers\Admin\Controllers\Offers->delete');
        $f3->route('GET /admin/offers/create', '\Offers\Admin\Controllers\Offer->create');
        $f3->route('POST /admin/offers/create', '\Offers\Admin\Controllers\Offer->add');
        $f3->route('GET /admin/offers/view/@id', '\Offers\Admin\Controllers\Offer->read');
        $f3->route('GET /admin/offers/edit/@id', '\Offers\Admin\Controllers\Offer->edit');
        $f3->route('POST /admin/offers/edit/@id', '\Offers\Admin\Controllers\Offer->update');
        $f3->route('GET /admin/offers/delete/@id', '\Offers\Admin\Controllers\Offer->delete');   
        $f3->route('GET /admin/offers/import', '\Offers\Admin\Controllers\Offers->import');   

        $f3->route('GET|POST /logout', function() {
             \Base::instance()->clear('SESSION');
             \Base::instance()->clear('COOKIE');
             setcookie('id','',time()-3600);
             \Base::instance()->reroute('/');
        });          
        
        // append this app's UI folder to the path
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "apps/Offers/Admin/Views/";
        $f3->set('UI', $ui);

    ;
            
        break;
}
?>
