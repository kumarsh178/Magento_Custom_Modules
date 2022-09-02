<?php

namespace Custom\Brand\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.0') < 0){

		$installer->run('create table custom_brand(entity_id int not null auto_increment, name varchar(100),
            status int(5),
            primary key(entity_id))');
        $installer->run('insert into custom_brand (name,status) values(\'Samsung\',1)');
        $installer->run('insert into custom_brand (name,status) values(\'Nokia\',1)');
        $installer->run('insert into custom_brand (name,status) values(\'Lava\',1)');
        $installer->run('insert into custom_brand (name,status) values(\'Dell\',1)');
        $installer->run('insert into custom_brand (name,status) values(\'Mi\',1)');
		}

        $installer->endSetup();

    }
}