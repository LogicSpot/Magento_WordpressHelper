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

class LogicSpot_WordpressHelper_Model_Template_Filter extends Mage_Core_Model_Email_Template_Filter {

	/**
	 * Retrieve wordpress URL directive
	 *
	 * @param array $construction
	 * @return string
	 */
	public function wpDirective($construction)
	{
		$params = $this->_getIncludeParameters($construction[2]);

		if (isset($params['url'])) {
			$path = $params['url'];
			unset($params['url']);

			return Mage::helper('logicspot_wphelper')->generateUrl($path);
		}

		return '';
	}
}
