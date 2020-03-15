<?php

namespace Drupal\tiktok;

/**
 * Interface TiktokInterface
 *
 * @package Drupal\tiktok
 */
interface TiktokInterface {

  const ENDPOINT = 'https://www.tiktok.com';

  /**
   * Convert a TikTok's video URL into embedded video markup.
   *
   * @param string $url
   *   The video link for embedding
   *
   * @return mixed
   *
   * @see https://developers.tiktok.com/doc/Embed
   */
  public function getEmbed($url);

}
