<?php  include "../Controllers/index.php";?>
<?php
dropTable($_GET["tableName"]);
echo"
    <html>
        <body>  
            <script>
            window.location.href = 'http://localhost/PFM/Front-end/allTables.php';

            </script>
        </body>
    </html>
";
?>