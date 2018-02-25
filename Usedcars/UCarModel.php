<?php

require ("UCarEntity.php");
//Contains database related code for the Coffee page.
class UCarModel {

    //Get all car types from the database and return them in an array.
     function GetCarTypes() {
        require 'Credentials.php';


        //Open connection and Select database.
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db($database);
        $result = mysql_query("SELECT DISTINCT type FROM ucar") or die(mysql_error());
        $types = array();

        //Get data from database.
        while ($row = mysql_fetch_array($result)){
            array_push($types, $row[0]);
        }

        //Close connection and return result.
        mysql_close();
        return $types;
    }


    //Get CarEntity objects from the database and return them in an array.
    function GetCarByType($type) {
        require 'Credentials.php';
        //Open connection and Select database.
        mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);

        $query = "SELECT * FROM ucar WHERE type LIKE '$type'";
        $result = mysql_query($query) or die(mysql_error());
        $carArray = array();
        //Get data from database.
        while ($row = mysql_fetch_row($result)) {
            $id        = $row[0];
            $name      = $row[1];
            $price     = $row[2];
            $descp     = $row[3];
            $type      = $row[4];
            $image     = $row[5];
            $email     =$row[6];
            //Create car objects and store them in an array.
            $car = new UCarEntity($id, $name,$price,$descp,$type,$image,$email);
            array_push($carArray, $car);
        }
        //Close connection and return result
        mysql_close();
        return $carArray;
    }

    function GetCarById($id) {
        require 'Credentials.php';

        //Open connection and Select database.
        mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);

        $query = "SELECT * FROM ucar WHERE ucarid = $id ";
        $result = mysql_query($query) or die(mysql_error());
        $carArray = array();

        //Get data from database.
        while ($row = mysql_fetch_row($result)) {
           $id        = $row[0];
            $name      = $row[1];
            $price     = $row[2];
            $descp     = $row[3];
            $type      = $row[4];
            $image     = $row[5];
            $email     =$row[6];
            //Create car objects and store them in an array.
            $car = new UCarEntity($id, $name,$price,$descp,$type,$image,$email);
        }

        //Close connection and return result
        mysql_close();
        return $car;
    }


    function GetCarByEmail($email) {
        require 'Credentials.php';

        //Open connection and Select database.
        mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);

        $query = "SELECT * FROM ucar WHERE emailid='$email' ";
        $result = mysql_query($query) or die(mysql_error());
        $carArray = array();

        //Get data from database.
        while ($row = mysql_fetch_row($result)) {
           $id        = $row[0];
            $name      = $row[1];
            $price     = $row[2];
            $descp     = $row[3];
            $type      = $row[4];
            $image     = $row[5];
            $email     =$row[6];
            //Create car objects and store them in an array.
            $car = new UCarEntity($id, $name,$price,$descp,$type,$image,$email);
            array_push($carArray, $car);
        }

        //Close connection and return result
        mysql_close();
        return $carArray;
    }

    function InsertCar(UCarEntity $car) {
        $query = sprintf("INSERT INTO ucar
                          (uname,price,descp,type,image,emailid)
                          VALUES
                          ('%s','%s','%s','%s','%s','%s')",
                mysql_real_escape_string($car->name),
                mysql_real_escape_string($car->price),
                mysql_real_escape_string($car->descp),
                mysql_real_escape_string($car->type),
                mysql_real_escape_string("images/Car/" . $car->image),
                mysql_real_escape_string($car->email));
        $this->PerformQuery($query);
    }

    function UpdateCar($id, UCarEntity $car) {
        $query = sprintf("UPDATE ucar
                            SET uname = '%s', price = '%s', descp = '%s',
                            type = '%s', image = '%s'
                          WHERE ucarid = $id",
                mysql_real_escape_string($car->name),
                mysql_real_escape_string($car->price),
                mysql_real_escape_string($car->descp),
                mysql_real_escape_string($car->type),
                mysql_real_escape_string("images/Car/" . $car->image),
                mysql_real_escape_string($car->email));

        $this->PerformQuery($query);
    }

    function DeleteCar($id) {
        $query = "DELETE FROM ucar WHERE ucarid = $id";
        $this->PerformQuery($query);
    }

    function PerformQuery($query) {
        require ('Credentials.php');
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db($database);

        //Execute query and close connection
        mysql_query($query) or die(mysql_error());
        mysql_close();
    }
}
?>