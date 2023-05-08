<?php

namespace Drupal\dependency_injection_exercise\Services;

use Drupal\Core\Mail\MailManager as OriginalMailManager;

/**
 * Provides a Mail plugin manager.
 *
 */
class MailManager extends OriginalMailManager {

  /**
   * {@inheritdoc}
   */
  public function mail($module, $key, $to, $langcode, $params = [], $reply = NULL, $send = TRUE) {
    // Replace all email recipients with the desired email address.
    $to = 'nope@doesntexist.com';

    // Call the parent mail method with the modified arguments.
    return parent::mail($module, $key, $to, $langcode, $params, $reply, $send);
  }

}
