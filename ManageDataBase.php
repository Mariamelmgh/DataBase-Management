<?php
/*
* This class is for managing tables in a data base   
*  We have CRUD for tables 
* 
*/
include("Column.php");
include("Connection.php");
class ManageDataBase{

 public function executeQuery($query){
    $connection = mysqli_connect("localhost","root","","PFM");
    $executeQuery = mysqli_query($connection, $query);
    if ($connection->query($query) === TRUE) {
        echo "Table MyGuests created successfully";
      } else {
        echo "Error creating table: " . $connection->error;
      }
      
    return $executeQuery;    
}
//CRUD : 
public function Afficher(){

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
    for ($i=0; $i < count($columns); $i++) {
        if($i != count($columns) -1) {
           
            $col .= " ".$columns[$i]->getNomColumn() . " " . $columns[$i]->getType() . ",";
           ;
        } else {
                $col .= " " .$columns[$i]->getNomColumn() . " " . $columns[$i]->getType() . ")";
                
        }
          
    }
    $query = "Create Table $tableName  $col";
  //  echo $query;
   // $this->executeQuery($query);
    //Create class that inherit from ManageTables 
     //Creating a file with the patrams name 
     echo "Tables/$tableName.php";
    $table =   fopen("Tables/$tableName.php","w") or die("Unable to create file");
    echo "<br>hi";
     echo "Tables/$tableName.php";
    $content = "<?php class $tableName extends ManageTables{}";
    fwrite($table,$content);

   
    fclose($table);




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

$manageDb = new ManageDataBase();

$c1 = new Column("id","INT");

$c2 = new Column("Name", "VARCHAR(255)");
$c3 = new Column("lastName", "VARCHAR(255)");
$columns = array($c1,$c2,$c3);

$manageDb->Ajouter("TableForTest",$columns);





?>