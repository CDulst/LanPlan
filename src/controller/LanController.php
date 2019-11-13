<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/LanDAO.php';
require_once __DIR__ . '/../dao/LocationDAO.php';

class LanController extends Controller {


  private $todoDAO;

  function __construct() {
    $this->lanDAO = new LanDAO();
    $this->locationDAO = new LocationDAO();
  }


  public function index() {

    /*if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'insertTodo') {
        $this->handleInsertTodo();
      }
    }
    */

    $lans= $this->lanDAO->selectAll();
    $locations = $this->locationDAO->selectAll();
    $location =
    $this->set('lans', $lans);
    $this->set('locations', $locations);
    $this->set('title', 'Overview');

    /*if (strtolower($_SERVER['HTTP_ACCEPT']) == 'application/json') {
      header('Content-Type: application/json');
      echo json_encode($todos);
      exit();
    }
    */
  }



}

