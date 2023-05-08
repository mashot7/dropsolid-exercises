<?php

namespace Drupal\dependency_injection_exercise\Plugin\Block;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\dependency_injection_exercise\Services\FetchPhotoService;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'RestOutputBlock' block.
 *
 * @Block(
 *  id = "rest_output_block",
 *  admin_label = @Translation("Rest output block"),
 * )
 */
class RestOutputBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * @var \Drupal\dependency_injection_exercise\Services\FetchPhotoService
   */
  private FetchPhotoService $photoService;

  /**
   * {@inheritdoc}
   * @throws \Exception
   */
  public function build(): array {
    return $this->photoService->showPhotos();
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): RestOutputBlock|static {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('dependency_injection_exercise.fetch_photos')
    );
  }

  public function __construct(
    array             $configuration,
                      $plugin_id,
                      $plugin_definition,
    FetchPhotoService $photoService
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->photoService = $photoService;
  }

}
