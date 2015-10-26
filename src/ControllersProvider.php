<?php
namespace Magento\C;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Silex\ControllerProviderInterface;

class ControllersProvider implements
    ServiceProviderInterface,
    ControllerProviderInterface
{
    /**
     * Register services.
     *
     * @param Application $app
     **/
    public function register(Application $app)
    {
        // path to the Mage file of the magento app to load
        $app['magento.mage_file'] = $app->share(function() use ($app) {
            return __DIR__."/../../../../dior/magento/app/Mage.php";
            return "some/path/to/Mage.php";
        });

        // session namespace for magento sessions
        $app['magento.session_namespace'] = $app->share(function() use ($app) {
            return "frontend";
        });

        // a key value pair array of locale to store codes mapping
        $app['magento.store_mappings'] = $app->share(function() use ($app) {
            return [];
        });

        // the Mage app object
        $app['magento.app'] = null;
    }

    /**
     * Boot and configure services.
     *
     * @param Application $app Silex application instance.
     * @return void
     **/
    public function boot(Application $app)
    {
        include ($app['magento.mage_file']);
        $app['magento.app'] = \Mage::app();
    }

    public function connect(Application $app)
    {
//        $controllers = $app['controllers_factory'];
//
//        $controllers->get( '/',
//            $app['your.controllers']->your_controller_method()
//        )->bind ('route_name');
//
//        return $controllers;
    }
}
