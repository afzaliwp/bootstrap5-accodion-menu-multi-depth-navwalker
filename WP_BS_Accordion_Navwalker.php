<?php

defined( 'ABSPATH' ) || die();

/**
 * WP_SideNav_Navwalker
 *
 * Makes a multi-depth nav menu with bootstrap 5 accordions.
 */
class WP_BS_Accordion_Navwalker extends \Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div class=\"accordion accordion-flush\" id=\"accordionFlushExample$depth\"><div class=\"accordion-item\">\n";
	}

	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</div></div>\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		if (in_array('menu-item-has-children', $item->classes)) {
			// output as accordion item
			$output .= $indent . '<h2 class="accordion-header" id="flush-heading' . $item->ID . $depth . '"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $item->ID . $depth . '" aria-expanded="false" aria-controls="flush-collapse' . $item->ID . $depth . '">' . $item->title . '</button></h2><div id="flush-collapse' . $item->ID . $depth . '" class="accordion-collapse collapse" aria-labelledby="flush-heading' . $item->ID . $depth . '" data-bs-parent="#accordionFlushExample' . $depth . '"><div class="accordion-body">';
		} else {
			// output as simple link inside parent accordion item
			$output .= $indent . '<a href="' . $item->url . '">' . $item->title . '</a>';
		}
	}


	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		if (in_array('menu-item-has-children', $item->classes)) {
			// end accordion item
			$output .= "$indent</div></div>\n";
		} else {
			// end simple link
			$output .= "\n";
		}
	}

}
