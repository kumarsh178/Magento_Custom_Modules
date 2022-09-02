<?php
namespace Ezest\DeclarativeSchema\Model;
class Post extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Ezest\DeclarativeSchema\Model\ResourceModel\Post');
	}

}