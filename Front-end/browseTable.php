<?php  include "../Controllers/index.php";?>
<html>
<?php include "partielles/header.php";?>
    <body>
        <!-- ======= Header ======= -->
        <?php include "partielles/nav-bar.php";?>  
        <!-- ======= Sidebar ======= -->
        <?php include "partielles/side-bar.php";?>
   <?php
   $data = getAllData($_GET['tableName'],[]);
    
   
   ?>
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $_GET['tableName']?></h5>

              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="browse-tab" data-bs-toggle="tab" data-bs-target="#bordered-browse" type="button" role="tab" aria-controls="browse" aria-selected="true">Consulter</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="structure-tab" data-bs-toggle="tab" data-bs-target="#bordered-structure" type="button" role="tab" aria-controls="structure" aria-selected="false">Structure</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-sql" type="button" role="tab" aria-controls="sql" aria-selected="false">SQL</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-search" type="button" role="tab" aria-controls="search" aria-selected="false">Rechercher</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-insert" type="button" role="tab" aria-controls="insert" aria-selected="false">Insérer</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="borderedTabContent">
                <div class="tab-pane fade show active" id="bordered-browse" role="tabpanel" aria-labelledby="browse-tab">
                
                        <p>SELECT  <code>*</code> FROM  <?php echo $_GET['tableName']?> </p>
                          <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                <tr>  
                                    <th scope="col">#</th>
                                    <?php
                                        $colName = getAllCulomns($_GET['tableName']);
                                        for ($i=0; $i <count($colName); $i++) { 
                                            foreach ($colName[$i] as $key => $value) {
                                                if($key == "Field"){
                                                   echo "<th>$value</th>";

                                                }
                                             
                                            }
                                         
                                        }
                                
                                  
                                    ?>
                                  <th></th>
                               </tr>
                                </thead>
                                <tbody>
                                <?php
                                   
                                    for ($i=0; $i <count($data) ; $i++) { 
                                        echo "<tr>";
                                        echo " <th scope='row'>".$i +1 ."</th>";
                                        $clause="";
                                        $count = count($data[$i]);
                                        $j=0;

                                        foreach ($data[$i] as $key => $value) {
                                         // echo $colName[$j]["Type"];
                                          
                                          $j++; 
                                          
                                          if($count !=$j ){
                                           $clause .= "$key = %27" .$value ."%27 and ";
                                          }else if($count == $j){
                                            $clause .= "$key = %27" .$value."%27";
                                          } 
                                           echo "<td>".$value." </td>";
                                        
                                        } 
                                       //echo $clause;
                                //      $clause = $data[$i][""];
                                        echo 
                                        "<td>
                                                  
                                          <a href='deleteData.php?clause=$clause&tableName=".$_GET["tableName"]."'><i class='ri-delete-bin-7-fill'></i></a>
                                          
                                          
                                        </td>";
                                        
                                    }
                                ?>
                                     </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->

                            </div>
                    
            
           
               <div class="tab-pane fade" id="bordered-structure" role="tabpanel" aria-labelledby="structure-tab">
               
                <table class="table table-hover">
                                <thead>
                                <tr>  
                                    <th scope="col">#</th>
                                    <?php
                                        $tableName = $_GET['tableName'];
                                        $columns = getAllCulomns($tableName);
                                        foreach ($columns[0] as $key => $value) {
                                            echo "<th scope='col'> $key</th>";
                                        } 
                                        echo "<th>Action</th>";
                                    ?>   
                               </tr>
                                </thead>
                                <tbody>
                                <?php
                                  
                                        for ($i=0; $i < count($columns); $i++) { 
                                            echo "<tr>";
                                            echo "<td>". $i +1 ."</td>";
                                            foreach ($columns[$i] as $key => $value) {
                                                if($key == "Field" && $columns[$i]["Key"] == "PRI"){
                                                   echo "<td>$value &nbsp <i class=' ri-key-2-fill'></i></td>";         
                                                }else{
                                                    echo "<td>$value </td>";     
                                                }
                                            }
                                            $field = $columns[$i]["Field"];
                                            $type = $columns[$i]["Type"];
                                            $null = $columns[$i]["Null"]; 
                                            $key = $columns[$i]["Key"]; 
                                            $default = $columns[$i]["Default"]; 
                                            $extra = $columns[$i]["Extra"]; 
                                            echo "<td>
                                            <a href='http://localhost/PFM/Front-end/editColumn.php?tableName=$tableName&Field=$field&type=$type&null=$null&key=$key&default=$default&extra=$extra'><i class=' ri-edit-2-fill'></i></a>
                                            <a href='http://localhost/PFM/Front-end/dropColumn.php?tableName=$tableName&Field=$field&key=$key'><i class=' ri-chat-delete-fill'></i></a>
                                            <a href='#'><i class = ' ri-more-fill'></i></a>
                                            </td>";
                                        
                                            echo "</tr>";
                                        }
                                
                                
                                
                                ?>
                                     </tbody>
                            </table>                          
                               
                </div>
                <div class="tab-pane fade" id="bordered-sql" role="tabpanel" aria-labelledby="sql-tab">
               
                <form method="GET" action="executeQuery.php">
                       <h5 class="card-title">Exécuter des requêtes SQL sur la table  PFM.<?php echo $_GET['tableName']?> </h5>
                          <input type="text" name="tableName" value=<?php echo $_GET['tableName'];?> id="" hidden />
                         <textarea name="query"  class="quill-editor-full form-control" required>


                         </textarea>
                         
                        <br><br>
                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                      <button type="button" class="btn btn-outline-primary">Claire</button>
                     <button type="submit" class="btn btn-outline-primary">Executer</button>
              </div>
            </form>  
                                
              </div>
             
            
             
            <div class="tab-pane fade" id="bordered-search" role="tabpanel" aria-labelledby="search-tab">
                   <!-- Table with hoverable rows -->
                   <table class="table table-hover">
                      <thead>
                        <tr>  
                         <th scope="col">
                          <form action="executeQuery.php">
                          
                         <?php
                         
                           echo "   <button type='submit' class='btn btn-outline-primary'><i class=' ri-search-2-line'></i>&nbsp;&nbsp;&nbsp;Rechercher</button>";
                           echo "<input type='text' name='tableName' value='".$_GET["tableName"]."' hidden  />";               
  ?>

                          </th>
                            <?php
                              $colName = getAllCulomns($_GET['tableName']);
                               for ($i=0; $i <count($colName); $i++) { 
                               foreach ($colName[$i] as $key => $value) {
                                  if($key == "Field"){
                                    echo "<th><input type='text' name ='$value' class='form-control' /></th>";
                                  }
                                             
                                            }
                                         
                                        }
                                
                                  
                                    ?>
                              </form>
                               </tr>
                                <tr>  
                                    <th scope="col">#</th>
                                    <?php
                                        $colName = getAllCulomns($_GET['tableName']);
                                        for ($i=0; $i <count($colName); $i++) { 
                                            foreach ($colName[$i] as $key => $value) {
                                                if($key == "Field"){
                                                   echo "<th>$value</th>";

                                                }
                                             
                                            }
                                         
                                        }
                                
                                  
                                    ?>
                               </tr>
                                </thead>
                                <tbody>
                                <?php
                                   
                                    for ($i=0; $i <count($data) ; $i++) { 
                                        echo "<tr>";
                                        echo " <th scope='row'>".$i +1 ."</th>";
                                        foreach ($data[$i] as $key => $value) {
                                            echo "<td>".$value." </td>";
                                        }

                                     echo "</tr>";
                                    }
                                ?>
                                     </tbody>
                            </table>          </div>
                <div class="tab-pane fade" id="bordered-insert" role="tabpanel" aria-labelledby="insert-tab">
                <form method="GET">
                <table class="table table-striped">  
                    
                <thead>
                        <tr>
                            <th scope="col">Column</th>            
                            <th scope="col">Type</th>                
                            <th scope="col">Value</th>            

                       </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo "<input type='text' class='form-control' name='tableName' value='".$_GET["tableName"]."' hidde>";
                          for ($i=0; $i <count($colName); $i++) { 
                              echo "
                              <tr> 
                              <div class='row mb-3'>
                                <td><label for='inputText' class='col-sm-6 col-form-label'>".$colName[$i]["Field"] ."</label></td>
                                <td><label for='inputText' class='col-sm-6 col-form-label'>".$colName[$i]["Type"] ."</label></td>
                                <td><div class='col-sm-6'>
                                 <input type='text' class='form-control' name='".$colName[$i]["Field"]."' required>
                              
                                </div>
                                </td>
                            </div> 
                            </tr>
                            "; 
                         }          
                    ?>  
              
                    </tbody>                   
                   </table> 
                   
                   <button type='submit' class='btn btn-outline-success' name="insert-btn">Insérer</button>
                   </form>
                   <?php
                      if(isset($_GET["insert-btn"])){

                        $data = []; 
                        for ($i=0; $i <count($colName); $i++) { 
                          $data[$colName[$i]["Field"]] = "'" .$_GET[$colName[$i]["Field"]]."'";

                        } 
                        intertIntoTable($_GET["tableName"],$data,$colName);
                        echo"
                          <script>
                                window.location.href ='http://localhost/PFM/Front-end/browseTable.php?tableName=".$_GET["tableName"]."';

                          </script>";
                      }
                       
                   ?>
                </div>
              </div><!-- End Bordered Tabs -->

            </div>
              </di>


                 
                </div>
        </section>
    </main>
    <?php  include "partielles/footer.php";?>
    </body>
 
</html>