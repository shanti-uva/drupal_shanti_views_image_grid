<?php
/**
 * @file
 * Views hooks for Views Elastic Grid
 */

/**
 * Implements hook_views_plugins().
 */
function shanti_views_image_grid_views_plugins() {
  $path = drupal_get_path('module', 'shanti_views_image_grid') . '/plugins';

  $plugins = array(
    'style' => array(
      'shanti_views_image_grid' => array(
        'title' => t('Shanti Image grid'),
        'help' => t('Displays a Pintrest-style grid of thumbnails with expandable previews and lightbox popup.'),
        'handler' => 'shanti_views_image_grid_plugin_style',
        'theme' => 'shanti_views_image_grid_list',
        'uses row plugin' => FALSE,
        'uses fields' => TRUE,
        'uses row class' => TRUE,
        'uses options' => TRUE,
        'type' => 'normal',
        'path' => $path,
      ),
    ),
  );

  return $plugins;
}