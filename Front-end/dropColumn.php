<?php  include "../Controllers/index.php";?>
<?php
    



    Column::Suprimer($_GET['Field'],$_GET["tableName"]);

echo"
    <html>
        <body>  
            <script>
            window.location.href = 'http://localhost/PFM/Front-end/browseTable.php?tableName=".$_GET["tableName"]."';

            </script>
        </body>
    </html>
";
?>