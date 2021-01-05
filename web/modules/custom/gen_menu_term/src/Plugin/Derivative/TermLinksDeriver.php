<?php

namespace Drupal\gen_menu_term\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\taxonomy\TermStorageInterface;

class TermLinksDeriver extends DeriverBase {

  /**
   * {@inheritDoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    /** @var TermStorageInterface $term_storage */
    $term_storage = \Drupal::entityTypeManager()->getStorage('taxonomy_term');
    /** @var \stdClass[] $terms */
    $terms = $term_storage->loadTree('category');
    $links = [];

    foreach ($terms as $term) {
      $links[$term->tid] = [
          'title' => $term->name,
          'route_name' => 'entity.taxonomy_term.canonical',
          'route_parameters' => ['taxonomy_term' => $term->tid],
          'weight' => $category->weight,
        ] + $base_plugin_definition;

      if ($term['parents'][0]) {
        $links[$term->tid]['parent'] = 'gen_menu_term.term_links:' . $term['parents'][0];
      }
    }

    return $links;
  }

}
