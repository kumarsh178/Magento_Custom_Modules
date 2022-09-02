<?php
namespace Custom\Brand\Model;

class Brand extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Custom\Brand\Model\ResourceModel\Brand');
    }
}
?>