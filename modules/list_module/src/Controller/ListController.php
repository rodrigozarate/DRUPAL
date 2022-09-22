<?php
namespace Drupal\list_module\Controller;


class ListController {

  public function list() {

    if (session_status() == PHP_SESSION_NONE) {
      $_SESSION['flag'] = TRUE;
      $this->sessionManager->start();
    }

    $host = \Drupal::request()->getSchemeAndHttpHost();
    $basep = $GLOBALS['base_path'];
    // $uri = 'https://www.scalablepath.com/api/test/test-posts';
    $uri = 'https://www.zarate.com.co/api/films';

    try {
      $response = \Drupal::httpClient()->get($uri, array('headers' => array('Accept' => 'text/plain')));
      $data = (string) $response->getBody();
      if (empty($data)) {
        return FALSE;
      }
    }
    catch (RequestException $e) {
      return FALSE;
    }

    $dataarray = json_decode($data);

    // $uriuser = 'https://www.scalablepath.com/api/test/test-users';
    $uriuser = 'https://www.zarate.com.co/api/directors';
    try {
      $responseuser = \Drupal::httpClient()->get($uriuser, array('headers' => array('Accept' => 'text/plain')));
      $datauser = (string) $responseuser->getBody();
      if (empty($datauser)) {
        return FALSE;
      }
    }
    catch (RequestException $e) {
      return FALSE;
    }

    $dataarrayuser = json_decode($datauser);

    $usernames = array();
    for ($i = 0; $i < count($dataarrayuser); $i++) {
      $usernames[$dataarrayuser[$i]->directorId] = $dataarrayuser[$i]->name;
    }

    $long = count($dataarray);

    $xcontent = '';

    for ($i = 0; $i < $long; $i++){
      $xcontent .= '<li><a href="'.$host.$basep.'post/'.$dataarray[$i]->id.'">'.$dataarray[$i]->title.'</a> ('.$usernames[$dataarray[$i]->directorId].')</li>';
    }

    return array(
      '#markup' => '<ul>'.$xcontent.'</ul>',
      '#cache' => ['max-age' => 3600,]
    );
  }
}
