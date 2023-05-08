<?php

namespace Drupal\dependency_injection_exercise\Services;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Logger\LoggerChannelInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Fetch photo service
 *
 * @package Drupal\dependency_injection_exercise\Services
 */
class FetchPhotoService {

  /**
   * @var \GuzzleHttp\ClientInterface
   */
  protected ClientInterface $httpClient;

  /**
   * @var \Drupal\Component\Serialization\Json
   */
  protected Json $json;

  protected LoggerChannelInterface $loggerChannelFactory;

  /**
   * FetchPhotoService constructor.
   *
   * @param \GuzzleHttp\ClientInterface $httpClient
   * @param \Drupal\Component\Serialization\Json $json
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $loggerChannelFactory
   */
  public function __construct(
    ClientInterface $httpClient,
    Json $json,
    LoggerChannelFactoryInterface $loggerChannelFactory
  ) {

    $this->httpClient = $httpClient;
    $this->json = $json;
    $this->loggerChannelFactory = $loggerChannelFactory->get('dependency_injection_exercise');
  }

  /**
   * @param $albumId
   *  Album ID that needs to be fetched
   *
   * @return array[]
   *  Render array for images
   * @throws \Exception
   */
  public function showPhotos($albumId = NULL): array {
    // Setup build caching.
    $build = [
      '#cache' => [
        'max-age' => 60,
        'contexts' => [
          'url',
        ],
      ],
    ];

    $data = $this->getPhotos($albumId);

    if (!$data) {
      $build['error'] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => t('No photos available.'),
      ];

      return $build;
    }

    // Build a listing of photos from the photo data.
    $build['photos'] = array_map(static function ($item) {
      return [
        '#theme' => 'image',
        '#uri' => $item['thumbnailUrl'],
        '#alt' => $item['title'],
        '#title' => $item['title'],
      ];
    }, $data);

    return $build;
  }

  /**
   * Returns the default http client.
   *
   * @return \GuzzleHttp\Client
   *   A guzzle http client instance.
   */
  protected function httpClient(): ClientInterface {
    return $this->httpClient;
  }

  /**
   * @param null $albumId
   *
   * @return array|mixed
   * @throws \Exception
   */
  protected function getPhotos($albumId = NULL): mixed {

    if ($albumId === NULL) {
      $albumId = random_int(1, 20);
    }

    // Try to obtain the photo data via the external API.
    try {
      $response = $this->httpClient()->request('GET', "https://jsonplaceholder.typicode.com/albums/$albumId/photos");
      $raw_data = $response->getBody()->getContents();
      $data = $this->json->decode($raw_data);
    }
    catch (GuzzleException $e) {
      $this->logger()->error($e->getMessage());
      $data = FALSE;
    }

    return $data;
  }

  protected function logger(): LoggerChannelInterface {
    return $this->loggerChannelFactory;
  }

}
