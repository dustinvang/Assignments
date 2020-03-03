<?php
      echo "<table width=300px cellspacing=1px cellpadding=1px border=1px>";
      for($row=1; $row<=$_GET["size"]; $row++){
          echo "<tr>";
          for($col=1; $col<=$_GET["size"]; $col++){

            $total = $row + $col;
            
            if($total % 2 == 0){
                  echo "<td height=35px width=35px bgcolor=red></td>";
            }else{
                  echo "<td height=35px width=35px bgcolor=black></td>";
            }
          }
          echo "</tr>";
    }
    echo "</table>";
?>