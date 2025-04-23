<?php
namespace models;

require_once __DIR__ . '/../config/konek.php';

use config\konek;
use PDO;

class user {
    public static function get()
    {
        $pdo = konek::make();
        $sql = 'SELECT * FROM users';
        $statement = $pdo->query($sql);
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }
    public static function create($data)
     {
        $pdo = konek::make();
        $sql = 'INSERT INTO users (firstname, lastname, gender, age, weight) VALUES (:firstname, :lastname, :gender, :age, :weight)';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':firstname', $data['firstname']);
        $statement->bindParam(':lastname', $data['lastname']);
        $statement->bindParam(':gender', $data['gender']);
        $statement->bindParam(':age', $data['age']);
        $statement->bindParam(':weight', $data['weight']);

        return $statement->execute():

        //return $statement->execute ([
        //     ':firstname' => $data['firstname'],
        //     ':lastname' => $data['lastname'],
        //     ':gender' => $data['gender'],
        //     ':age' => $data['age'],
        //     ':weight' => $data['weight'],
        //]);
    }

    public static function find(){}

    public static function update(){}

    public static function delete(){}




}

?>