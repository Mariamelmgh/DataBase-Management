<?php
/**
 * This class provides connection with a real time database 
 * Also execute queries sent by all other classes
 */
    class Connection{
    
    public static function getConnection(){
     
       $connection = mysqli_connect("localhost","root","","PFM");
      
        return $connection;
    }

    public static  function executeQuery($query){
   
        $connection = self::getConnection();
        try{
          $executeQuery = mysqli_query($connection , $query);
  
         
          return $executeQuery;
        }catch(Exception $exception){
         echo "<br>  <div class='alert alert-danger bg-danger text-light border-0 alert-dismissible fade show' role='alert'>
         ". $exception->getMessage() ."
         <button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
          return null;
        }
       

        // if ($res = $connection ->query($query) === false) {
        //   echo "Error : " . $connection ->error;
        //   }else{
        //       print_r($res);
        //       echo "hi";
        //   }
         // echo $;
                 //   $connection->close();
        //return $res;
    }

    public static function getAllTables(){
      $connection = self::getConnection();
      $tables = mysqli_query($connection,"show tables from PFM"); 
    

      return $tables;


    }

    // public static function getAllColumns($tableName){
    //   $connection = self::getConnection();
    //   $data = mysqli_query($connection,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'PFM' AND TABLE_NAME = '$tableName'");
    //   while($row = $data->fetch_assoc()){
    //     $result[] = $row;
    // }
    
    // Array of all column names
    // $columnArr = array_column($result, 'COLUMN_NAME');
    // return $columnArr;
    
    // }

    public static function getAllColumns($tableName){

      $connection = self::getConnection();
   
      $primaryKeys = mysqli_query($connection, "SHOW COLUMNS FROM $tableName");
    $result = null;
    while($row = $primaryKeys->fetch_assoc()){
      $result[] = $row;
    }
    return $result;
  
    }
}


?>