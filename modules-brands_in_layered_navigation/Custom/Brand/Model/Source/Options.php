<?php
namespace Custom\Brand\Model\Source;
use Magento\Framework\DB\Ddl\Table;
use Magento\Eav\Model\ResourceModel\Entity\Attribute\OptionFactory;
class Options extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

private $_brandCollectionFactory;

public function __construct(\Custom\Brand\Model\ResourceModel\Brand\CollectionFactory $brandCollectionFactory)
{
	$this->_brandCollectionFactory = $brandCollectionFactory;
}
/**
* @var OptionFactory
*/

protected $optionFactory;
	/**
	* @param OptionFactory $optionFactory
	*/
	/**
	* Get all options
	*
	* @return array
	*/
	public function getAllOptions()
	{
		/* your Attribute options list*/
		$brands  = $this->_brandCollectionFactory->create();
		$options = array();
		foreach($brands as $brand){
			$options[] = array('value'=>$brand->getId(),'label'=>$brand->getName());
		}
		return $options;
	}

}