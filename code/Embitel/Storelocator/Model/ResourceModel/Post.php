<?php
namespace Embitel\Storelocator\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDB
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('store_locator', 'entity_id');
    }
}
