<?php


/**
 * Implements hook_theme().
 */
function for_hooks_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'commerce_order_item_add_to_cart_form_commerce_product_15') {
    $a = 1;
  }
}

function for_hooks_preprocess_field(&$variables, $hook) {
  $a = 1;
}
