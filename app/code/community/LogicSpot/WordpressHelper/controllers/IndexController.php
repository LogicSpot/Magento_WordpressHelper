<?php
/**
 * LogicSpot_WordpressHelper
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @category    LogicSpot
 * @package     LogicSpot_WordpressHelper
 * @copyright   Copyright (c) 2017 LogicSpot (http://www.logicspot.com)
 * @license     http://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License v3.0
 */

require_once Mage::getBaseDir() . '/app/code/core/Mage/Cms/controllers/IndexController.php';

class LogicSpot_WordpressHelper_IndexController extends Mage_Cms_IndexController {

	/**
	 * Render CMS 404 Not found page
	 *
	 * @param string $coreRoute
	 */
	public function noRouteAction($coreRoute = null)
	{

		if (Mage::helper('logicspot_wphelper')->wordpressSlugExists('')) {
			$this->loadLayout();

			$block = $this->getLayout()->createBlock(
				'Mage_Core_Block_Text',
				'logicspot_wordpress_page',
				array('text' => Mage::helper('logicspot_wphelper')->getWordpressPageContent(''))
			);

			$this->getLayout()->getBlock('content')->append($block);

			$this->renderLayout();
		} else {
			parent::noRouteAction($coreRoute);
		}
	}

}
