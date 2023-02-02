<?php
/*
* This Class represent  the Data stored in a table
* Each Raw has 3 properties : ID, CoumnID, Value
*  We define the type of the  

*/

class Data{
    //Properties
    private $idRaw;
    private $value;
    private $columnId;

    //Setters & Getters
    public function getIdRaw(){
        return $this->idRaw;
    }
    public function getValue(){
        return $this->value;
    }
    public function setValue($value){
        return $this->value;
    }
    public function getColumnId($columnId){
        return $this->columnId;
    }
    public function set($columnId){
        return $this->columnId;
    }
    //Constructor
    public function __construct($value,$columnId){
        $this->value = $value;
        $this->columnId = $columnId;
    }
}





?>