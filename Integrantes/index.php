<?php 
include "../Include/db_connect.php";
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


.opciones{
  padding: 3px 3px 3px 3px;
}
.opciones:hover{
  background-color: #868686;
  color: white;
}  
 .imgRedonda {
    width:100px;
    height:100px;
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
        <a class="blog-header-logo text-dark" href="#">Integrantes</a>
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
    <li class="breadcrumb-item active" aria-current="page">Integrantes</li>
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

  <div class="col-md-12 text-center">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <strong class="d-inline-block mb-2 text-dark">Listado de Integrantes</strong>
          <input type="text" class="form-control text-center" placeholder="Ingrese Nombre o Apellido" onkeyup="IntegrantesList(this.value)">
          <br>   
            <div id="selectInte">   
            </div>     
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
              <button class="btn btn-outline-success" onclick="nuevoDatos()">Nuevo</button>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <strong class="d-inline-block mb-2 text-dark">Datos</strong>
        <div class="col-md-12 contenedor2">
          <div class="card">
            <div class="card-body" id="datosContainer">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<br><br>
<footer class="blog-footer">
  <p>Señor, tú eres mi Dios; te exaltaré y alabaré tu nombre porque has hecho maravillas. Desde tiempos antiguos tus planes son fieles y seguros.  </p>
  <p>
   <a href="#">Isaías 25:1</a>
  </p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
<script src="../Include/jquery-3.3.1.min.js"></script>
<script src="../Include/dropzone.js"></script>

<!--Aqui empiezan las funciones del script -->
<script>
$(document).ready(function() {
  IntegrantesList('Invali06');
});


function valida(f){
  var err = 0;
  var msj = "Tiene los Siguientes Errores: \n\n";

  if ($("#Nombres").val() == "") {
    err++;
    msj += " - Ingrese Almenos Un Nombre. \n";
  } else {}

    if ($("#Apellidos").val() == "") {
      err++;
      msj += " - Ingrese Almenos Un Apellido. \n";
    } 

    if (err > 0) {
      alert(msj);      
      return false;
    }else{
      if ($("#intIMG").val() != "") {
        return true;
      }else{
        if (confirm("Desea Continuar Sin Imagen?")) {
          return true;
        } else {
          return false;
        }
      }
    }


  
}

function prew(Value,th){
  $('#nombreIMGA').html(Value);
   readURL(th);
}
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgPRe').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

  function mostrarDatos(CodIntegrante){
    $.post('integrante-ajax.php', {op: 'BuscarDatos', CodIntegrante:CodIntegrante }, function(data, textStatus, xhr) {
      if (data != "") {
        $("#datosContainer").html(data);
      }
    });
  }
  function nuevoDatos(){
    $.post('integrante-ajax.php', {op: 'NuevoIntegrante'}, function(data, textStatus, xhr) {
      if (data != "") {
        $("#datosContainer").html(data);
      }
    });
  }
  function edit(CodIntegrante){


    var Nombres = $("#NombresEdit").val();
    var Apellidos = $("#ApellidosEdit").val(); 
    var Celular = $("#CelularEdit").val();     

      $.post('integrante-ajax.php', 
      { op: 'Editar',
        CodIntegrante:CodIntegrante,
        Nombres:Nombres,
        Apellidos:Apellidos,
        Celular:Celular
      },
         function(data, textStatus, xhr) {
          if (data == 1) {
              alert('Guardado');
              location.reload();
          } else {
            alert(data);
          }
      });
  }
  function agregar(CodArea,Integrante){

    $.post('integrante-ajax.php', {op: 'add',CodArea:CodArea, Integrante:Integrante}, function(data, textStatus, xhr) {
      if (data == 1) {
        mostrarDatos(Integrante);
      } else {
        alert(data);
      }
    });
  }
  function Quitar(CodArea,Integrante){
    $.post('integrante-ajax.php', {op: 'del',CodArea:CodArea, Integrante:Integrante}, function(data, textStatus, xhr) {
      if (data == 1) {
        mostrarDatos(Integrante);
      } else {
        alert(data);
      }
    });
  }
  function IntegrantesList(nombre){

    $.post('integrante-ajax.php', {op: 'ListInte',nombre:nombre,}, function(data, textStatus, xhr) {
      $("#selectInte").html(data);
    });
    
  }


</script>
  
    </body>
</html>


