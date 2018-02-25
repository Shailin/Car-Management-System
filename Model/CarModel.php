<?php
require ("Model/CarEntity.php");

//Contains database related code for the Car website
class CarModel {
     //Get all car types from the database and return them in an array.
    function GetCarTypes() {
        require 'Credentials.php';

        //Open connection and Select database.
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db($database);
        $result = mysql_query("SELECT DISTINCT Cartype FROM car") or die(mysql_error());
        $types = array();

        //Get data from database.
        while ($row = mysql_fetch_array($result)){
            array_push($types, $row[0]);
        }

        //Close connection and return result.
        mysql_close();
        return $types;
    }

    function GetCarBrands() {
        require 'Credentials.php';

        //Open connection and Select database.
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db($database);
        $result = mysql_query("SELECT DISTINCT Brand FROM car") or die(mysql_error());
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

        $query = "SELECT * FROM car WHERE Cartype LIKE '$type'";
        $result = mysql_query($query) or die(mysql_error());
        $carArray=$this->CreateArray($result);

        //Close connection and return result
        mysql_close();
        return $carArray;
    }

     function GetCarByPrice($price){
        require 'Credentials.php';

        //Open connection and Select database.
        mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);


        if ($price=='%') {
            $query =" SELECT * FROM car ORDER BY Price ";
        }
        else if($price<30){
           $query = "SELECT * FROM car WHERE Price >= $price-5 and Price <=$price ORDER BY Price";
        }
        else if($price==30){
           $query = "SELECT * FROM car WHERE Price >= 15 and Price <=$price ORDER BY Price";
        }
        else{
            $query = "SELECT * FROM car WHERE Price >30 and Price <=$price ORDER BY Price";
        }

        $result = mysql_query($query) or die(mysql_error());
        $carArray=$this->CreateArray($result);

        //Close connection and return result
        mysql_close();
        return $carArray;
    }

    function GetMixedType($brand,$type,$price) {
        require 'Credentials.php';

        //Open connection and Select database.
        mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
        $carArray=array();

        foreach ($brand as $key => $br) {
          foreach ($type as $key => $ty) {

        if ($price=='%') {
          $query =" SELECT * FROM car WHERE Brand LIKE '$br' AND Cartype LIKE '$ty' ORDER BY Price ";
        }
        else if($price<30){
           $query = "SELECT * FROM car WHERE Brand LIKE '$br' AND Cartype LIKE '$ty' AND Price >= $price-5 and Price <=$price ORDER BY Price";
        }
        else if($price==30){
           $query = "SELECT * FROM car WHERE  Brand LIKE '$br' AND Cartype LIKE '$ty' AND  Price >= 15 and Price <=$price ORDER BY Price";
        }
        else{
            $query = "SELECT * FROM car WHERE  Brand LIKE '$br' AND Cartype LIKE '$ty' AND  Price >30 and Price <=$price ORDER BY Price";
        }

        $result = mysql_query($query) or die(mysql_error());
        $car=$this->CreateArray($result);
        $carArray=array_merge($carArray, $car);
       }
    }

         //Close connection and return result
        mysql_close();
        return $carArray;

  }


    function CreateArray($result){
         $carArray = array();

        //Get data from database.
        while ($row = mysql_fetch_row($result)) {
            $cname     = $row[1];
            $brand     = $row[2];
            $images    = $row[3];
            $seats     = $row[4];
            $type      = $row[5];
            $htmlpth   = $row[6];
            $price     = $row[7];

            //Create car objects and store them in an array.
            $coffee = new CarEntity(-1, $cname,$brand,$images,$seats,$type,$htmlpth,$price);
            array_push($carArray, $coffee);
        }

        return $carArray;

    }
}
?>