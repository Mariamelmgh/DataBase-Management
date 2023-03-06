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
                <h5 class="card-title">Nouvelle Tableau : </h5>
            <form method = "GET">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nom de Tableaux</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tableName" required 
                    value= 
                    <?php
                      if(isset($_GET["tableName"])){
                            echo $_GET["tableName"];
                        }
                    ?>
                    >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Nombre des colonnes </label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control"  name="nbColumns" required
                    value= 
                    <?php
                    
                        if(isset($_GET["nbColumns"])){
                            echo $_GET["nbColumns"];
                        }
                      
                    ?>>
                  </div>
                  <div class="row mb-3">
                  
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Go</button>
                  </div>
                </div>
        </div>
    </form>

    </div></div></div></div>

<!-- adding columns for table-->
<?php  


    if(isset($_GET["tableName"]) && isset($_GET["nbColumns"])){
        $tableName = $_GET["tableName"];
        $colNumber = $_GET["nbColumns"];
        echo " <section class='section'>
        <div class='row'>
          <div class='col-lg-12'>
  
            <div class='card'>
              <div class='ard-body'>
                  <h5 class='card-title'>Strecture</h5>
              <form method = 'GET' action='allTables.php'>
              <input type='text' name='tableName' value = $tableName hidden />
              <input type='text' name='nbColumns' value = $colNumber hidden />
              <table class='table'>
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
              ";
        for ($i=0; $i <$_GET["nbColumns"] ; $i++) { 
            echo "<tr>
                    <td name='name_$i'> 
                    <input type='text' class='form-control' name='colName_$i' required>
                    </td>
                    <td name='type_$i'> 
                        <select id='inputState' class='form-select' name ='colType_$i'>
                            <option selected>INT</option>
                            <option>VARCHAR</option>
                            <option>TEXT</option>
                            <option>DATE</option>
                        </select>
                    </td>
                    <td name='length_$i'> 
                    <input type='text' class='form-control' name='colLength_$i' required>
                    </td>
                    <td name='default_$i'> 
                    
                        <select id='inputState' class='form-select' name ='colDefault_$i'>
                            <option selected>NONE</option>
                            <option>As defined</option>
                            <option>Null</option>
                            <option>La date current</option>
                         </select>
                    </td>
                    <td name='null_$i'> 
                    <input class='form-check-input' type='checkbox' name='colNull_$i' id='gridCheck'>
                    </td>
                    <td name='index_$i'> 
                        <select id='inputState' class='form-select' name ='colIndex_$i'>
                        <option selected>------</option>
                        <option value = 'PRIMARY KEY'>PRIMARY</option>
                        <option>UNIQUE</option>
                        <option>INDEX</option>
                        <option>FULL TEXT</option>
                        <option>SPARTAL</option>
                     </select>
                    </td>
                    <td name = 'a_i_$i'>
                    <input class='form-check-input' type='checkbox' name='colA_i_$i' id='gridCheck'>
                    </td>
                </tr>";
        }

        echo "</tbody></table>
        <div class='col-sm-10'>
        <button type='submit' class='btn btn-primary'>Enregistrer</button>
      </div>
        </form></div></div></div></div>";


    }
   



?>  
</main>
<?php  include "partielles/footer.php";?>
 
</body>

</html>