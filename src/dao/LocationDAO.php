<?php

require_once( __DIR__ . '/DAO.php');

class LocationDAO extends DAO {



  public function selectAll(){
    $sql = "SELECT * FROM `PartyLocation`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id){
    $sql = "SELECT * FROM `PartyLocation` WHERE `LocationID` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function delete($id){
    $sql = "DELETE FROM `PartyLocation` WHERE `LocationID` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
  }

  public function insert($data) {
    $errors = $this->validate( $data );
    if (empty($errors)) {
      $sql = "INSERT INTO `PartyLocation` (`Street`, `Streetnumber`, `City`, `Postal number`) VALUES (:Street, :Streetnumber, :City, :PostalNumber)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':Street', $data['Street']);
      $stmt->bindValue(':Streetnumber', $data['Streetnumber']);
      $stmt->bindValue(':City', $data['City']);
      $stmt->bindValue(':PostalNumber', $data['PostalNumber']);
      if ($stmt->execute()) {
        return $this->selectById($this->pdo->lastInsertId());
      }
    }
    return false;
  }

  public function validate( $data ){
    $errors = [];
    if (!isset($data['Street'])) {
      $errors['Street'] = 'This field is required!';
    }
    if (!isset($data['Streetnumber'])) {
      $errors['Streetnumber'] = 'This field is required';
    }
    if (!isset($data['City'])) {
      $errors['City'] = 'This field is required';
    }
    if (empty($data['Postal number']) ){
      $errors['Postal number'] = 'This field is required';
    }
    return $errors;
  }

}

