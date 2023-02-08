<?php
/*
* This class is for managing tables in a data base   
*  We have CRUD for tables 
* 
*/
//include("Column.php");
//include("Connection.php");
class ManageDataBase{

//CRUD : 
public function Afficher(){

}
public function constructGetters($attribute){

  $getter = "public function get$attribute(){
      return $"."this -> $attribute;
  }";
  return $getter;
}
public function constructSetters($attribute){
  $setter = "public function set$attribute($"."$attribute){
      $"."this -> $attribute = $"."$attribute; 
  }";
  return $setter;
}
public function Ajouter($tableName, $columns){
    //SQL Query to create db
    //CREATE TABLE Persons (
    //    PersonID int,
    //    LastName varchar(255),
    //    FirstName varchar(255),
    //    Address varchar(255),
    //    City varchar(255) 
    //);
    $col = "(";
    $content = "<?php class $tableName extends ManageTables{ \n ";
    $constraint = "";
    for ($i=0; $i < count($columns); $i++) { 
        if($i != count($columns) -1) {
       
            $col .= " ".$columns[$i]->getNomColumn() . " " . $columns[$i]->getType()." " .$columns[$i]->isNull() ." " . $columns[$i]-> isAutoIncrement() . ",";
            if($constraint != ''){
              $constraint .= ',';
            }
          } else {
            if($constraint == ""){
              $constraint .= ',';
              $col .= " ".$columns[$i]->getNomColumn() . " " . $columns[$i]->getType()." " .$columns[$i]->isNull() ." " . $columns[$i]-> isAutoIncrement() .")";
            }else{
              $col .= " ".$columns[$i]->getNomColumn() . " " . $columns[$i]->getType()." " .$columns[$i]->isNull() ." " . $columns[$i]-> isAutoIncrement() .", $constraint)";
            }
         
        }
   //   echo $columns[$i]->getIndex();
        if($columns[$i]-> getIndex() != ""  ){
            $constraint .= $columns[$i]-> getIndex(). ' (' . $columns[$i]->getNomColumn() .')';
        } 
        $content .= "private ". $columns[$i]->getNomColumn() .";\n";
        $content .= $this-> constructGetters($columns[$i]->getNomColumn()) ."\n";
        $content .= $this-> constructSetters($columns[$i]->getNomColumn()) ."\n";
    }
    
     //Create class that inherit from ManageTables 
     //Creating a file with the patrams name 
     $content .= "}?>";
     //$table =   fopen("Tables/$tableName.php","w") or die("Unable to create file");
     //Adding attribute to the new class
     //fwrite($table,$content);  
    // fclose($table);

     $query = "Create Table  IF NOT EXISTS $tableName   $col";
      echo $query;
     Connection::executeQuery($query);
    
     
}
/**
 * /this function is meant to modify an existant table
 * We can add a new column
 * modify an existent column 
 * remove an axistent column
 * Or Rename an existent column
 * @return void
 * 
 */
public function Modifier(){
   

}
/**
 * This function removes an existent table
 * @return void
 */
public function Suprimer($tableName){
    $query = "DROP TABLE IF EXISTS $tableName;";
    Connection::executeQuery($query);
}

/**
 * This method rename the current Table
 * @param 
 * $oldName , $newName
 * @return void
 */
public function Renomer($oldName,$newName){
    //ALTER TABLE table_name
    //RENAME TO new_table_name;
   $query = "alter table $oldName rename to $newName";
   Connection::executeQuery($query);  
}





}

// $manageDb = new ManageDataBase();

//  $c1 = new Column("id","INT",true,false);
//  $c1 -> isPrimaryKey = true;
//  $c2 = new Column("Name", "VARCHAR(255)",false,false);
//  $c3 = new Column("lastName", "VARCHAR(255)",false,true);
//  $columns = array($c1,$c2,$c3);

// $manageDb->Ajouter("NewTest1",$columns);
// echo "done";





?>