<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8"/>
    <body>
      <?php

        // Hacer tabla de multiplicar respecto a un número
        
        $m = 7;
        $n = 12;

        echo("<h1>Tabla del " . $m . "</h1>");

        for ($i=0; $i<=$n; $i++) {
          echo($m . " por " . $i . " es igual a <strong>" . $m * $i . "</strong><br />");
        }



      ?>
    </body>
</html>