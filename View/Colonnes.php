<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="Description" content="Stimulation du site PHPmyAdmin" />
    <meta name="author" content="Etudiants ENS" />
    <meta name="keywords" content="ENS,Developpement Web, PHP, PHPmyAdmin" />
    <!-- <meta http-equiv="Refresh" content="0; url='http://localhost/pfm/View/afficherTable.php'" /> -->
    <link rel="icon" href="OIP.jpeg" alt="Logo">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">
    <title>Creer les colonnes</title>
</head>

<body>
    <!--<aside><img src="OIP.jpeg"></aside>-->
    <form  action="afficherTable.php" method="GET">
        <div class="form-row">
            Nom de table: 
            <input name="name" type="text" class="input-group-text" value = <?php echo  $_REQUEST['name']?> >  Ajouter
            <input name="nbr" type="number" class="input-group-text" value = <?php echo   $_REQUEST["nbr"]?> >colonne(s)

        </div>
       
    
    <div class="structure">
        Structure
    </div>
    
    <table class="table table-striped">
        <thead class="thead">
            <th>Nom
            <th>Type
            <th>Taille/Valeurs
            <th>Défaut
            <th>Collation
            <th>Attributs
            <th>Null
            <th>Index
            <th>A_I
            <th>Commentaires
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < $_REQUEST["nbr"]; $i++) {
                echo '<tr>
                <td>
               <input name="tableName'.$i.'" type="text" class="form-control">
            </td>
                <td>
                    <select class="form-control" name="type'.$i.'">
                        <option>INT</option>
                        <option>VARCHAR</option>
                        <option>DATE</option>
                        <option>TEXT</option>
                    </select>
                </td>
                <td>
            <input name="taille'.$i.'" type="text" class="form-control">
            <td>
                <select class="form-control">
                    <option>None</option>
                    <option>As defined</option>
                    <option>NULL</option>
                    <option>CURRENT_TIMESTAMP</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="collation'.$i.'">
                    <option></option>
                    <optgroup label="armissi">
                        <option>armissi8 bin</option>
                        <option>armissi8</option>
                        <option>armissi8</option>
                        <option>armissi8</option>
                    </optgroup>
                    <optgroup label="ascii">
                        <option>ascii_bin</option>
                    </optgroup>
                </select>
            </td>
            <td>
                <select class="form-control name="attributs'.$i.'"">
                    <option> </option>
                    <option>BINARY</option>
                    <option>UNSIGNED</option>
                    <option>UNSIGNED ZEROFILL</option>
                    <option>on update CURRENT_TIMESTAMP</option>
                </select>
            </td>
            <td><input type="checkbox" name="null'.$i.'" /></td>
            <td><select class="form-control" name="index'.$i.'" id="index'.$i.'" >
                    <option value="">--</option>
                    <option value="PRIMARY KEY">PRIMARY</option>
                    <option value="UNIQUE">UNIQUE</option>
                    <option value="INDEX">INDEX</option>
                    <option value="FULLTEXT">FULLTEXT</option>
                    <option value="SPATIAL">SPATIAL</option>
                </select>
            </td>
            <td>
                <input name="a_i'.$i.'"type="checkbox" onclick="setPrimary('.$i.')">
            </td>
            <td> <input name="commentaire'.$i.'" type="text" class="form-control"></td></tr>';}?>
        </tbody>
        </table>
        <footer>
        <button class="btn btn-outline-secondary">Appercu SQL</button>
        <input name="createTable" type="submit" class="btn btn-outline-secondary"/>
    </form>
      
</body>
<?php
echo '
    <script>
        function setPrimary(i){

            const select = document.querySelector("#index"+i);
            select.value = "PRIMARY";
            console.log(select.value);
        }
            
    </script>
    ';

?>

</html>