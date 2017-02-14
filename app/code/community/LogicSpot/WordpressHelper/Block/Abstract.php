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

abstract class LogicSpot_WordpressHelper_Block_Abstract extends Mage_Core_Block_Template
{
    /**
     * Method gets post meta value for page by key '_wpb_post_custom_css'
     *
     * @param int $id
     * @return string HTML of retrieved CSS rules
     */
    public function getPageCustomCss($id = null) {
        if (!is_singular()) {
            return '';
        }

        if (!$id) {
            $id = get_the_ID();
        }

        if ($id) {
            $post_custom_css = get_post_meta($id, '_wpb_post_custom_css', true);
            if (!empty($post_custom_css)) {
                $post_custom_css = strip_tags($post_custom_css);
                return $post_custom_css;
            }
        }
    }

    /**
     * Method gets post meta value for page by key '_wpb_shortcodes_custom_css'
     *
     * @param int $id
     * @return string HTML of retrieved CSS rules
     *
     */
    public function getShortcodesCustomCss($id = null) {
        if (!is_singular()) {
            return '';
        }

        if (!$id) {
            $id = get_the_ID();
        }

        if ($id) {
            $shortcodes_custom_css = get_post_meta($id, '_wpb_shortcodes_custom_css', true);
            if (!empty($shortcodes_custom_css)) {
                $shortcodes_custom_css = strip_tags($shortcodes_custom_css);
                return $shortcodes_custom_css;
            }
        }
    }
}