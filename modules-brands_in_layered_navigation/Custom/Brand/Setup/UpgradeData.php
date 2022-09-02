<?php 
namespace Custom\Brand\Setup;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
	private $_eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory){
		$this->_eavSetupFactory = $eavSetupFactory;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context){
		$eavSetup = $this->_eavSetupFactory->create(['setup'=>$setup]);
		
			$eavSetup->addAttribute(
					\Magento\Catalog\Model\Product::ENTITY,
					'custom_brand',
					[
						'type' => 'int',
						'backend' => '',
						'frontend' => '',
						'label' => 'Custom Brand',
						'input' => 'select',
						'class' => '',
						'source' => 'Custom\Brand\Model\Source\Options',
						'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
						'visible' => true,
						'required' => false,
						'user_defined' => false,
						'default' => '',
						'searchable' => true,
						'filterable' => true,
						'comparable' => true,
						'visible_on_front' => true,
						'used_in_product_listing' => true,
						'unique' => false,
						'apply_to' => ''
					]
				);
	}
}
