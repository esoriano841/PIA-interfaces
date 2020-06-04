<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina web Interfases</title>
    <link rel="shortcut icon" href="images/evora.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="Css/estilos.css">
    <link rel="stylesheet" href="Css/tabla.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <?php include("nav_in.php");?>
        </nav>
        <section class="textos-header">
            <h1>Facultad de Ingeniería Mecánica y Eléctrica</h1>
            <h2>Busqueda de Ingenieros para la carrera de IMTC</h2>
            <h2>Lista de Materias</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C250.27,115.95 238.42,114.95 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgb(255, 255, 255);"></path></svg></div>
    </header>

<div id="main-container">
    <table>
        <thead>
            <tr>
                <th>Semestre</th><th>Materia</th><th>Ingenieros que la imparten</th>
            </tr>
        </thead>
        <?php 
            $sql = mysqli_query($con, 
            "SELECT
                nombre_materia,
                semestre,
                nombre_maestro, apellido_paterno, apellido_materno
            FROM hora_salon 
            INNER JOIN materia
            ON id_materia = idmateria
            INNER JOIN maestro
            ON id_maestro = idmaestro order by semestre");
            if(mysqli_num_rows($sql) == 0){
                echo '<tr><td colspan="8">No hay datos.</td></tr>';
            }else{
                while($row = mysqli_fetch_assoc($sql)){
                    echo '
                    <tr>
                        <td>'.$row['semestre'].'</td>
                        <td>'.$row['nombre_materia'].'</td>
                        <td>'.$row['nombre_maestro'].' '.$row['apellido_paterno'].' '.$row['apellido_materno'].'</td>
                    </tr>
                    ';
                }
            }
        ?>
        <!-- <tr>
            <td>Adquisición de Datos</td><td>6to</td><td>Adquisición de variables analogas mediante el <br> desarrollo de circuitos impresos, el contenido de la <br> materia puede variar dependiendo el ingeniero</td><td>M.C. Antonio Cayetano Lozano <br> M.I.A. Ruben Abisai Campos</td>
            
        </tr>
        <tr>
            <td>Arquitectura de Robots</td><td>7mo</td><td>Analisis de movimientos en robots, <br> sus grados de libertad y la <br> dinamica que éstos poseen</td><td>Dr. René Galindo Orozco <br>Dr. Oscar Salvados Salas <br>Dr. Francisco López Guerrero</td>
            
        </tr>
        <tr>
            <td>Biomecanica</td><td>7mo</td><td>Analisis de las propiedades mecanicas <br> de distintas protesis, <br> así como su historia e importancia</td><td>M.C. Yadira Moreno <br>Dr. Francisco Ramirez <br>M.C. Eric Perez Lorea</td>
            
        </tr> -->
    </table>
    <br>
    <br>
    <br>
</div>