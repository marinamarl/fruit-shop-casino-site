<?php
/**
 * @version   1.4 July 24, 2017
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2017 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
 
class GantryDropdownMenuFormatter extends AbstractRokMenuFormatter {
	function format_subnode( &$node ) {

		if ($node->getId() == $this->current_node) $node->addListItemClass('last');
	
	}
}