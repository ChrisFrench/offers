<?php 
namespace  Offers\Site\Controllers;

class Merchant extends Base 
{    

    public function display() {
        \Base::instance()->set('pagetitle', 'Events');
        \Base::instance()->set('subtitle', '');
        
        $model = new \Offers\Models\Offers;
        $model->setState('filter.is_merchant', 1);
        $state = $model->populateState()->getState();
        \Base::instance()->set('state', $state );
        
        $list = $model->paginate();

        //for a lack of a better way
        $groups = array();
        foreach ($list['subset'] as $document) {
           $groups[$document->{'merchant.slug'}][] = $document;
            # code...
        }

        \Base::instance()->set('list', $groups );
        
        $pagination = new \Dsc\Pagination($list['total'], $list['limit']);       
        \Base::instance()->set('pagination', $pagination );
        
        $view = new \Dsc\Template;
        echo $view->render('Offers/Site/Views::merchants/list.php');
    }

    public function offers($f3) {
        $f3->set('pagetitle', 'Events');
        $f3->set('subtitle', '');
        
        $model = new \Offers\Models\Offers;
        $model->setState('filter.merchant.slug', $f3->get('PARAMS.merchant') );
        

        $state = $model->populateState()->getState();
        \Base::instance()->set('state', $state );
        
        $list = $model->paginate();
        \Base::instance()->set('list', $list );
        
        $pagination = new \Dsc\Pagination($list['total'], $list['limit']);       
        \Base::instance()->set('pagination', $pagination );
        
        
        $view = new \Dsc\Template;
        echo $view->render('Offers/Site/Views::merchants/offers.php');
    }


}





?>