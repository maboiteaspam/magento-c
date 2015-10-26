# Magento\C

Magento\C module let you connect a magento backend on your C module.

## Install

Git clone the repository.

```sh
git clone git@github.com/maboiteapsam/magento-c
```

## Registration

To register this module please proceed such,

__File__: bootstrap.php

```php
$magento = new Magento\C\ControllersProvider();
$app->register($magento);
```

## Configuration

This module exposes those configuration values,

##### magento.mage_file

`magento.mage_file` lets you define the path of the Magento application Mage file to boot.

##### magento.session_namespace

`magento.session_namespace` lets you define namespace of the Magento session container.

##### magento.store_mappings

`magento.store_mappings` lets you define a mapping of `locale code`=>`store code`.

## Requirements

You will need a valid install of Magento.

Please __DIY__,

http://devdocs.magento.com/guides/m1x/install/installing.html


## Credits, notes, more

__inspiration__

This module is largely inspired by the work provided by `liip` team, see more at

https://github.com/liip/LiipMagentoBundle

__auto-loading__

This module need s that you patch the mage autoloader.

$ cd $MAGENTO_DIR
$ patch -p0 < $SYMFONY_DIR/vendor/bundles/Liip/MagentoBundle/magento-autoloader.patch

## Magento reading

Stuff i got to read to work with Magento in this module,

- http://devblog.lexik.fr/symfony2/integration-de-magento-et-symfony2-1935
- https://github.com/lognllc/LogNMagento
- http://www.hitmaroc.net/172256-1195-using-magento-api-get-products.html
- https://blog.liip.ch/archive/2011/09/21/integrating-magento-into-symfony2.html
- http://magento.stackexchange.com/questions/12308/magento-call-a-function-of-model-in-controller
- http://stackoverflow.com/questions/18756753/magento-getsingleton-vs-getmodel-issue
- http://stackoverflow.com/questions/17340030/login-function-use-in-custom-module-controller-in-magento
- https://blog.ancud.de/home/-/blogs/magento-how-to-login-a
- http://makandracards.com/magento/10723-messages-and-global-messages-blocks
- http://inchoo.net/magento/programming-magento/programatically-create-customer-and-order-in-magento-with-full-blown-one-page-checkout-process-under-the-hood/
