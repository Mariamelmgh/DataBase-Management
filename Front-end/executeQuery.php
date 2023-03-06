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

                                <?php
                                
                                    if(isset($_GET["query"])){
                                       $data =  Connection::executeQuery($_GET["query"]);
                                       $result = [];
                                       $allData =  Connection::executeQuery("SELECT * FROM ". $_GET["tableName"]);
                                        if($data != null){
                                            $allData = $data;
                                       }
                                      // $allData =  Connection::executeQuery("SELECT * FROM ". $_GET["tableName"]);
                                //        while($row = $allData->fetch_assoc()){
                                //         $result[] = $row;
                                //       }
                                //       if(count($result) == 0){
                                            
                                //         echo "<br>  <div class='alert alert-danger bg-danger text-light border-0 alert-dismissible fade show' role='alert'>
                                //                 Query executed with 0 rows in return;
                                //         <button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button>
                                //        </div>";
                                        
                                //         return;
                                  
                                //   }
                                    
                                       
                                     
                                    }else{
                                        $colName = getAllCulomns($_GET['tableName']);
                                        $condetion = "";
                                        $query = "select * from " . $_GET['tableName'];
                                        for ($i=0; $i <count($colName); $i++) { 
                                            foreach ($colName[$i] as $key => $value) {
                                                 if($key == "Field"){
                                                     if($_GET[$value] !="" && $condetion== ""){
                                                       $condetion .= " where $value like  '%".$_GET[$value]."%'";
                                                    }elseif ($_GET[$value] !=""){
                                                        $condetion .= " and  $value like  '%".$_GET[$value]."%'";
                                                    }
                                                }
                                                          
                                            }
                                                      
                                        }
                                        $query .=  $condetion;
                                       $allData =  Connection::executeQuery($query);
                                       $result = array();
                                       
                                        


                                    }
                                   if(is_bool($allData)){
                                        echo"
                                            <html>
                                                <body>  
                                                    <script>
                                                    window.location.href = 'http://localhost/PFM/Front-end/browseTable.php?tableName=". $_GET['tableName']."';

                                                    </script>
                                                </body>
                                            </html>
                                        ";

                                    }else{
                                        while($row = $allData->fetch_assoc()){
                                            $result[] = $row;
                                          }
                                          
                                        if(count($result) == 0){
                                            
                                            echo "<br>  <div class='alert alert-danger bg-danger text-light border-0 alert-dismissible fade show' role='alert'>
                                                    Query executed with 0 rows in return;
                                            <button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button>
                                           </div>";
                                            
                                            return;
                                      
                                      }
                                    }
                                   
                        
                                ?>
                                <table class="table table-hover">
                                <thead>
                                <tr>  
                                    <th scope="col">#</th>
                                    <?php
                                        
                                           foreach ($result[0] as $key => $value) {
                                          
                                                echo "<th scope='col'>".$key ."</th>";
                                           }
                                        
                                    ?>
                               </tr>
                                </thead>
                                <tbody>
                                <?php
                                   
                                   for ($i=0; $i <count($result) ; $i++) { 
                                       echo "<tr>";
                                       echo " <th scope='row'>".$i +1 ."</th>";
                                       foreach ($result[$i] as $key => $value) {
                                           echo "<td>".$value." </td>";
                                       }
                                       
                                    echo "</tr>";
                                   }
                               ?>
                               
                                </tbody>
                            </table>
                            </div>
                            </div>
                     </div>
                    </div>
                </section>
             </main>
                        
             <?php  include "partielles/footer.php";?>                        
    </body>
</html>