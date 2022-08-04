<?php

namespace Drupal\rsvplist\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "rsvp_block",
 *   admin_label = @Translation("RSVP list"),
 * )
 */
class RSVPBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
 public function build() {
   return \Drupal::formBuilder()->getForm('Drupal\rsvplist\Form\RSVPForm');
  }
 public function blockAccess(AccountInterface $account) {
    
    $node = \Drupal::routeMatch()->getParameter('node');
    $nid = $node->nid->value;

    if(is_numeric($nid)){
        return AccessResult::allowedIfhaspermission($account, 'view rsvplist');
    }
    return AccessResult::Forbidden();
  }

}