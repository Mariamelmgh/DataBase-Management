<html>
<?php include "partielles/header.php";?>
<?php  include "../Controllers/index.php";?>

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
                                <h5 class="card-title">Structure</h5>
                                    <form method = "GET" action ="allTables.php">   
                                      <table class="table table-hover">
                                        <thead>
                                          <tr>  
                                           
                                            <th scope='col'>Nom</th>
                                            <th scope='col'>Type</th>
                                            <th scope='col'>Long</th>
                                            <th scope='col'>Par Default</th>
                                            <th scope='col'>Null</th>
                                            <th scope='col'>Index</th>
                                            <th scope='col'>A_I</th>
                                         </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <?php

                                                $types = ['int','varchar','text','date'];
                                                $indexs = ['------','PRIMARY','UNIQUE','INDEX','FULL TEXT','SPARTAL'];
                                                $newDefault =  ['None','comme défenir','null','date current'];
                                                if(isset($_GET['type']) && isset($_GET["tableName"])){

                                                    $oldTye = $_GET['type'];
                                                    $oldDefault = $_GET['default'];
                                                    $oldIndex = $_GET["key"];
                                                    $checked = "";  
                                                    $tableName = $_GET["tableName"];
                                                    $null = $_GET["null"];
                                                    $field = $_GET["Field"];
                                                    if($null == 'YES'){
                                                       $checked = "checked";     
                                                    }
                                                }
                                                echo "<input type='text' value='$field' name='oldName' hidden />";
                                                echo "<input type='text' value='$tableName'  name='tableName' hidden />";
                                                
                                               
                                                $column = new Column($_GET['Field'],$oldTye,null,$null,$_GET["key"]);
                                                echo "<td><input type='text' class='form-control' name='newName' value='". $field ."' required></td>";    
                                                echo "<td name='newType'>";
                                                echo  "<select id='inputState' class='form-select' name ='newType'>"  ;          
                                                for ($i=0; $i <count($types) ; $i++) { 
                                                    if($types[$i] == explode('(',$oldTye)[0]){
                                                        echo "<option selected>" . $types[$i]  ."</option>";
                                                    }else{
                                                        echo "<option >" . $types[$i]  ."</option>";
                                                    }
                                                }
                                              
                                                echo "</select>";
                                                echo "</td>";
                                                echo "<td><input type='number' class='form-control' name='newSize' value='".  explode(')', explode('(',$oldTye)[1])[0]."' required /></td>";                    
                                                echo "<td name='default'>";
                                                echo  "<select id='inputState' class='form-select' name ='newDefault' required >"  ;          
                                                for ($i=0; $i <count($newDefault) ; $i++) { 
                                                    if($newDefault[$i] == $oldDefault){
                                                        echo "<option selected>" . $newDefault[$i]  ."</option>";
                                                    }else{
                                                        echo "<option>" . $newDefault[$i]  ."</option>";
                                                    }
                                                }
                                                echo "</select>";
                                                echo "</td>";
                                            
                                                echo "<td><input class='form-check-input' type='checkbox' name='newNull' id='gridCheck' $checked  /></td>";  
                                                
                                            
                                                echo "<td name='newIndex'>";
                                                    echo  "<select id='inputState' class='form-select' name ='newIndex'  required >"  ;          
                                                    for ($i=0; $i <count($indexs) ; $i++) { 
                                                        if($indexs[$i] == $oldIndex){
                                                            echo "<option selected>" . $indexs[$i]  ."</option>";
                                                        }else{
                                                            echo "<option >" . $indexs[$i]  ."</option>";
                                                        }
                                                    }
                                                
                                                    echo "</select>";
                                                echo "</td>";
                                                echo "<td name = 'a_ii'>";
                                                echo "<input class='form-check-input' type='checkbox' name='newA_i' id='gridCheck'>";
                                                echo  "</td>";
                                            
                                            ?>
                                          </tr>
                                        </tbody>
                                     </table>   
                                     <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i>&nbsp;&nbsp;Enregistrer</button>
                                    </form>
                                    
                             </div>
                        </div>
                    </div>  
                </div>
                 </section>                
            </main>     
            <?php  include "partielles/footer.php";?>                   
    </body> 
</html>