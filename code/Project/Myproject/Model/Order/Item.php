<?php

namespace Project\Myproject\Model\Order;

class Item extends \Magento\Sales\Model\Order\Item
{
    public function getMrp()
    {
        return $this->getData("mrp");
    }

    public function setMrp($sku)
    {
        return $this->setData("mrp", $sku);
    }
}
