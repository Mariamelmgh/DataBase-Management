<?php  include "../Controllers/index.php";?>
<?php
//echo $_GET["clause"];
deleteData($_GET["tableName"],[],$_GET["clause"]);
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