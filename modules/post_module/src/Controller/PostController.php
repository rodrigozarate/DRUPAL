<?php
namespace Drupal\post_module\Controller;

class PostController {
  public function post() {

    $base = $GLOBALS['base_path'];
    $current_path = \Drupal::service('path.current')->getPath();

    $q_id = explode('/',$current_path);

    $uri = 'https://www.zarate.com.co/api/films/'.$q_id[2];

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

    $q_director = $dataarray->directorId;
    $q_productor = $dataarray->productorId;

    $uridirector = 'https://www.zarate.com.co/api/directors/'.$q_director;
    try {
      $responsedirector = \Drupal::httpClient()->get($uridirector, array('headers' => array('Accept' => 'text/plain')));
      $datadirector = (string) $responsedirector->getBody();
      if (empty($datadirector)) {
        return FALSE;
      }
    }
    catch (RequestException $e) {
      return FALSE;
    }

    $dataarraydirector = json_decode($datadirector);

    $uriproductor = 'https://www.zarate.com.co/api/producer/'.$q_productor;
    try {
      $responseproductor = \Drupal::httpClient()->get($uriproductor, array('headers' => array('Accept' => 'text/plain')));
      $dataproductor = (string) $responseproductor->getBody();
      if (empty($dataproductor)) {
        return FALSE;
      }
    }
    catch (RequestException $e) {
      return FALSE;
    }

    $dataarrayproductor = json_decode($dataproductor);

    return array(
      '#title' => $dataarray->title,
      '#markup' => '<h2>Director: '.$dataarraydirector->name.'</h2><h3>Productor: '.$dataarrayproductor->name.'</h3><p>'.$dataarray->body.'</p><h4><a href="'.$base.'articlelist/page"> < Back </a></h4>',
      '#cache' => ['max-age' => 3600,]
    );

  }

}
