<html>
    <?php include "partielles/header.php";?>
    <?php  include "../Controllers/index.php";?>
    <?php
    //Script to adda new table 
     //Check if culamns are filled by the correspond data
    if(isset($_GET['tableName']) && isset($_GET['nbColumns'])){
        $columns = array();
            for ($i=0; $i < $_GET["nbColumns"]; $i++) { 
              
                $isNull = isset($_GET["colNull_$i"]);
                $a_i = isset($_GET["colA_i_$i"]);
                if(isset($_GET["colLength_$i"]) && $_GET["colLength_$i"] > 0){
                    $col = new Column($_GET["colName_$i"],$_GET["colType_$i"] . "(" . $_GET["colLength_$i"] . ")",$a_i,$isNull,$_GET["colIndex_$i"]);     
                }else{
                    $col = new Column($_GET["colName_$i"],$_GET["colType_$i"] ,$a_i,$isNull,$_GET["colIndex_$i"]);     
                }
           
               $columns[$i] = $col;
            }

        echo $_GET['tableName'];
        CreerTable($_GET['tableName'],$columns);

    }
    //
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        //$columns = array(array( ,$_GET['newType'] ."(" . $_GET['newSize'] .")",null));
        
       if(isset($_GET["newName"]) && isset($_GET["newSize"]) && isset($_GET["newDefault"]) && isset( $_GET['newType']) ){

            Column::Changer($_GET["oldName"],$_GET["newName"],$_GET["tableName"],$_GET["newType"] ."(" .$_GET["newSize"] .")");
       
       }
        
     }  
    
    
    
    ?>
    <body>
        <!-- side bare start-->
        <?php  include "partielles/nav-bar.php";?>  
        <?php  include "partielles/side-bar.php";?>
        
     
        <!-- side bare end-->
        <main id="main" class="main">
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                            <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th cope="col"> Action</th>
                                        <th cope="col"> </th>
                                        <th cope="col"> </th>
                                      
                                        <th scope="col">Type</th>
                                        <th cope="col">Collation</th>
                                        <th scope="col">Size</th>
                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $data = getAllTables();
                                        while($table = mysqli_fetch_array($data)) { 
                                             echo "<tr>
                                                     <td>". $table[0]."</td>     
                                                     <td>
                                                         <a href='http://localhost/PFM/Front-end/browseTable.php?tableName=".$table[0]."'>
                                                             <i class='ri-file-text-line'></i>
                                                             Consulter
                                                         </a>
                                                        
                                                    </td>
                                                   
                                                    <td>
                                                    <a href='http://localhost/PFM/Front-end/emptyTable.php?tableName=".$table[0]."'>                                                             <i class='ri-file-2-line'></i>
                                                             Vider
                                                         </a>
                                                    </td>
                                                    <td>
                                                    <a href='http://localhost/PFM/Front-end/dropTable.php?tableName=".$table[0]."'>          
                                                             <i class='ri-delete-bin-7-fill'></i>
                                                             Suprimer
                                                         </a>
                                                       
                                                         </td>  

                                                     <td>InnoDB</td>  
                                                     <td>utf8mb4_general_ci</td>   
                                                     <td>0 MB</td>                                     
                                              </tr>";
                                        }
                                      
                                    ?>
                                    </tbody>
                                    
                            </table>  
                            </div>
                         </div> 
                    </div>   
                </div>        
                <?php  include "partielles/footer.php";?>
    </body>
  
</html>