<?php
include "../ManageDataBase.php";

 function CreerTable($tableName,$columns){
    echo "hi index";
    $controller = new ManageDataBase();
    
    $controller -> Ajouter($tableName,$columns);

}

























?>
