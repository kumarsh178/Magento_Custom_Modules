<?php

namespace Custom\Brand\Model\ResourceModel\Brand;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Custom\Brand\Model\Brand', 'Custom\Brand\Model\ResourceModel\Brand');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>