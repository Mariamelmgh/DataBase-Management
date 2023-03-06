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

    $data = Connection::getAllTables();
    return $data;
}

//DELETE ELL DATA FROM TABLE
function deleteAllData($tableName, $columns){
    $controller = new ManageTable($tableName, $columns);
    $controller->Suprimer("");
}

//DROP TABLE 
function dropTable($tableName){
    $controller = new ManageDataBase();
    $controller->Suprimer($tableName);
}

//GET ALL Culmns from db
function getAllCulomns($tableName){
  $col_Name =   Connection::getAllColumns($tableName);
  return $col_Name;
}


//Alter column in a table
function alterColumn($columns, $tableName){
    
  Column::Modifier($columns,$tableName);


}

//Addd data into a table
function intertIntoTable($tableName, $data,$columns){

    $controller = new ManageTable($tableName,$columns);
    $controller ->ajouter($data);
}


//suprimer data

function deleteData($tableName, $columns, $clause){
    $controller = new ManageTable($tableName, $columns);
    $controller->Suprimer($clause);
}
?>
