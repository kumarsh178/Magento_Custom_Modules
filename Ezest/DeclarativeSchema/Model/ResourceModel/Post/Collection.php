<?php
namespace Ezest\DeclarativeSchema\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Ezest\DeclarativeSchema\Model\Post', 'Ezest\DeclarativeSchema\Model\ResourceModel\Post');
	}

}