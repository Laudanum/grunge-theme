<?php
// $Id: template.php,v 1.1 2010/09/11 20:26:56 atelier Exp $

/**
* Breadcrumb modification
*/
function grunge_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb['breadcrumb'])) {
    return '<div class="breadcrumb"><span class="sep">' . t('You are here &raquo;') . '</span>' . implode(' &raquo; ', $breadcrumb['breadcrumb']) . '</div>';
  }
}


function grunge_preprocess_page(&$vars) {
  static $grid;

  // Initialize grid info once per page
  if (!isset($grid)) {
    $grid = fusion_core_grid_info();
  }
  //  reinstate d6 fusion variables
  $vars['sidebar_first_width'] = $grid['name'] . $grid['sidebar_first_width'];
  $vars['sidebar_second_width'] = $grid['name'] . $grid['sidebar_second_width'];
}


function grunge_preprocess_region(&$vars) {
  static $grid;

  // Initialize grid info once per page
  if (!isset($grid)) {
    $grid = fusion_core_grid_info();
  }
  //  reinstate d6 fusion variables
  $vars['sidebar_first_width'] = $grid['name'] . $grid['sidebar_first_width'];
  $vars['sidebar_second_width'] = $grid['name'] . $grid['sidebar_second_width'];
}


function grunge_preprocess_block(&$vars) {
  static $grid;

  // Initialize grid info once per page
  if (!isset($grid)) {
    $grid = fusion_core_grid_info();
  }
  //  reinstate d6 fusion variables
  $vars['sidebar_first_width'] = $grid['name'] . $grid['sidebar_first_width'];
  $vars['sidebar_second_width'] = $grid['name'] . $grid['sidebar_second_width'];
}
