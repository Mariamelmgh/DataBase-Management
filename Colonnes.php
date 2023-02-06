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
    <title>Creer les colonnes</title>
</head>

<body>
    <!--<aside><img src="OIP.jpeg"></aside>-->
    <form action="" method="POST">
        <div class="form-row">
            Nom de table: <input type="text" class="input-group-text"> Ajouter
            <input name="nbr" type="number" class="input-group-text"> colonne(s)
        </div>
        <?php
        if (isset($_POST['go'])) {
            $nb_ligne = $_POST['nbr'];
            echo $nb_ligne;
        }
        ?>
    </form>
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
            for ($i = 0; $i < $nb_ligne; $i++) {
                echo '<tr>
                <td>
            <input type="text" class="form-control">
            </td>
                <td>
                    <select class="form-control">
                        <option>INT</option>
                        <option>VARCHAR</option>
                        <option>DATE</option>
                        <option>TEXT</option>
                    </select>
                </td>
                <td>
            <input type="text" class="form-control">
            <td>
                <select class="form-control">
                    <option>None</option>
                    <option>As defined</option>
                    <option>NULL</option>
                    <option>CURRENT_TIMESTAMP</option>
                </select>
            </td>
            <td>
                <select class="form-control">
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
                <select class="form-control">
                    <option> </option>
                    <option>BINARY</option>
                    <option>UNSIGNED</option>
                    <option>UNSIGNED ZEROFILL</option>
                    <option>on update CURRENT_TIMESTAMP</option>
                </select>
            </td>
            <td><input type="checkbox"></td>
            <td><select class="form-control">
                    <option>--</option>
                    <option>PRIMARY</option>
                    <option>UNIQUE</option>
                    <option>INDEX</option>
                    <option>FULLTEXT</option>
                    <option>SPATIAL</option>
                </select>
            </td>
            <td>
                <input type="checkbox">
            </td>
            <td> <input type="text" class="form-control"></td>
            </tr>';
            }
            ?>
        </tbody>
    </table>
    <footer>
        <button class="btn btn-outline-secondary">Appercu SQL</button>
        <button class="btn btn-outline-secondary">Enregistrer</button>
    </footer>
</body>

</html>