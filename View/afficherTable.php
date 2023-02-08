<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="Description" content="Stimulation du site PHPmyAdmin" />
    <meta name="author" content="Etudiants ENS" />
    <meta name="keywords" content="ENS,Developpement Web, PHP, PHPmyAdmin" />
    <link rel="icon" href="OIP.jpeg" alt="Logo">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">
    <title><?php echo $_REQUEST['name'];?></title>
</head>

<body>
<?php 
       // include "../Column.php";
        include "../Controllers/index.php";
       if ($_SERVER["REQUEST_METHOD"] == "GET") {
                 $columns = array();
                 if(isset($_GET['createTable'])){
                    for ($i=0; $i <$_GET["nbr"]; $i++) {
                        $isNull = false;
                        $isPrimary = false;
                        $a_i = false; 
                        if(isset($_REQUEST["null$i"])){
                            $isNull = true;
                           
                        }
                        if(isset($_REQUEST["a_i$i"])){
                          $a_i = true;
            
                        }
                        
                     if($_REQUEST["taille$i"] > 0){
                        $column = new Column($_REQUEST["tableName".$i], $_REQUEST["type".$i] .'('.$_REQUEST["taille$i"] .')',$a_i,$isNull,$_REQUEST["index$i"]);
                    }else{
                        $column = new Column($_REQUEST["tableName".$i], $_REQUEST["type".$i],$a_i,$isNull,$_REQUEST["index$i"]);
                    }  
                        array_push($columns,$column);
                    }
                   CreerTable($_REQUEST["name"],$columns);   
                   }
             
        }
        ?>
    <!--<aside><img src="OIP.jpeg"></aside>-->
    <form  method="GET">
    
    
    <div class="structure">
        Structure
    </div>
    
    <table class="table table-striped">
        <thead>
            <?php
             
            $columns = array();
                for ($i=0; $i < $_REQUEST['nbr'] ; $i++) {
                   echo "<th>".$_REQUEST["tableName$i"]."</th>";
                    if(!isset($_REQUEST["null$i"])){
                      $_REQUEST["null$i"] = false;
                    } if(!isset($_REQUEST["a_i$i"])){
                        $_REQUEST["a_i$i"] = false;
                      }
                    $col = new Column($_REQUEST["tableName$i"], $_REQUEST["type$i"],  $_REQUEST["a_i$i"],  $_REQUEST["null$i"], $_REQUEST["index$i"]);
            
                    array_push($columns,$col); 
                }
            ?>
        </thead>
        <tbody>
            <?php


           
             $data = getAllData($_REQUEST["name"], $columns);

          
            for ($i=0; $i < count($data); $i++) {
                echo "<tr>";
                foreach ($data[$i] as $key => $value){
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }   
            
            ?>
        </tbody>
    </tbody>

        </table>

</table>
        <footer>
        
    </form>
       
       

</body>

</html>