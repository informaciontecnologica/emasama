<?php
if (isset($_SESSION['admin'])) {
    $perfil = 1;
    $path = '';
//    <nav class = "navbar navbar-expand-lg navbar-light bg-light">
//    <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarTogglerDemo01" aria-controls = "navbarTogglerDemo01" aria-expanded = "false" aria-label = "Toggle navigation">
//    <span class = "navbar-toggler-icon"></span>
//    </button>
//    <div class = "collapse navbar-collapse" id = "navbarTogglerDemo01">
//    <a class = "navbar-brand" href = "#">Hidden brand</a>
//    <ul class = "navbar-nav mr-auto mt-2 mt-lg-0">
//    <li class = "nav-item active">
//    <a class = "nav-link" href = "#">Home <span class = "sr-only">(current)</span></a>
//    </li>
//    <li class = "nav-item">
//    <a class = "nav-link" href = "#">Link</a>
//    </li>
//    <li class = "nav-item">
//    <a class = "nav-link disabled" href = "#" tabindex = "-1" aria-disabled = "true">Disabled</a>
//    </li>
//    </ul>
//    <form class = "form-inline my-2 my-lg-0">
//    <input class = "form-control mr-sm-2" type = "search" placeholder = "Search" aria-label = "Search">
//    <button class = "btn btn-outline-success my-2 my-sm-0" type = "submit">Search</button>
//    </form>
//    </div>
//    </nav>
    switch ($perfil) {
        case '1':
            $url = '
                <ul class="nav navbar-nav ml-auto">
               <li class="nav-item"><a class="nav-link" href="' . $path . 'stock.php"><span class="glyphicon glyphicon-user"></span>Stock</a></li>
                <li class="nav-item"><a class="nav-link" href="' . $path . 'ventas.php"><span class="glyphicon glyphicon-log-in"></span>Ventas</a></li>
                <li class="nav-item"><a class="nav-link" href="' . $path . 'usuarios.php"><span class="glyphicon glyphicon-log-in"></span>Usuarios</a></li>
                <li class="nav-item"><a class="nav-link" href="' . $path . 'reportes.php"><span class="glyphicon glyphicon-log-in"></span>Reportes</a></li>
                <li class="nav-item"><a class="nav-link" href="' . $path . 'caja.php"><span class="glyphicon glyphicon-log-in"></span>Caja</a></li>
                <li class="nav-item"><a class="nav-link" href="' . $path . 'medidas.php"><span class="glyphicon glyphicon-log-in"></span>Medidas</a></li>
</ul>
           ';
            break;
    }
} else {
    $url = '';
}
echo '
    
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
   
             <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
                    <a class="nav-link" href="#">EMASAM</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" 
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Productos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Maiz</a>
                        <a class="dropdown-item" href="#">Sorgo</a>
                        <a class="dropdown-item" href="#">Alfalfa</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Servicios</a>
                </li>

            </ul>' .
 $url . '
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="registrarse.php"><span class="glyphicon glyphicon-user"></span>Registrar</a></li>';
if (isset($_SESSION['admin'])) {
    if ($_SESSION['perfil'] == 1) {

        echo '   <li class="nav-item"><a class="nav-link" href="../vistas/cerrar.php"><span class="glyphicon glyphicon-log-in"></span>Cerrar</a></li>';
    }
} else {

    echo '   <li class="nav-item"><a class="nav-link" href="../vistas/ingresar.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>';
}

echo'  </ul>
        </nav>
        </div>
        <div style="margin-top: 10px;>
        </div>
        ';
