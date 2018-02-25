<script>
    //Display a confirmation box when trying to delete an object
function showConfirm(id)
{
    // build the confirmation box
    var c = confirm("Are you sure you wish to delete this item?");

    // if true, delete item and refresh
    if(c)
        window.location = "UserOverview.php?delete=" + id;
}
</script>

<?php
require ("UCarModel.php");

//Contains non-database related function for the Coffee page
class UCarController {

    function CreateOverviewTable() {
        $result="<h3>Used Cars List on our website</h3>";
        $carArray = $this->GetCarByType('%');

        foreach ($carArray as $key => $value) {
            $result = $result ."
                <table class='carTable1'>
                   <tr>
                        <td>Images</td>
                        <td><b>Name</b></td>
                        <td><b>Type</b></td>
                        <td><b>Price</b></td>
                        <td><b>Description</b></td>
                   </tr>
                    <tr>
                        <td> <img runat = 'server' src = '$value->image' /></td>
                        <td>$value->name</td>
                        <td>$value->type</td>
                        <td>$value->price</td>
                        <td>$value->descp</td>
                    </tr>
                </table>";
        }
        return $result;
    }

    function CustomerTable() {
        session_start();

        $var=$_SESSION['uemail'];
        $result="<h3><strong>$var</strong> your Cars List on our website</h3>";
        $carArray = $this->GetCarByEmail($_SESSION['uemail']);

        foreach ($carArray as $key => $value) {
            $result = $result ."
                <table class='carTable1 carTable2'>
                   <tr>
                        <td >Images</td>
                        <td><b>Id</b></td>
                        <td><b>Name</b></td>
                        <td><b>Type</b></td>
                        <td><b>Price</b></td>
                        <td><b>Description</b></td>
                   </tr>
                    <tr>
                        <td> <img runat = 'server' src = '$value->image' /></td>
                        <td>$value->id</td>
                        <td>$value->name</td>
                        <td>$value->type</td>
                        <td>$value->price</td>
                        <td>$value->descp</td>
                        <td><a href='CarAdd.php?update=$value->id'>Update</a></td>
                        <td><a href='#' onclick='showConfirm($value->id)'>Delete</a></td>
                    </tr>
                </table>";
        }
        return $result;
    }

    function CreateCarDropdownList() {
        $carModel = new UCarModel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Please select a type:
                    <select name = 'types' >
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($this->GetCarTypes()) .
                "</select>
                     <input type = 'submit' value = 'Search' />
                    </form>";

        return $result;
    }

    function CreateOptionValues(array $valueArray) {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }

    function CreateCarTables($types) {
        $carModel = new UCarModel();
        $carArray = $carModel->GetCoffeeByType($types);
        $result = "";

        //Generate a coffeeTable for each coffeeEntity in array
        foreach ($carArray as $key => $car) {
            $result = $result .
                    "<table class = 'carTable'>
                        <tr>
                            <th rowspan='6' width = '150px' ><img runat = 'server' src = '$car->image' /></th>
                            <th width = '75px' >Name: </th>
                            <td>$car->name</td>
                        </tr>

                        <tr>
                            <th>Type: </th>
                            <td>$car->type</td>
                        </tr>

                        <tr>
                            <th>Price: </th>
                            <td>$coffee->price</td>
                        </tr>

                        <tr>
                            <th>Roast: </th>
                            <td>$coffee->roast</td>
                        </tr>

                        <tr>
                            <th>Origin: </th>
                            <td>$coffee->country</td>
                        </tr>

                        <tr>
                            <td colspan='2' >$coffee->review</td>
                        </tr>
                     </table>";
        }
        return $result;
    }


    //Returns list of files in a folder.
    function GetImages() {
        //Select folder to scan
        $handle = opendir("images/Car");

        //Read all files and store names in array
        while ($image = readdir($handle)) {
            $images[] = $image;
        }

        closedir($handle);

        //Exclude all filenames where filename length < 3
        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }

        //Create <select><option> Values and return result
        $result = $this->CreateOptionValues($imageArray);
        return $result;
    }

    //<editor-fold desc="Set Methods">
    function InsertCar() {
        $name = $_POST["txtName"];
        $price = $_POST["txtPrice"];
        $desc = $_POST["txtdesc"];
        $type = $_POST["ddltype"];
        $image = $_POST["ddlImage"];
        $email=$_SESSION['uemail'];

        $car = new UCarEntity(-1, $name,$price, $desc,$type, $image,$email);
        $carModel = new UCarModel();
        $carModel->InsertCar($car);
    }

    function UpdateCar($id) {
        $name = $_POST["txtName"];
        $price = $_POST["txtPrice"];
        $desc = $_POST["txtdesc"];
        $type = $_POST["ddltype"];
        $image = $_POST["ddlImage"];
        $email=$_SESSION['uemail'];

        $car = new UCarEntity(-1, $name,$price, $desc, $type, $image,$email);
        $carModel = new UCarModel();
        $carModel->UpdateCar($id, $car);
    }

    function DeleteCar($id)
    {
        $carModel = new UCarModel();
        $carModel->DeleteCar($id);
    }

    function GetCarById($id) {
        $carModel = new UCarModel();
        return $carModel->GetCarById($id);
    }

    function GetCarByType($type) {
        $carModel = new UCarModel();
        return $carModel->GetCarByType($type);
    }

    function GetCarByEmail($email) {
        $carModel = new UCarModel();
        return $carModel->GetCarByEmail($email);
    }

    function GetCarTypes() {
        $carModel = new UCarModel();
        return $carModel->GetCarTypes();
    }
}
?>