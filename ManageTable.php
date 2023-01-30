<?php
include "Column.php";
class ManageTable{
//Properties
private $tableName;
private $nbColumn;
private $columns;
private $commentaireDeTable;
private $interclassement;
private $moteurDeStockage;

//Getters & Setters

public function getTableName(){
    return $this -> tableName;
}
public function setTableName($tableName){
    $this -> tableName = $tableName;
}
public function getNbColumn(){
    return $this -> nbColumn;
}
public function setNbColumn($nbColumn){
    if($nbColumn <= 0){
        return "Entrer un nombre valide";
    }
    $this -> nbColumn = $nbColumn;
}
public function getColumns(){
    return $this -> columns;
}
public function setColumns($columns){
    //if(count($columns) =! $this -> nbColumn){
      //  return "Le nombre de columns entrée faut étre egaux au nbColumns";
    //}
    $this -> columns = $columns;
}
public function getCommentaireDeTable(){
    return $this -> commentaireDeTable;
}
public function setCommentaireDeTable($commentaireDeTable){
    $this -> commentaireDeTable = $commentaireDeTable;
}
public function getInterclassement(){
    return $this -> interclassement;
}
public function setInterclassement($interclassement){
    $this -> interclassement = $interclassement;
}
public function getMoteurDeStockage(){
    return $this -> moteurDeStockage;
}
public function setMoteurDeStockage($moteurDeStockage){
    $this -> moteurDeStockage = $moteurDeStockage;
}
//Constructior
public function __construct($tableName, $nbColumn,$columns,$commentaireDeTable, $interclassement, $moteurDeStockage){
    $this -> setTableName($tableName);
    $this -> setNbColumn($nbColumn);
    $this -> setColumns($columns);
    $this -> setCommentaireDeTable($commentaireDeTable);
    $this -> setInterclassement($interclassement);
    $this -> setMoteurDeStockage($moteurDeStockage);
}
//Methods
//Get Connection  to realtime db
public function executeQuery($query){
    $connection = mysqli_connect("localhost","root","","PFM");
    $executeQuery = mysqli_query($connection, $query);
    return $executeQuery;    
}
//Afficher
public function afficher($selectedData,$keyword,$condition,$creteria){
    $query= "select ";
    //Construct Query;
    $countSelectedData = count($selectedData);
    if($countSelectedData> 0){
        for ($i=0; $i <$countSelectedData; $i++) { 
            $query .= $selectedData[$i] .",";
        }
    }else{
        $query .="*";
    }
    $query .= " FROM ". $this -> tableName . " "  . $keyword;

    $creteriaCount = count($creteria);

    foreach ($creteria as $key => $value) {
        $query .= " $key $condition $value";
    }
    echo $query;
    $this ->executeQuery($query);
}
//Ajouter
public function ajouter(){

}
//Modifier
public function modifier(){

}
//Suprimer
public function Suprimer(){

}
}
$column = new Column();
$columns = array($column);
$creteria = array("id" => 1);
$table = new ManageTable("test", 1,$columns,"test", "test", "test");
$table ->afficher(array(),"where","=",$creteria);
?>