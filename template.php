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
  
//  add in the background override
  $header_background = theme_get_setting('header_background_file', 'grunge');
  if ( $header_background ) {
    $data = "body, .footer-wrapper { background-image: url($header_background) ! important; }";
    drupal_add_css($data, array("type"=>"inline"));
  }

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


function grunge_preprocess_node(&$vars) {
//  override the header background for this node
  if ( $vars['page'] ){
    if ( isset($vars['field_header_background']) ) {
      $header_background = $vars['node']->field_header_background['und'][0]['filename'];
      // url
      $vars['masthead_raw'] = image_style_url('header-background', $header_background); 
      // html
//      $vars['masthead'] = theme_image_style(array('style_name' => 'header-background', 'path' => $header_background, 'width'=>960, 'height'=>'auto'));

      if ( $header_background ) {
        $data = "body, .footer-wrapper { background-image: url(" . $vars['masthead_raw'] . ") ! important; }";
        drupal_add_css($data, array("type"=>"inline"));
      }

      unset($vars['field_header_background']);
      unset($vars['node']->field_header_background);
//      krumo($vars);
    }
  }
}
