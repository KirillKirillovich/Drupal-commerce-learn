<?php

namespace Drupal\visitor_counter\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Database\Database;

/**
 * Provides a 'Visitor_counter' Block.
 *
 * @Block(
 *   id = "visitor_counter_block",
 *   admin_label = @Translation("Visitor counter block"),
 *   category = @Translation("Visitor counter block"),
 * )
 */

class VisitorCounter extends BlockBase {
  /**
   * {@inheritdoc}
   */


  public static function loadVisitors() {
    $query = \Drupal::database()->select('visitors', 'vis');
    $query->addField('vis', 'visitors_id');
    $result = $query->execute()->fetchCol();
    $last = count($result)-1;
    return $last;
  }

  public static function loadUniq() {
    $connection = \Drupal::database();
    $query = $connection->select('visitors', 'vis');
    $query->fields('vis', ['visitors_ip']);
    $result = $query->distinct()->execute()->fetchCol();
    $uniq = count($result);
    return $uniq;
  }

  public function build() {
    return [
      '#markup' => '<p>' . $this->t('Totatl visitors:') . self::loadVisitors() . '</p>' . '<br>' . '<p>' . $this->t('Uniq visitors:') . self::loadUniq() . '</p>',
    ];
  }
}
