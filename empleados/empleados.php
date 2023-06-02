<?php
require_once("config.php");

$data = new Config();
$all = $data->selectAll();

$imagenPath = "images/"; 
$imagenes = scandir($imagenPath);


$imagenes = array_filter($imagenes, function ($item) {
    return !in_array($item, ['.', '..']);
});
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/estudiantes.css">
</head>

<body>
  <div class="contenedor">
  <div class="parte-izquierda  bg-danger">
      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Camper Clientes.</h3>
        <img src="images/diseño.png" alt="" class="imagenPerfil">
        <h3>JULIAN VEGA </h3>
      </div>
      <div class="menus">
        <a href="../categorias/facturas.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Categorias</h3>
        </a>
        <a href="../clientes/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
        </a>
        <a href="../empleados/empleados.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Empleados</h3>
        </a>
        <a href="../facturas/categorias.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Facturas</h3>
        </a>
        <a href="../detalles/detalles.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Detalles</h3>
        </a>
        <a href="../productos/productos.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
        </a>
        <a href="../proveedores/proveedores.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Proveedores</h3>
        </a>
      </div>
    </div>
    <div class="parte-media bg-info bg-gradient">
      <div style="display: flex; justify-content: space-between;">
        <h2>Facturas</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEstudiantes"><i class="bi bi-person-add"></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">IMAGEN</th>
              <th scope="col">NOMBRE</th>
              <th scope="col">CELULAR</th>
              <th scope="col">DIRECCION</th>
              <th scope="col">BORRAR</th>
              <th scope="col">DETALLES</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">
<?php foreach ($all as $val): ?>
              <tr>
                <td><?php echo $val['empleado_id']?></td>
                <td><img src="<?php echo $imagenPath . $val['imagen']; ?>" width="70px" alt=""></td>
                <td><?php echo $val['nombre']?></td>
                <td><?php echo $val['celular']?></td>
                <td><?php echo $val['direccion']?></td>
                <td><a class="btn btn-danger" href="borrarEmpleado.php?id=<?= $val['empleado_id']?>&req=delete">Borrar</a></td>
                <td><a class="btn btn-warning" href="editarEmpleado.php?id=<?= $val['empleado_id']?>">Editar</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="parte-derecho  bg-danger" id="detalles">
      <h3>Detalle empleado</h3>
      <p>Cargando...</p>
     
    </div>
  
    <div class="modal fade" id="registrarEstudiantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content ">
          <div class="modal-header">

            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva empleado</h1>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

          </div>

          <div class="modal-body" style="background-color: rgb(231, 253, 246);">

            <form class="col d-flex flex-wrap" action="registrarEmpleado.php" method="post">

              <div class="mb-1 col-12">

                <label for="nombre" class="form-label">Nombre empleado</label>

                <input type="text" id="nombre" name="nombre" class="form-control" />

              </div>

              <div class="mb-1 col-12">

                <label for="celular" class="form-label">Celular</label>

                <input type="text" id="celular" name="celular" class="form-control" />
              </div>

              <div class="mb-1 col-12">

                <label for="direccion" class="form-label">Direccion</label>

                <input type="text" id="direccion" name="direccion" class="form-control" />
              </div>

              <div class="mb-1 col-12">

                <label for="imagen" class="form-label">Imagen</label>

                <select id="imagen" name="imagen" class="form-control">

                  <?php foreach ($imagenes as $imagen): ?>

                    <option value="<?php echo $imagen; ?>" <?php echo ($val['imagen'] == $imagen) ? 'selected' : ''; ?>><?php echo $imagen; ?></option>

                  <?php endforeach; ?>

                </select>
              </div>
              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardar" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>
</body>
</html>