<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8"/>
    <style>
    @font-face { font-family: monospace; font-stretch: ultra-expanded;}
    </style>
    <body>
      <?php
        
        $n = 10;

        echo("<h2>Cuadrado</h2>");

        for ($i=0; $i<$n; $i++) {
          for ($j=0; $j<$n; $j++) {
            echo "* ";
          }
          echo "<br />";
        }


        echo("<h2>Triangulo 1</h2>");

        for ($i=$n; $i>0; $i--) {
          for ($j=0; $i>$j; $j++) {
            echo "* ";
          }
          echo "<br />";
        }


        echo("<h2>Triangulo 2</h2>");

        $n2 = -$n;

        for ($i=0; $i<(2*$n); $i++) {
          for ($j=0; $j<$n-abs($n2); $j++) {
            echo "* ";
          }
          $n2++;
          echo "<br />";
        }
        

      ?>
    </body>
</html>
