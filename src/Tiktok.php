<?php

namespace Drupal\tiktok;

use GuzzleHttp\ClientInterface;

/**
 * Class Tiktok
 *
 * @package Drupal\tiktok
 */
class Tiktok implements TiktokInterface {

  /**
   * The HTTP client.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  /**
   * PostManager constructor.
   *
   * @param \GuzzleHttp\ClientInterface $httpClient
   *   The HTTP client.
   */
  public function __construct(ClientInterface $httpClient) {
    $this->httpClient = $httpClient;
  }

  /**
   * {@inheritdoc}
   */
  public function getEmbed($url) {
    try {
      $request = $this->httpClient->request('GET', self::ENDPOINT . '/oembed', [
        'headers' => [
          'Content-Type' => 'application/json',
        ],
        'query' => [
          'url' => $url
        ]
      ]);
      return json_decode($request->getBody(), TRUE);
    }
    catch (\Exception $e) {
      watchdog_exception('tiktok', $e);
    }
    return NULL;
  }

}
