<?php 
namespace Offers\Models;

class Offers extends Base   
{
    protected $collection = 'offers';
    protected $default_ordering_direction = '1';
    protected $default_ordering_field = 'type';

    public function __construct($config=array())
    {
        $config['filter_fields'] = array(
            'name', 'start_date', 'end_date'
        );
        $config['order_directions'] = array('1', '-1');
        
        parent::__construct($config);
    }

    public function getPrefab() {
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

        $filter_is_merchant = $this->getState('filter.is_merchant');
        if (strlen($filter_is_merchant))
        {
         $this->filters['merchant'] = array( '$ne' => array() );
        }

       
        $filter_issuer_slug = $this->getState('filter.issuer.slug');

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


    public function prepareItem($item) {
           

            return $item;

    }


}
?>