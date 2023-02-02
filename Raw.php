<?php

/*
* THis class represent one line of data (Enregistrement)
*/
class Raw{
    private $rawId;
    private $data;

    //getter & Setter
    public function getData(){
        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function getRawId(){
        return $this->rawId;
    }
}
?>