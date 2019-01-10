<?php 
include "../Include/db_connect.php";
include "ChristianFields.php";

$queryArea = "SELECT * FROM lvv_privilegios WHERE Estado = 1";
if (!$Qarea = mysqli_query($db,$queryArea)) {
    echo "error al buscar areas";
    die();
}

$queryDias = "SELECT * FROM lvv_servicios WHERE Estado = 1";
if (!$qDias = mysqli_query($db,$queryDias)) {
    echo "error al buscar areas";
    die();
}




 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Alabanza LVV</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="../Include/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }

        .blog-header {
  line-height: 1;
  border-bottom: 1px solid #e5e5e5;
}

.blog-header-logo {
  font-family: "Playfair Display", Georgia, "Times New Roman", serif;
  font-size: 2.25rem;
}

.blog-header-logo:hover {
  text-decoration: none;
}

h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display", Georgia, "Times New Roman", serif;
}

.display-4 {
  font-size: 2.5rem;
}
@media (min-width: 768px) {
  .display-4 {
    font-size: 3rem;
  }
}

.nav-scroller {
  position: relative;
  z-index: 2;
  height: 2.75rem;
  overflow-y: hidden;
}

.nav-scroller .nav {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  padding-bottom: 1rem;
  margin-top: -1px;
  overflow-x: auto;
  text-align: center;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}

.nav-scroller .nav-link {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: .875rem;
}

.card-img-right {
  height: 100%;
  border-radius: 0 3px 3px 0;
}

.flex-auto {
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
}

.h-250 { height: 250px; }
@media (min-width: 768px) {
  .h-md-250 { height: 250px; }
}

/*
 * Blog name and description
 */
.blog-title {
  margin-bottom: 0;
  font-size: 2rem;
  font-weight: 400;
}
.blog-description {
  font-size: 1.1rem;
  color: #999;
}

@media (min-width: 40em) {
  .blog-title {
    font-size: 3.5rem;
  }
}

/* Pagination */
.blog-pagination {
  margin-bottom: 4rem;
}
.blog-pagination > .btn {
  border-radius: 2rem;
}

/*
 * Blog posts
 */
.blog-post {
  margin-bottom: 4rem;
}
.blog-post-title {
  margin-bottom: .25rem;
  font-size: 2.5rem;
}
.blog-post-meta {
  margin-bottom: 1.25rem;
  color: #999;
}

/*
 * Footer
 */
.blog-footer {
  padding: 2.5rem 0;
  color: #999;
  text-align: center;
  background-color: #f9f9f9;
  border-top: .05rem solid #e5e5e5;
}
.blog-footer p:last-child {
  margin-bottom: 0;
}

      }

.imgRedonda {
    width:60px;
    height:60px;
    border-radius:100px;
    margin-bottom: 5px;
}
.imgRedondas {
    width:80px;
    height:80px;
    border-radius:100px;
    margin-bottom: 5px;
}
    </style>
    <!-- Custom styles for this template -->
    <link href="../Include/font.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" href="#"></a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">Privilegios</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <!--<a class="text-muted" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3" focusable="false" role="img"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>-->
      </div>
    </div>
  </header>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../index.php">Regresar</a></li>
    <li class="breadcrumb-item active" aria-current="page">Privilegios</li>
  </ol>
</nav>
  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <?php
        $query = "SELECT * from lvv_areas Where estado = 1";
        if (!$Query = mysqli_query($db,$query)) {
          echo "error al consultar datos";
          die();
        }
        while ($row = mysqli_fetch_assoc($Query)) { ?>
          <a class="p-2 text-muted" href="#"><?=$row['Nombre']?></a>
      <?php 
        }
       ?>
    </nav>
  </div>

  <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark" style="background-image: url('../fondo.jpg') !important; background-size: 100%;">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Juan 15:1-4</h1>
      <p class="lead my-3">Yo soy la Vid Verdadera.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold"><br>
      </a></p>
    </div>
  </div>
  <br>
  <div class="row text-center">
    
  </div>
  <br>
 
  <form action="pdf2/reporte-privilegio.php" method="POST">
    <div class="col-md-12 text-center">
      <input type="submit" class="btn btn-outline-danger" value="PDF">
    </div>
    
    <br>
    <div class="table-responsive-md">
  <table class="table table-striped text-center ">
    <thead class="bg-dark text-white">
      <tr>
        <th></th>
        <?php while ($qDia = mysqli_fetch_assoc($qDias)) {// nombre de los servicios o dias ?>
          <th>
            <?=utf8_encode($qDia['Nombre'])?> 
            <br>
            <input type="date" id="fecha<?=$qDia['CodServicio']?>" name="fecha<?=$qDia['CodServicio']?>">
          </th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php 
        while ($rowA = mysqli_fetch_assoc($Qarea)) { // aqui pongo todas las areas con un while a la base de datos
       ?>
      <tr>
        <th class="align-middle"><?=utf8_encode($rowA['Nombre'])?></th>
        <?php
          $codAreas = $rowA['CodArea'];
          $nombreArea = str_replace(' ', '', $rowA['Nombre']); // quito espacios en la base de datos
          $codPrivi = $rowA['CodPrivilegio'];
          $QDirec = "SELECT i.CodIntegrante,Concat(i.Nombres,' ',i.Apellidos) as nombre,'director' as titulo
                      FROM lvv_usuarioarea u
                      INNER JOIN lvv_integrantes i on i.CodIntegrante = u.CodIntegrante
                      WHERE u.CodArea = $codAreas AND u.Estado = 1";

          $queryDias = "SELECT * FROM lvv_servicios WHERE Estado = 1";
            if (!$qDias2 = mysqli_query($db,$queryDias)) {
                echo "error al buscar areas";
                die();
            }

          while ($rowDias = mysqli_fetch_assoc($qDias2)) { 
            $codServicio = $rowDias['CodServicio'];
            $nomCombo1 = "$nombreArea $codPrivi $codServicio";
            $nomCombo = str_replace(" ", "_", $nomCombo1);

            $director = new campo;
            $director ->Nombre = $nomCombo;
            $director ->Tipo = 'comboq';
            $director ->Clase = "custom-select d-block w-100";
            $director ->Query =  "$QDirec";
            $director ->onChange = "imgChange('$nomCombo')";
        ?>
          <td>
            <div id="img<?=$nomCombo?>"> 
              <img  src='../imgIntegrantes/user.png' class='imgRedonda' />
            </div>
            
            <?=$director->desplegar();?>    
          </td>
        <?php }
         ?>
      </tr>
      
<?php  
      }// fin del while de areas
?>

    </tbody>
  </table>
   </div>
  </form>  

<br>

  

<footer class="blog-footer">
  <p>Señor, tú eres mi Dios; te exaltaré y alabaré tu nombre porque has hecho maravillas. Desde tiempos antiguos tus planes son fieles y seguros.  </p>
  <p>
   <a href="#">Isaías 25:1</a>
  </p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
<script src="../Include/jquery-3.3.1.min.js"></script>
<script>
  
  function imgChange(idDiv) {
    var idInte = $("#"+idDiv).val();

    $.post('privilegio-ajax.php', {op: 'imgInte',CodInt:idInte}, function(data, textStatus, xhr) {
      if (data == "error") {
        alert('Error Buscando Imagen');
      } else {
        $("#img"+idDiv).html(data);
      }
    });
  }

</script>
</body>
</html>