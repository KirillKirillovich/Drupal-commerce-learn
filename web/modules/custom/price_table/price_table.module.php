<?php

/**
 * Implements hook_block_view_alter().
 */
function price_table_block_view_alter(array &$build, \Drupal\Core\Block\BlockPluginInterface $block) {
  switch ($build['#id']) {
    case 'pricetable':
      $build['#attached']['library'][] = 'core/drupal.dialog.ajax';
  }
}

