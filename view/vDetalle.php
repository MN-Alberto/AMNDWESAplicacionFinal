    
<header>
<h1><b>Aplicacion Final</b></h1>

    <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="volverForm">
        <button type="submit" name="cerrar" id="volver"></button>
    </form> 

</header>
<div class="mDetalle">
    <h1><b>Detalle</b></h1>
<?php

/*
 * Autor: Alberto Méndez 
 * Fecha de actualización: 18/12/2025
 */



    echo '<h2>Contenido de las variables globales $_SERVER, $_COOKIE, $_SESSION, $_REQUEST, $_GET, $_POST, $_FILES, $_ENV</h2>';
        
                echo '<h3>Contenido de la variable $_COOKIE</h3><br>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
            if (!empty($_COOKIE)) {
                foreach ($_COOKIE as $variable => $resultado) {
                    echo "<tr>";
                    echo '<td>$_COOKIE[' . $variable . ']</td>';
                    echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'><em>La variable \$_COOKIE está vacía.</em></td></tr>";
            }
        echo "</table>";
        
                
        echo '<h3>Contenido de la variable $_SESSION</h3><br>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
            if (!empty($_SESSION)) {
                foreach ($_SESSION as $variable => $resultado) {
                    echo "<tr>";
                    echo '<td>$_SESSION[' . $variable . ']</td>';
                    echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'><em>La variable \$_SESSION está vacía.</em></td></tr>";
            }
        echo "</table>";
        
        echo '<h3>Contenido de la variable $_SERVER</h3><br>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
            if (!empty($_SERVER)) {
                foreach ($_SERVER as $variable => $resultado) {
                    echo "<tr>";
                    echo '<td>$_SERVER[' . $variable . ']</td>';
                    echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'><em>La variable \$_SERVER está vacía.</em></td></tr>";
            }
        echo "</table>";
        
        
        
        echo '<h3>Contenido de la variable $_REQUEST</h3><br>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
            if (!empty($_REQUEST)) {
                foreach ($_REQUEST as $variable => $resultado) {
                    echo "<tr>";
                    echo '<td>$_REQUEST[' . $variable . ']</td>';
                    echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'><em>La variable \$_REQUEST está vacía.</em></td></tr>";
            }
        echo "</table>";
        
        
        echo '<h3>Contenido de la variable $_GET</h3><br>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
            if (!empty($_GET)) {
                foreach ($_GET as $variable => $resultado) {
                    echo "<tr>";
                    echo '<td>$_GET[' . $variable . ']</td>';
                    echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'><em>La variable \$_GET está vacía.</em></td></tr>";
            }
        echo "</table>";
        
        
        echo '<h3>Contenido de la variable $_POST</h3><br>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
            if (!empty($_POST)) {
                foreach ($_POST as $variable => $resultado) {
                    echo "<tr>";
                    echo '<td>$_POST[' . $variable . ']</td>';
                    echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'><em>La variable \$_POST está vacía.</em></td></tr>";
            }
        echo "</table>";
        
        
        echo '<h3>Contenido de la variable $_FILES</h3><br>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
            if (!empty($_FILES)) {
                foreach ($_FILES as $variable => $resultado) {
                    echo "<tr>";
                    echo '<td>$_FILES[' . $variable . ']</td>';
                    echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'><em>La variable \$_FILES está vacía.</em></td></tr>";
            }
        echo "</table>";
        
        
        echo '<h3>Contenido de la variable $_ENV</h3><br>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
            if (!empty($_ENV)) {
                foreach ($_ENV as $variable => $resultado) {
                    echo "<tr>";
                    echo '<td>$_ENV[' . $variable . ']</td>';
                    echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'><em>La variable \$_ENV está vacía.</em></td></tr>";
            }
        echo "</table>";
        ?>

        <iframe src='doc/phpInfo.php' style="width:100%; height:600px; border:none; margin-top:100px;"></iframe>
</div>