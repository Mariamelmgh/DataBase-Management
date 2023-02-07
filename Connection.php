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
        $executeQuery = mysqli_query($connection , $query);
        echo "connection";
        if ($connection ->query($query) === TRUE) {
            echo "Table MyGuests created successfully";
          } else {
            echo "Error creating table: " . $connection ->error;
          }

        return $executeQuery;

    }






    }


?>