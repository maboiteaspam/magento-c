<?php
$bootHelper = require("bootstrap.php");
$app = $bootHelper->app;

// let s declare simple / route for working purpose.
$app->get('/' , function () {

    $isUserLogged = \Mage::getSingleton('customer/session')->isLoggedIn();
    $sessionContent = var_export($_SESSION, true);

    include(__DIR__."/src/templates/index.php");

    return "";
});
$app->post('/register' , function (\Symfony\Component\HttpFoundation\Request $request) {

    $username = $request->request->get('username');
    $password = $request->request->get('password');

    $customer = \Mage::getModel('customer/customer');
    $customer->setWebsiteId(\Mage::app()->getWebsite()->getId());
    $customer->loadByEmail($username);

    if(!$customer->getId()) {
        $customer->setEmail($username);
        $customer->setFirstname('Johnny');
        $customer->setLastname('Doe');
        $customer->setPassword($password);
    }

    try {
        $customer->save();
        $customer->setConfirmation(null);
        $customer->save();

        //Make a "login" of new customer
        \Mage::getSingleton('customer/session')->loginById($customer->getId());
    }

    catch (Exception $ex) {
        //Zend_Debug::dump($ex->getMessage());
    }


    $mageSession = \Mage::getSingleton('customer/session');

    $mageSession->login($username, $password);

    $isUserLogged = $mageSession->isLoggedIn();
    $sessionContent = var_export($_SESSION, true);

    include(__DIR__."/src/templates/index.php");

    return "";
});
$app->post('/login' , function (\Symfony\Component\HttpFoundation\Request $request) {

    $username = $request->request->get('username');
    $password = $request->request->get('password');

    $mageSession = \Mage::getSingleton('customer/session');
    try{
        $mageSession->login($username, $password);
    }catch(\Exception $ex) {
        /* needed to hide magento exception on login failure... */
    }

    $isUserLogged = $mageSession->isLoggedIn();
    $sessionContent = var_export($_SESSION, true);

    include(__DIR__."/src/templates/index.php");

    return "";
});

$app->run();
