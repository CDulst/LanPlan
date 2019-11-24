<?php
require_once( __DIR__ . '/DAO.php');

class LanDAO extends DAO {



  public function selectAll(){
    $sql = "SELECT * FROM `LanParties`";
    $stmt = $this->pdo->prepare($sql);
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

  public function insertLan($data) {
    $errors = $this->validate( $data );
    if (empty($errors)) {
      $sql = "INSERT INTO `LanParties` (`Name`, `LocationID`, `Date`) VALUES (:naam, :locationid, :datum)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':naam', $data['name']);
      $stmt->bindValue(':locationid', $data['locationID']);
      $stmt->bindValue(':datum', $data['date']);
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

