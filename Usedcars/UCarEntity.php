<?php
class UCarEntity
{
    public $id;
    public $name;
    public $price;
    public $descp;
    public $type;
    public $image;
    public $email;


    function __construct($id,$name,$price,$descp,$type,$image,$email) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->descp = $descp;
        $this->type = $type;
        $this->image = $image;
        $this->email= $email;
    }
}
?>