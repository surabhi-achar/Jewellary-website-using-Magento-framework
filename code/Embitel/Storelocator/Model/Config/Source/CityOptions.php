<?php

namespace Embitel\Storelocator\Model\Config\Source;

class CityOptions implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $options = [
            [
                'label' => __('--Choose City--'),
                'value' => '',
                
            ],
            [
                'label' => __('Bengaluru'),
                'value' => 'Bengaluru',
            ],
            [
                'label' => __('Ahmedabad'),
                'value' => 'Ahmedabad',
            ],
            [
                'label' => __('Chennai'),
                'value' => 'Chennai',
            ],
           
        ];

        return $options;
    }
}
