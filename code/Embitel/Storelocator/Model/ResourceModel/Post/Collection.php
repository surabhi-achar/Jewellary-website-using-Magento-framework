<?php
namespace Embitel\Storelocator\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollecion;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define model & resource model
     * @var string
     */

    protected $id_firldname='entity_id';
    protected function _construct()
    {
        $this->_init(
            'Embitel\Storelocator\Model\Post',
            'Embitel\Storelocator\Model\ResourceModel\Post'
        );
    }
}
