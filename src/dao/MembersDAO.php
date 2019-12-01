<?php
require_once( __DIR__ . '/DAO.php');

class MembersDAO extends DAO {



  public function selectAll(){
    $sql = "SELECT * FROM `LanMembers`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id){
    $sql = "SELECT * FROM `LanMembers` WHERE `MemberID` = :memberid";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':memberid', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectByName($name){
    $sql = "SELECT * FROM `LanMembers` WHERE `MemberName` = :nam";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':nam', $name);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  public function updateMember($toUpdate,$value){
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


  public function insertMember($data) {
      $sql = "INSERT INTO `LanMembers` (`MemberName`, `MemberWW`) VALUES (:membername, :memberww)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':membername', $data['membername']);
      $stmt->bindValue(':memberww', $data['memberww']);
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

