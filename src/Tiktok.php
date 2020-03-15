<?php

namespace Drupal\tiktok;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

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
  public function getEmbed(string $url) {
    try {
      $request = $this->httpClient->request('GET', self::ENDPOINT . '/oembed', [
        'headers' => [
          'Content-Type' => 'application/json',
        ],
        'query' => [
          'url' => $url,
        ]
      ]);
      return json_decode($request->getBody(), TRUE);
    }
    catch (RequestException $e) {
      watchdog_exception('tiktok', $e);
    }
    return NULL;
  }

}
