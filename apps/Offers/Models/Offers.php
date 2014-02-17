<?php 
namespace Offers\Models;

class Offers extends Base   
{
    protected $collection = 'offers';
    protected $default_ordering_direction = '-1';
    protected $default_ordering_field = 'merchant.title';

    public function __construct($config=array())
    {
        $config['filter_fields'] = array(
            'merchant.title', 'issuer.title', 'end_date'
        );
        $config['order_directions'] = array('1', '-1');
        
        parent::__construct($config);
    }

    public function prefab() {
        $prefab = New \Offers\Models\Prefabs\Offer();
        return $prefab;
    }
    
    protected function fetchFilters()
    {   
       
        $filter_keyword = $this->getState('filter.keyword');
        if ($filter_keyword && is_string($filter_keyword))
        {
            $key =  new \MongoRegex('/'. $filter_keyword .'/i');
    
            $where = array();
            $where[] = array('name'=>$key);
            $where[] = array('slug'=>$key);
            $where[] = array('event_id'=>$key);
            $where[] = array('start_date'=>$key);
            $where[] = array('end_date'=>$key);
  
    
            $this->filters['$or'] = $where;
        }
    
        $filter_id = $this->getState('filter.id');

        if (strlen($filter_id))
        {
            $this->filters['_id'] = new \MongoId((string) $filter_id);
        }

        $filter_is_issuer = $this->getState('filter.is_issuer');
        if (strlen($filter_is_issuer))
        {



         $this->filters['issuer'] = array( '$ne' => array() );
        }


        $filter_is_active = $this->getState('filter.is_active');
        
        /*if (strlen($filter_is_active))
        {

             $where = array();
            $where[] = array('offer.fromdate_start'=> null );
            $where[] = array('offer.fromdate_start'=>array( '$lte' => date('y-m-d') ));
             $where[] = array('offer.fromdate_start'=> '0000-00-00');


            $where[] = array('offer.fromdate_end'=> null );
            $where[] = array('offer.fromdate_end'=> '0000-00-00');
            $where[] = array('offer.fromdate_end'=>array( '$gte' => date('y-m-d') ));

            var_dump($where);
            die();
            $this->filters['$or'] = $where;
        }*/

        $filter_published = $this->getState('filter.published');
        if (strlen($filter_published))
        {
         $this->filters['published'] = (string) $filter_published ;
        }

        $filter_is_merchant = $this->getState('filter.is_merchant');
        if (strlen($filter_is_merchant))
        {
         $this->filters['merchant'] = array( '$ne' => array() );
        }

         $filter_issuer_title = $this->getState('filter.issuer.title');

        if (strlen($filter_issuer_title))
        {
            $this->filters['issuer.title'] = $filter_issuer_title;
        }
         $filter_issuer_title = $this->getState('filter.issuer.title');

         $filter_merchant_title = $this->getState('filter.merchant.title');
        if (strlen($filter_merchant_title))
        {
            $this->filters['merchant.title'] = $filter_merchant_title;
        }
       
        $filter_issuer_slug = $this->getState('filter.issuer.slug');

        if (strlen($filter_issuer_slug))
        {
            $this->filters['issuer.slug'] = $filter_issuer_slug;
        }

        if (strlen($filter_issuer_slug))
        {
            $this->filters['issuer.slug'] = $filter_issuer_slug;
        }

        $filter_merchant_slug = $this->getState('filter.merchant.slug');

        if (strlen($filter_merchant_slug))
        {
            $this->filters['merchant.slug'] = $filter_merchant_slug;
        }
       

        $filter_slug = $this->getState('filter.slug');

        if (strlen($filter_slug))
        {
            $this->filters['slug'] = $filter_slug;
        }

    
        return $this->filters;
    }

      public function getTotal()
    {
        
        $filters = $this->getFilters();
        $mapper = $this->getMapper();
        $count = $mapper->count($filters);
    
        return $count;
    }

    function getTotalCount() {
        $this->emptyState();
        return $this->getTotal();
    }

    function getIssuers() {
         $collection = $this->getCollection();
    
        // TODO if $types, only get tags used by items of those types
        $issuers = $collection->distinct("issuer.title");
        $issuers = array_values( array_filter( $issuers ) );
    
        return $issuers;
    }

     function getMerchants() {
         $collection = $this->getCollection();
    
        // TODO if $types, only get tags used by items of those types
        $merchants = $collection->distinct("merchant.title");
        $merchants = array_values( array_filter( $merchants ) );
    
        return $merchants;
    }

    public function create( $values, $options=array() )
    {
        $values = array_merge( $this->prefab()->cast(), $values );
        
        return $this->save( $values, $options );
    }

    public function save( $values, $options=array(), $mapper=null )
    {
        /*if (empty($values['offer']['fromdate_start'])) {
            $values['offer']['fromdate_start'] = \Dsc\Mongo\Metastamp::getDate(  trim($values['offer']['fromdate_start']);
        }
        
        if (!empty($values['offer']['fromdate_end'])) {           
            $values['offer']['fromdate_end'] = \Dsc\Mongo\Metastamp::getDate( trim( $values['offer']['fromdate_end'] ) );
        }*/
    
        return parent::save( $values, $options, $mapper );
    }



    public function prepareItem($item) {
           

            return $item;

    }


}
?>