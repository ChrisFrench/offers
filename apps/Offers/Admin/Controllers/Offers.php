<?php 
namespace Offers\Admin\Controllers;

class Offers extends \Admin\Controllers\BaseAuth 
{
    public function display()
    {
        $f3 = \Base::instance();
        $f3->set('pagetitle', 'Offers');
        $f3->set('subtitle', '');
    
        $model = new \Offers\Models\Offers;

        if(!empty($f3->get('PARAMS.type'))) {
            switch ($f3->get('PARAMS.type')) {
                case 'merchant':
                    $model->emptyState();
                    $model->setState('filter.is_merchant', 1);
                    break;
                case 'issuer':
                     $model->emptyState();
                    $model->setState('filter.is_issuer', 1);
                    break;
                default:
                    # code...
                    break;
            }
        }


        $state = $model->populateState()->getState();
        $f3->set('state', $state );
    
        $list = $model->paginate();
        $f3->set('list', $list );
        
        $f3->set('issuers', $model->getIssuers() );
        $f3->set('merchants', $model->getMerchants() );

        $pagination = new \Dsc\Pagination($list['total'], $list['limit']);
        $f3->set('pagination', $pagination );
              
        $view = new \Dsc\Template;
        echo $view->render('Offers/Admin/Views::offers/list.php');
    }

    public function import() {

        $db=new \DB\SQL('mysql:host=localhost;port=3306;dbname=offers','root','F0rgetting01');
        

        $SQL = "SELECT cio8v_offers_items.*, 
    cio8v_categories.title as cat_title, 
    cio8v_categories.alias as cat_alias,
    cio8v_categories.parent_id, 
    cio8v_categories.asset_id
FROM cio8v_offers_items INNER JOIN cio8v_categories ON cio8v_offers_items.catid = cio8v_categories.id
        ";

        $rows = $db->exec($SQL);

        
        foreach($rows as $row) {
         
            $offer = array('merchant' => array(), 'issuer' =>  array(), "offer" => array()) ;

            $offer['offer']['title'] =  $row['title'];
            $offer['offer']['description'] =  $row['description'];
            $offer['offer']['fromdate_start'] =  $row['fromdate_start'];
            $offer['offer']['fromdate_end'] =  $row['fromdate_end'];
            $offer['ordering'] =  $row['ordering'];
            $offer['published'] =  $row['published'];

             
               switch ($row['parent_id']) {
                case '16':
                   
                    $offer['issuer']['title'] =  $row['cat_title'];
                    $offer['issuer']['slug'] =  $row['cat_alias'];
                    $offer['issuer']['payment_type'] =  $row['merchant_type'];
                    
                     $model = new \Offers\Models\Offers;
                     $model->create($offer);

                    break;

                case '17':
                    $offer['merchant']['title'] =  $row['cat_title'];
                    $offer['merchant']['slug'] =  $row['cat_alias'];
                    $offer['merchant']['payment_type'] =  $row['merchant_type'];
                    
                    $model = new \Offers\Models\Offers;
                    $model->create($offer);
                    
                    break;
            }


        }





    }
}