<?php

namespace Drupal\dependency_injection_exercise;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Drupal\dependency_injection_exercise\Services\MailManager;

/**
 * Alters MailManager service.
 */
class DependencyInjectionExerciseServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    // TODO: Alternative option is an alias.
    // TODO: See commented code in dependency_injection_exercise.services.yml
    if ($container->hasDefinition('plugin.manager.mail')) {
      $definition = $container->getDefinition('plugin.manager.mail');
      $definition->setClass(MailManager::class);
    }
  }
}
