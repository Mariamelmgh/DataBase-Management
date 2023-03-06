<aside id="sidebar" class="sidebar">
<ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
           <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class=" ri-database-2-line"></i><span>Base de données</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Nouvelle base de données</span>
            </a>
          </li>
          <li>
            <a href="allTables.php">
              <i class="bi bi-circle">
              </i><span>PFM</span>
            </a>
            <ul>
               <a href="newTable.php"><li>Nouveaux tableau</li></a>
                <?php
                    $data = getAllTables();
                    
                   while($table = mysqli_fetch_array($data)) { 
                     echo " <a href='browseTable.php?tableName=".$table[0]."'><li>". $table[0]."</li></a>";
                    }
                ?>
            </ul>
         </li>
      </a>  
    
   </ul> 
</aside>