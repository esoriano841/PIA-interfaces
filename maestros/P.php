<?php
    include("../conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina web Interfases</title>
    <link rel="shortcut icon" href="../images/evora.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="../Css/estilos.css">
    <link rel="stylesheet" href="../Css/tabla.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <?php include("../nav.php");?>
        </nav>
        <section class="textos-header">
            <h1>Facultad de Ingeniería Mecánica y Eléctrica</h1>
            <h2>Busqueda de Ingenieros para la carrera de IMTC</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C250.27,115.95 238.42,114.95 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgb(255, 255, 255);"></path></svg></div>
    </header>
    <main>
        <section class="contenido-textos">
            <h1>Maestros con la inicial P</h1>
        </section>
        <div id="main-container">
            <table>
                <thead>
                    <tr>
                        <th>Maestro</th><th>Materia</th><th>Hora</th><th>Frecuencia</th><th>Salón</th>
                    </tr>
                </thead>
                <?php 
                    $sql = mysqli_query($con, 
                    "SELECT
                        nombre_maestro, apellido_paterno, apellido_materno,
                        nombre_materia,
                        hora,
                        frecuencia,
                        salon
                
                    FROM hora_salon 
                    INNER JOIN materia
                    ON id_materia = idmateria
                    INNER JOIN maestro
                    ON id_maestro = idmaestro where nombre_maestro LIKE  'P%'
                    ORDER BY nombre_maestro");

                    if(mysqli_num_rows($sql) == 0){
                        echo '<tr><td colspan="8">No hay datos.</td></tr>';
                    }else{
                        while($row = mysqli_fetch_assoc($sql)){
                            echo '
                            <tr>
                                <td>'.$row['nombre_maestro'].' '.$row['apellido_paterno'].' '.$row['apellido_materno'].'</td>
                                <td>'.$row['nombre_materia'].'</td>
                                <td>'.$row['hora'].'</td>
                                <td>'.$row['frecuencia'].'</td>
                                <td>'.$row['salon'].'</td>
                            </tr>
                            ';
                        }
                    }
                ?>
            </table>
            <br>
            <br>
            <br>
        </div>