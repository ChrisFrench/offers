<?php 
namespace Offers\Admin\Controllers;

class Offers extends \Admin\Controllers\BaseAuth 
{
    public function display()
    {
        \Base::instance()->set('pagetitle', 'Offers');
        \Base::instance()->set('subtitle', '');
    
        $model = new \Offers\Models\Offers;
        $state = $model->populateState()->getState();
        \Base::instance()->set('state', $state );
    
        $list = $model->paginate();
        \Base::instance()->set('list', $list );
        
        \Base::instance()->set('issuers', $model->getIssuers() );
        \Base::instance()->set('merchants', $model->getMerchants() );

        $pagination = new \Dsc\Pagination($list['total'], $list['limit']);
        \Base::instance()->set('pagination', $pagination );
              
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