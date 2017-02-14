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

class LogicSpot_WordpressHelper_Helper_Data extends Mage_Core_Helper_Abstract {

	const XML_WP_URL = 'logicspot_wphelper/general/url';
	const XML_WP_STORE_CODE = 'logicspot_wphelper/general/store_code';

	/**
	 * Generate wordpress url
	 *
	 * @return string
	 */
	public function generateUrl($path) {
		$baseUrl = rtrim($this->getWordpressUrl(), ' /') . '/';
		if ($this->isIncludeStoreUrl()) {
			$baseUrl .= Mage::app()->getStore()->getCode() . '/';
		}

		$baseUrl .= ltrim($path, '/ ');

		return $baseUrl;
	}

	/**
	 * Determine if module should add store code to generated url.
	 *
	 * @return bool
	 */
	public function isIncludeStoreUrl()
	{
		return Mage::getStoreConfigFlag(self::XML_WP_STORE_CODE);
	}

	/**
	 * Return wordpress url
	 *
	 * @return string
	 */
	public function getWordpressUrl()
	{
		return Mage::getStoreConfig(self::XML_WP_URL);
	}

	/**
	 * Check if the Wordpress page exists based on slug
	 *
	 * @return bool
	 */
	public function wordpressSlugExists() {
        $this->loadWordPress();

        return !is_404();
	}

	/**
	 * Retrieve content of Wordpress query object by page slug
	 *
	 * @return string HTML of retrieved wordpress page
	 */
	public function getWordpressQueryObject() {
        global $wp_query;

        return $wp_query;
	}

    /**
     * Load WordPress Core, and initialise WP objects and globals.
     */
    public function loadWordPress() {
        include Mage::getBaseDir() . '/core-wp/wp-load.php';

        global $wp;

        $wp->main();

        // Load VC shortcodes if the class exists
        if(class_exists('WPBMap')){
            WPBMap::addAllMappedShortcodes();
        }
    }
}
