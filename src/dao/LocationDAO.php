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

  public function updateLocation($data,$id){
    $sql = "UPDATE `PartyLocation` SET `Street` = :street, `Streetnumber`= :streetnumber, `City`= :city, `Postal number` = :postalnumber WHERE LocationID = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':street', $data["street"]);
    $stmt->bindValue(':streetnumber', $data["streetnumber"]);
    $stmt->bindValue(':city', $data["city"]);
    $stmt->bindValue(':postalnumber', $data["postalnumber"]);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
  }

  public function insertLocation($data) {
    $errors = $this->validate( $data );
    if (empty($errors)) {
      $sql = "INSERT INTO `PartyLocation` (`Street`, `Streetnumber`, `City`, `Postal number`) VALUES (:Street, :Streetnumber, :City, :PostalNumber)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':Street', $data['street']);
      $stmt->bindValue(':Streetnumber', $data['number']);
      $stmt->bindValue(':City', $data['city']);
      $stmt->bindValue(':PostalNumber', $data['postalnumber']);
      if ($stmt->execute()) {
        return $this->selectById($this->pdo->lastInsertId());
      }
    }
    return false;
  }

  public function validate( $data ){
    $errors = [];
    if (!isset($data['street'])) {
      $errors['Street'] = 'This field is required!';
    }
    if (!isset($data['number'])) {
      $errors['Streetnumber'] = 'This field is required';
    }
    if (!isset($data['city'])) {
      $errors['City'] = 'This field is required';
    }
    if (empty($data['postalnumber']) ){
      $errors['Postal number'] = 'This field is required';
    }
    return $errors;
  }

}

