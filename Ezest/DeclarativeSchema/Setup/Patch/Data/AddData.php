<?php
namespace Ezest\DeclarativeSchema\Setup\Patch\Data;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Module\Setup\Migration;
use Magento\Framework\Setup\ModuleDataSetupInterface;
/**

 * Class AddData

 * @package Ced\GraphQl\Setup\Patch\Data

 */

class AddData implements DataPatchInterface, PatchVersionInterface

{

/**

* @var \Ced\GraphQl\Model\Author

*/

private $_postFactory;

/**

*

* @param \Ced\GraphQl\Model\Author $author

*/

public function __construct(

     \Ezest\DeclarativeSchema\Model\PostFactory $postFactory

) {
     $this->_postFactory = $postFactory;
}


/**

* {@inheritdoc}

* @SuppressWarnings(PHPMD.ExcessiveMethodLength)

*/

public function apply()

{
       
            for($i=0;$i<5;$i++){
            $post = $this->_postFactory->create();
            $postData = [];
            $postData['title'] = $i.'_From Patch First Title';
            $postData['new_title'] = $i.'_From Patch Second Title';
            $postData['block_last_title'] = $i.'_From Patch Third title';
            $post->setData($postData)->save();
        }
       
}


/**

* {@inheritdoc}

*/

public static function getDependencies()

{
     return [];
}


/**

* {@inheritdoc}

*/

public static function getVersion()

{
     return '2.0.0';
}

/**

* {@inheritdoc}
*/

public function getAliases()
{
     return [];
  }
}  