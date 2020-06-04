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
    <link rel="stylesheet" href="Css/estilosugerencia.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <script>
        // function comentario(){
        //     var name= document.getElementById('NAM').value;
        //     var suge= document.getElementById("SUG").value;
        //     var mensaje= "nombre: "+name+"\n"+"Comentario: "+suge;
        //     alert(mensaje);

        // }
    </script>
    <header>
        <nav>
            <?php include("nav_in.php");?>
        </nav>
        <section class="textos-header">
            <h1>Facultad de Ingeniería Mecánica y Eléctrica</h1>
            <h2>Busqueda de Ingenieros para la carrera de IMTC</h2>
            <h2>Sugerencias</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C250.27,115.95 238.42,114.95 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgb(255, 255, 255);"></path></svg>
        </div>
    </header>
    <main>
    <?php
	    if(isset($_POST['add'])){
		    $nombre		     = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
			$sugerencia		 = mysqli_real_escape_string($con,(strip_tags($_POST["sugerencia"],ENT_QUOTES)));//Escanpando caracteres 
        
            $insert = mysqli_query($con, "INSERT INTO sugerencia(nombre, sugerencia)
			    						VALUES('$nombre', '$sugerencia')") or die(mysqli_error());
			    if($insert){
                    //echo '<div class="alert alert-success">Bien hecho! Los datos han sido guardados con éxito.</div>';
                    echo'<script type="text/javascript"> 
                         alert("Bien hecho! Gracias por tus comentarios :D");
                         </script>';
				}else{
                    //echo '<div class="alert alert-danger>Error. No se pudo guardar los datos !</div>';
                    echo'<script type="text/javascript"> 
                         alert("Error, no pudimos guardar tu comentario :c");
                         </script>';
				}
					 
	    }
	?>
            
            <h1>Aporta tus sugerencias en el formulario</h1>
            
            <form action="" method="post">
                <h2>Usuario</h2>
                <input type="text" id="NAM" name="nombre" placeholder="Nombre" required>
                <textarea name="sugerencia" id="SUG" cols="30" rows="10" placeholder="Escribe aqui tu sugerencia" required></textarea>
                <!-- <input type="button" onclick="comentario()" value="Enviar sugerencia" id="button"> -->
                <input type="submit" name="add" value="Enviar sugerencia" id="button">
            </form>
            <br><br><br><br><br>
    </main>
  