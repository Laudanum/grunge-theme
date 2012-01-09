<?php

/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * Custom theme settings
 */
function grunge_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['tnt_container']['general_settings']['theme_look'] = array(
    '#type' => 'fieldset',
    '#title' => t('Look and feel'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['tnt_container']['general_settings']['theme_look']['header_background_file'] = array(
    '#type' => 'textfield',
    '#title' => t('Default URL of the header background image.'),
    '#default_value' => theme_get_setting('header_background_file'),
    '#description' => t('If the background image is bigger than the header area, it is clipped. If it\'s smaller than the header area, it is tiled to fill the header area. To remove the background image, blank this field and save the settings.'),
    '#size' => 40,
    '#maxlength' => 120,
  );
  
  $form['tnt_container']['general_settings']['theme_look']['header_background'] = array(
    '#type' => 'file',
    '#title' => t('Upload a new default header background image replacing the themes default.'),
    '#size' => 40,
    '#attributes' => array('enctype' => 'multipart/form-data'),
//    '#description' => t('If you don\'t have direct access to the server, use this field to upload your header background image'),
    '#element_validate' => array('_grunge_header_bg_validate'),
  );

}

/**
 * Check and save the uploaded header background image
 */
function _grunge_header_bg_validate($element, &$form_state) {
  global $base_url;

  $validators = array('file_validate_is_image' => array());
  $file = file_save_upload('header_background', $validators, "public://", FILE_EXISTS_REPLACE);

  if ($file) {
    // change file's status from temporary to permanent and update file database
    $file->status = FILE_STATUS_PERMANENT;
    file_save($file);

    $file_url = file_create_url($file->uri);
    $file_url = str_ireplace($base_url, '', $file_url);

    // set to form
    $form_state['values']['header_background_file'] = $file_url;
  }
}

