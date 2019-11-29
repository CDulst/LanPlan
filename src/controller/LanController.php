<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/LanDAO.php';
require_once __DIR__ . '/../dao/LocationDAO.php';
require_once __DIR__ . '/../dao/SnacksDAO.php';

class LanController extends Controller {


  private $todoDAO;

  function __construct() {
    $this->lanDAO = new LanDAO();
    $this->locationDAO = new LocationDAO();
    $this->snacksDAO = new  SnacksDAO();
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

  public function plan() {

    if (isset($_POST["name"]) && $_POST["name"] == " "){
      header('Location: index.php?page=plan&flow=name');
      exit;
    }

    if (isset($_POST["date"]) && strtotime($_POST["date"]) < time())
{

  header('Location: index.php?page=plan&flow=date&error='.$_POST['date']);
  exit;
}

   if ($_GET["flow"] == "snacks"){
    $snacks = $this->snacksDAO->selectAll();
    $this->set('snacks', $snacks);
   }

   if (isset($_POST["snack"])){
    $snacksarray = array();
    foreach ($_POST["snack"] as $snack){
      $snack = $this->snacksDAO->selectById($snack);
      array_push($snacksarray,$snack);
    }
    $this->set('snacks', $snacksarray);
   }


    if ($_GET["flow"] == "finished"){

      $SnacksID = rand(1,100000);
      foreach ($_SESSION["snack"] as $snack){
        $snackdata = array(
          'snacksid' => $SnacksID,
          'snackid' => $snack["Snackid"]
        );
        $snackadded = $this->snacksDAO->insertSnacksid($snackdata);
      }

      $location = $_SESSION["street"]." ".$_SESSION["number"]." ".$_SESSION["postalnumber"]." ".$_SESSION["city"];
      $locationdata = array(
        'street' => $_SESSION["street"],
        'number' => $_SESSION["number"],
        'postalnumber' => $_SESSION["postalnumber"],
        'city' => $_SESSION["city"],
      );
      $locationadded = $this->locationDAO->insertLocation($locationdata);
      $locationsbase = $this->locationDAO->selectAll();
      foreach ($locationsbase as $locationbase){
        $location2 = $locationbase["Street"]." ".$locationbase["Streetnumber"]." ".$locationbase["Postal number"]." ".$locationbase["City"];
        if ($location = $location2){
          $landata = array(
            'name' => $_SESSION["name"],
            'date' => $_SESSION["date"],
            'locationID' => $locationbase["LocationID"],
            'snacksid' => $SnacksID
          );
        }
      }
      $locationadded = $this->lanDAO->insertLan($landata);

     }
  }


  public function detail(){
    if (isset($_POST["name"])){
      $toUpdate = "Name";
      $value = $_POST["name"];
      $lanupdate= $this->lanDAO->updateLan($toUpdate,$value);
    }
    if (isset($_POST["date"])){
      $toUpdate = "Date";
      $value = $_POST["date"];
      $lanupdate= $this->lanDAO->updateLan($toUpdate,$value);
    }
    if (isset($_POST["snack"])){
      $delete = $this->snacksDAO->delete($_GET["edit"]);
      $SnacksID = rand(1,100000);
      foreach ($_POST["snack"] as $snack){
        $snackdata = array(
          'snacksid' => $SnacksID,
          'snackid' => $snack
        );
        $snackadded = $this->snacksDAO->insertSnacksid($snackdata);
      $toUpdate = "SnacksID";
      $value = $SnacksID;
      $lanupdate= $this->lanDAO->updateLan($toUpdate,$value);
      }

    }
    $lan = $this->lanDAO->selectById($_GET["id"]);
    if (isset($_POST["street"])){
      $data = array(
        'street' => $_POST["street"],
        'streetnumber' => $_POST["number"],
        'city' => $_POST["city"],
        'postalnumber' => $_POST["postalnumber"]
      );
      $locationupdate = $this->locationDAO->updateLocation($data,$lan["LocationID"]);
    }
    $location = $this->locationDAO->selectById($lan["LocationID"]);
    $snackid = $this->snacksDAO->selectSnacksById($lan["SnacksID"]);
    $this->set('lan', $lan);
    $this->set('location', $location);
    $snacksarray = array();
    foreach ($snackid as $snack){
      $snack = $this->snacksDAO->selectById($snack["SnackID"]);
      array_push($snacksarray,$snack);
    }
    $this->set('snacks', $snacksarray);



}
}

