<?php
include "../ManageDataBase.php";
include "../ManageTable.php";
include "../Connection.php";
 function CreerTable($tableName,$columns){
    
    $controller = new ManageDataBase();
   
    $controller -> Ajouter($tableName,$columns); 

}
//GET ALL TABLE DATA

function getAllData($tableName, $columns){

    $controller = new ManageTable($tableName, $columns);
    $data = $controller->afficher(array(), "", "", array());
    return $data;

}
//GET ALL TABLES
function getAllTables(){

}













?>
