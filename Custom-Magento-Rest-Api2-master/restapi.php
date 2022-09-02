<?php
/**
* Example of simple product POST using Admin account via Magento REST API. OAuth authorization is used
*/
$callbackUrl = "http://localhost/magento/restapi.php";
$temporaryCredentialsRequestUrl = "http://localhost/magento/oauth/initiate?oauth_callback=" . urlencode($callbackUrl);
$adminAuthorizationUrl = 'http://localhost/magento/admin/oauth_authorize';
$accessTokenRequestUrl = 'http://localhost/magento/oauth/token';
$apiUrl = 'http://localhost/magento/api/rest';
$consumerKey = '750ad6ef03ac1b7715fae1745bc1e557';
$consumerSecret = '1c16e64eac8988d20d060ac911a833c7';

session_start();
if (!isset($_GET['oauth_token']) && isset($_SESSION['state']) && $_SESSION['state'] == 1) {
    $_SESSION['state'] = 0;
}
try {
    $authType = ($_SESSION['state'] == 2) ? OAUTH_AUTH_TYPE_AUTHORIZATION : OAUTH_AUTH_TYPE_URI;
    $oauthClient = new OAuth($consumerKey, $consumerSecret, OAUTH_SIG_METHOD_HMACSHA1, $authType);
    $oauthClient->enableDebug();

    if (!isset($_GET['oauth_token']) && !$_SESSION['state']) {
        $requestToken = $oauthClient->getRequestToken($temporaryCredentialsRequestUrl);
        $_SESSION['secret'] = $requestToken['oauth_token_secret'];
        $_SESSION['state'] = 1;
        header('Location: ' . $adminAuthorizationUrl . '?oauth_token=' . $requestToken['oauth_token']);
        exit;
    } else if ($_SESSION['state'] == 1) {
        $oauthClient->setToken($_GET['oauth_token'], $_SESSION['secret']);
        $accessToken = $oauthClient->getAccessToken($accessTokenRequestUrl);
        $_SESSION['state'] = 2;
        $_SESSION['token'] = $accessToken['oauth_token'];
        $_SESSION['secret'] = $accessToken['oauth_token_secret'];
        header('Location: ' . $callbackUrl);
        exit;
    } else {
        $oauthClient->setToken($_SESSION['token'], $_SESSION['secret']);
        //$resourceUrl = "$apiUrl/products/4";
        //create customer
        $resourceUrl = "$apiUrl/customer/2";

        $productData = json_encode(
            array(
            'type_id'           => 'simple',
            'attribute_set_id'  => 4,
            'sku'               => 'simple' . uniqid(),
            'weight'            => 1,
            'status'            => 1,
            'visibility'        => 4,
            'name'              => 'Simple Product',
            'description'       => 'Simple Description',
            'short_description' => 'Simple Short Description',
            'price'             => 99.95,
            'tax_class_id'      => 0,
        ));
        $customerData=json_encode(
            array("firstname"=>'Test',
            "lastname"=>'Rest Api',
            "email"=>'test@gmail.com',
            "password"=>'123456'
        ));
        $headers = array('Content-Type' => 'application/json','accept'=>'*/*');
        //$oauthClient->fetch($resourceUrl, $customerData, OAUTH_HTTP_METHOD_POST, $headers);
        $oauthClient->fetch($resourceUrl, array(), 'GET', array('Content-Type' => 'application/xml', 'Accept' => '*/*'));
        $productsList = json_decode($oauthClient->getLastResponse());
        echo '<pre>';
        print_r($productsList);
        echo 'heloo';
    }
} catch (OAuthException $e) {
    //echo '<pre>';
    //echo $e->getMessage();
    print_r($e->lastResponse);
}