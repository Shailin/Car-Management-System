<?php
require ("Model/CarModel.php");

//Contains non-database related function for the Car page
class CarController {

    function CreateCarDropdownList() {
        $carModel = new CarModel();
        $result = "
            <input type='checkbox' name='type[]' value = '%' checked>All
            " . $this->CarOptionValues($carModel->GetCarTypes(),"type[]");

        return $result;
    }

    function CreateCarBrandDropdown() {
        $carModel = new CarModel();
        $result = "
            <input type='checkbox' name='brand[]' value = '%' checked>All
            " . $this->CarOptionValues($carModel->GetCarBrands(),"brand[]") ;

        return $result;
    }

     function CreateCarNameDropdown($name) {
        $carModel = new CarModel();
        $result = "
            <select name = 'name' >
            <option value = '%' >All</option>
            " . $this->CreateOptionValues($carModel->GetCarName($name)) .
            "</select>";

        return $result;
    }

    function CarOptionValues(array $valueArray,$op) {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<input type='checkbox' name='$op' value='$value'>$value";
        }

        return $result;
    }

     function CreateMixedTypes($brand,$types,$price){
        $carModel = new CarModel();
        $carArray = $carModel->GetMixedType($brand,$types,$price);
        return($this->CreateCarTables($carArray));
     }

     function CreateCarTypes($types)
     {
        $carModel = new CarModel();
        $carArray = $carModel->GetCarByType($types);
        return($this->CreateCarTables($carArray));
     }

     function CreateCarPrice($price)
     {
        $carModel = new CarModel();
        $carArray = $carModel->GetCarByPrice($price);
        return($this->CreateCarTables($carArray));
     }

    function CreateCarTables($carArray)
    {
      $result = "";
      $n=0;

      //Generate a carTable for each carEntity in array
      foreach ($carArray as $key => $car)
      {
            $n++;
            $result = $result .
                    "<table class = 'carTable' align:center>
                      <tr>
                       <th rowspan='6' width = '150px' >
                          <a href='$car->htmlpth'>
                            <img runat = 'server' src = '$car->images' />
                          </a>
                        </th>

                       <td colspan='2' class='carname'>$car->cname <hr/></td>
                      </tr>

                      <tr>
                        <th width='75px'>Type: </th>
                        <td>$car->type</td>
                      </tr>

                      <tr>
                       <th>Price: </th>
                       <td>$car->price Lakhs</td>
                      </tr>

                      <tr>
                        <th>Name </th>
                        <td>$car->brand</td>
                      </tr>

                      <tr>
                        <th>Seats: </th>
                        <td>$car->seats</td>
                      </tr>

                     </table>";
        }
        $result="(Fetch Result gaved $n values)". $result;
        return $result;
    }

    function CustomerTable() {
        $result="<h3>Your Cars List on our website</h3>";

        session_start();
        $carArray = $this->GetCarByEmail($_SESSION['uemail']);

        foreach ($carArray as $key => $value) {
            $result = $result ."
                 <table class = 'carTable' align:center>
                      <tr>
                       <th rowspan='6' width = '150px' >
                          <a href='$car->htmlpth'>
                            <img runat = 'server' src = '$car->images' />
                          </a>
                        </th>

                       <td colspan='2' class='carname'>$car->cname <hr/></td>
                      </tr>

                      <tr>
                        <th width='75px'>Type: </th>
                        <td>$car->type</td>
                      </tr>

                      <tr>
                       <th>Price: </th>
                       <td>$car->price Lakhs</td>
                      </tr>

                      <tr>
                        <th>Name </th>
                        <td>$car->brand</td>
                      </tr>

                      <tr>
                        <th>Seats: </th>
                        <td>$car->seats</td>
                      </tr>

                       <td><a href='#' onclick='showConfirm($value->id)'>Delete</a></td>

                     </table>";
        }
        return $result;
    }
}

?>
