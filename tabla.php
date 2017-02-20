<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8"/>
    <body>
        
        <?php
            $a = true;
            $b = false;
        ?>
        <h1>Tabla PHP</h1>
        <table border="1">
            <tr>
                <td>Primero</td><td>Segundo</td><td>Operador</td><td>Resultado</td>
            </tr>
            <tr>
                <td><?php echo (int)$a; ?></td><td><?php echo (int)$a; ?></td><td>&&</td><td><?php echo (int)((int)$a && (int)$a) ?></td>
            </tr>
            <tr>
                <td><?php echo (int)$a; ?></td><td><?php echo (int)$b; ?></td><td>&&</td><td><?php echo (int)((int)$a && (int)$b) ?></td>
            </tr>
            <tr>
                <td><?php echo (int)$b; ?></td><td><?php echo (int)$a; ?></td><td>&&</td><td><?php echo (int)((int)$b && (int)$a) ?></td>
            </tr>
            <tr>
                <td><?php echo (int)$b; ?></td><td><?php echo (int)$b; ?></td><td>&&</td><td><?php echo (int)((int)$b && (int)$b) ?></td>
            </tr>
        </table>

        <p><?php var_dump($a); ?></p>
        <p><?php var_dump($b); ?></p>
        <p><?php var_dump((int)$a); ?></p>
        <p><?php var_dump((int)$b); ?></p>


        <?php 
            $table = "<table border=1>";
            for ($x=0; $x<5; $x++) {
            $table .= "<tr>";
                for ($y=0; $y<4; $y++) {
                    $table .= "<td>";
                    if ($x==0) {
                        if ($y==0) {
                            $table .= "Primero";
                        } else if ($y==1) {
                            $table .= "Segundo";
                        }  else if ($y==2) {
                            $table .= "Operador";
                        }  else if ($y==3) {
                            $table .= "Resultado";
                        }
                    } elseif ($x==1) {
                        if ($y==0) {
                            $table .= "1";
                        } else if ($y==1) {
                            $table .= "1";
                        }  else if ($y==2) {
                            $table .= "&&";
                        }  else if ($y==3) {
                            $table .= (int)(1&&1);
                        }
                    } elseif ($x==2) {
                        if ($y==0) {
                            $table .= "1";
                        } else if ($y==1) {
                            $table .= "0";
                        }  else if ($y==2) {
                            $table .= "&&";
                        }  else if ($y==3) {
                            $table .= (int)(1&&0);
                        }
                    } elseif ($x==3) {
                        if ($y==0) {
                            $table .= "0";
                        } else if ($y==1) {
                            $table .= "1";
                        }  else if ($y==2) {
                            $table .= "&&";
                        }  else if ($y==3) {
                            $table .= (int)(0&&1);
                        }
                    } elseif ($x==4) {
                        if ($y==0) {
                            $table .= "0";
                        } else if ($y==1) {
                            $table .= "0";
                        }  else if ($y==2) {
                            $table .= "&&";
                        }  else if ($y==3) {
                            $table .= (int)(0&&0);
                        }
                    }
                    $table .= "</td>";
                }
                $table .= "</tr>";
            }
            $table .= "</table>";
            echo $table . "<br /><br /><br />";

        ?>

        <?php

            $c1 = [1, 1, 0, 0];
            $c2 = [1, 0, 1, 0];

            $table = "<table border=1>";
            $table .= "<tr><td>Primero</td>";
            $table .= "<td>Segundo</td>";
            $table .= "<td>Operador</td>";
            $table .= "<td>Resultado</td></tr>";

            foreach ($c1 as $v) {
                $table .= "<tr><td>$v</td></tr>";
            }

            foreach ($c2 as $v) {
                $table .= "<tr><td>$v</td></tr>";
            }

            $table .= "</td>";
            $table .= "</table>";
            echo $table;

        ?>
        
    </body>
</html>