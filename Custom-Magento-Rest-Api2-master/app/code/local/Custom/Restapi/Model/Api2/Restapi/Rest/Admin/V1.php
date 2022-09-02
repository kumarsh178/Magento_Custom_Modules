<?php
class Custom_Restapi_Model_Api2_Restapi_Rest_Admin_V1 extends Custom_Restapi_Model_Api2_Restapi
{

    /**
     * Create a customer
     * @return array
     */

    public function _create(array $data) {

        $firstName = $data['firstname'];
        $lastName = $data['lastname'];
        $email = $data['email'];
        $password = $data['password'];

        $customer = Mage::getModel("customer/customer");

        $customer->setFirstname($firstName);
        $customer->setLastname($lastName);
        $customer->setEmail($email);
        $customer->setPasswordHash(md5($password));
        $customer->save();

        return $this->_getLocation($customer);
    }

    /**
		*retrieve customer
		*@return array
    */
		public function _retrieveCollection()
		{
				/** @var $collection Mage_Catalog_Model_Resource_Product_Collection */
		       	$customers=Mage::getModel('customer/customer')->getCollection();
    			return  $customers->load();
    	}

    	public function _retrieve()
    	{
    		$id=$this->getRequest()->getParam('id');
    		$customer=Mage::getModel('customer/customer')->load($id);
    		return $customer->load();
    	}
    	public function _delete()
    	{
    		 return Mage::getModel('customer/customer')->load($this->getRequest()->getParam('id'))>delete();
    	}

}