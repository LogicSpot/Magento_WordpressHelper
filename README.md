#WordpressHelper by [LogicSpot]

This module adds additional template variable to allow generating urls outside of Magento base URL

This module will also allow to process pages from wordpress, by overriding standard 404 behaviour.

##Usage
In any template, CMS Page, widget or static block you can use following directive {{wp url='path-to-site'}} which will generate preconfigured url

In System -> Configuration -> Web -> Default Pages change Default No-rouse URL to "wphelper/index/noRoute" 

##Installation
There are 2 ways of installing WordpressHelper module:

- use [modman] script - run modman clone https://github.com/LogicSpot/Magento_WordpressHelper
- Download module files and unpack them into your Magento install root directory

After installing module, logout and login into admin and clear Magento cache.

##License
This module is distributed under GNU General Public License v3.0. Full text of the License can be found in LICENSE.txt file


[LogicSpot]:http://www.logicspot.com/
[Magento]:http://magento.com/
[modman]:https://github.com/colinmollenhour/modman
[magento-composer-installer]:https://github.com/Cotya/magento-composer-installer