<?php
require_once( __DIR__ . '/DAO.php');

class SystemsDAO extends DAO {



  public function selectAll(){
    $sql = "SELECT * FROM `LanSystems`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id){
    $sql = "SELECT * FROM `LanSystems` WHERE `SystemID` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectSnacksById($id){
    $sql = "SELECT * FROM `Lanparty_LanSystems` WHERE `SystemsID` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
  }



  public function delete($id){
    $sql = "DELETE FROM `Lanparty_LanSystems` WHERE `SystemsID` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
  }

  public function updateLan($toUpdate,$value){
    if ($toUpdate == "Name"){
      $sql = "UPDATE `LanParties` SET `Name` = :valu WHERE PartyID = :id";
    }
    if ($toUpdate == "Date"){
      $sql = "UPDATE `LanParties` SET `Date` = :valu WHERE PartyID = :id";
    }
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':valu', $value);
    $stmt->bindValue(':id', $_GET["id"]);
    return $stmt->execute();
  }

  public function insertSystemsid($snackdata) {
      $sql = "INSERT INTO `Lanparty_LanSystems` (`SystemsID`, `SystemID`) VALUES (:systemsid,:systemid)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':systemsid', $snackdata['systemsid']);
      $stmt->bindValue(':systemid', $snackdata['systemid']);
      if ($stmt->execute()) {
        return $this->selectById($this->pdo->lastInsertId());
      }
    return false;
  }

  public function insertSystem($data) {

    $sql = "INSERT INTO `LanSystems` (`Systemname`,`Systemimage`) VALUES (:systemname, :systemimage)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':systemname', $data['systemname']);
    $stmt->bindValue(':systemimage', $data['systemimage']);
    if ($stmt->execute()) {
      return $this->selectById($this->pdo->lastInsertId());
    }
  }


  public function validate( $data ){
    $errors = [];
    if (!isset($data['name'])) {
      $errors['Name'] = 'This field is required';
    }
    if (!isset($data['locationID'])) {
      $errors['LocationID'] = 'This field is required';
    }
    if (!isset($data['date'])) {
      $errors['Date'] =  'This field is required';
    }
    return $errors;
  }

}

