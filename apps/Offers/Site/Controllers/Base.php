<?php 
namespace Offers\Site\Controllers;

class Base extends \Dsc\Controller 
{    

	public function display() {
        \Base::instance()->set('pagetitle', 'Events');
        \Base::instance()->set('subtitle', '');
        
       
        $view = new \Dsc\Template;
        echo $view->render('Offers/Site/Views::home/list.php');
    }
}





?>