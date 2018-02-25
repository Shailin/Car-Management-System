<?php
class CarEntity
{
    public $id;
    public $cname;
    public $brand;
    public $images;
    public $seats;
    public $type;
    public $htmlpth;
    public $price;

    function __construct($id,$cname,$brand,$images,$seats,$type,$htmlpth,$price) {
        $this->id = $id;
        $this->cname = $cname;
        $this->brand = $brand;
        $this->images = $images;
        $this->seats = $seats;
        $this->type = $type;
        $this->htmlpth = $htmlpth;
        $this->price = $price;
    }
}
?>