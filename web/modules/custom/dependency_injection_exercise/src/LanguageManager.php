<?php

namespace Drupal\dependency_injection_exercise;

use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Language\LanguageManager as OriginalLanguageManager;
use Drupal\Core\Language\LanguageManagerInterface;

/**
 * LanguageManager service.
 */
class LanguageManager extends OriginalLanguageManager implements LanguageManagerInterface {

  public function getCurrentLanguage($type = LanguageInterface::TYPE_INTERFACE) {
    // TODO: Add your code here
    return $this->getDefaultLanguage();
  }

}
