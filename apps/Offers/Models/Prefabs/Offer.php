<?php 
namespace Offers\Models\Prefabs;

class Offer extends \Dsc\Prefabs
{
    protected $default_options = array(
         'append' => true // set this to true so that ->bind() adds fields to $this->document even if they aren't in the default document structure
    );

    public function __construct($source=array(), $options=array())
    {
         parent::__construct( $source, $options );
         $this->set('timestamp', \Dsc\Mongo\Metastamp::getDate('now'));
    }
   
    /**
     * Default document structure
     * @var array
     */
    protected $document = array(
        'issuer' => array(),
        'merchant' => array(),
        'offer' => array(),
        'timestamp' => ''
    );


}