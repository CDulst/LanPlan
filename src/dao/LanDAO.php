<?php
require_once( __DIR__ . '/DAO.php');

class LanDAO extends DAO {



  public function selectAll($member){
    $sql = "SELECT * FROM `LanParties` WHERE `MemberID` = :member ORDER BY `date` DESC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':member', $member["memberid"]);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id){
    $sql = "SELECT * FROM `LanParties` WHERE `PartyID` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function delete($id){
    $sql = "DELETE FROM `LanParties` WHERE `PartyID` = :id";
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
    if ($toUpdate == "SnacksID"){
      $sql = "UPDATE `LanParties` SET `SnacksID` = :valu WHERE PartyID = :id";
    }
    if ($toUpdate == "GamesID"){
      $sql = "UPDATE `LanParties` SET `GamesID` = :valu WHERE PartyID = :id";
    }
    if ($toUpdate == "SystemsID"){
      $sql = "UPDATE `LanParties` SET `SystemsID` = :valu WHERE PartyID = :id";
    }
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':valu', $value);
    $stmt->bindValue(':id', $_GET["id"]);
    return $stmt->execute();
  }

  public function insertLan($data) {
    $errors = $this->validate( $data );
    if (empty($errors)) {
      $sql = "INSERT INTO `LanParties` (`Name`, `LocationID`, `Date`, `SnacksID`, `GamesID`, `SystemsID`, `MemberID`) VALUES (:naam, :locationid, :datum, :snacksid, :gamesid, :systemsid, :memberid)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':naam', $data['name']);
      $stmt->bindValue(':locationid', $data['locationID']);
      $stmt->bindValue(':datum', $data['date']);
      $stmt->bindValue(':snacksid', $data['snacksid']);
      $stmt->bindValue(':gamesid', $data['gamesid']);
      $stmt->bindValue(':systemsid', $data['systemsid']);
      $stmt->bindValue(':memberid', $data['membersid']);
      if ($stmt->execute()) {
        return $this->selectById($this->pdo->lastInsertId());
      }
    }
    return false;
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

