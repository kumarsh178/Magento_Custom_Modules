<?php
namespace Custom\Brand\Model\ResourceModel;

class Brand extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('custom_brand', 'entity_id');
    }
}
?>