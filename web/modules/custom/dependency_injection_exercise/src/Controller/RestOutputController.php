<?php

namespace Drupal\dependency_injection_exercise\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\dependency_injection_exercise\Services\FetchPhotoService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides the rest output.
 */
class RestOutputController extends ControllerBase {

  /**
   * @var \Drupal\dependency_injection_exercise\Services\FetchPhotoService
   */
  private FetchPhotoService $photoService;

  /**
   * {@inheritdoc}
   */
  public function __construct(
    FetchPhotoService $photoService
  ) {
    $this->photoService = $photoService;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Instantiates this form class.
    return new static(
      $container->get('dependency_injection_exercise.fetch_photos')
    );
  }

  /**
   * Displays the photos.
   *
   * @return array[]
   *   A renderable array representing the photos.
   * @throws \Exception
   */
  public function showPhotos(): array {
    return $this->photoService->showPhotos(5);
  }

}
