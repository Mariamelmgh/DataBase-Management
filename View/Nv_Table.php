<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="Description" content="Stimulation du site PHPmyAdmin" />
    <meta name="author" content="Etudiants ENS" />
    <meta name="keywords" content="ENS,Developpement Web, PHP, PHPmyAdmin" />
    <link rel="icon" href="OIP.jpeg" alt="Logo">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Style1.css">
    <title>Creer une nouvelle table</title>
</head>

<body>

    <form action="Colonnes.php" method="GET" class="border border-dark">
        <div class="titre">
            <span class="border border-dark" size="20px">
                <img src="logistic.png" width="30px" alt="liste">
                Créer une nouvelle table
            </span>
        </div>
        <div class="form-row">
            Nom de table: <input name="name" type="text" class="input-group-text"> Ajouter
            <input name="nbr" type="number" class="input-group-text"> colonne(s)
        </div>
        <input type="submit" value="Exécuter" name="go" class="btn btn-outline-secondary">
</body>

</html>