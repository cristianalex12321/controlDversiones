<div class="container form-container shadow-lg p-3 .bg-light rounded-lg">
    <?php
        $url_iniciar = "home/iniciarSesion";
        $url_nuevaOrden = "home/nuevaOrden";
        $url = $logueado ? $url_nuevaOrden : $url_iniciar;
    ?>
    <h2 class="text-center">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
        Listado de Platillos
        <button type="button" class="btn btn-success" onclick="location.href='<?=base_url($url)?>'">Nueva Orden</button>
    </h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
            </tr>
        </thead>
        <?php foreach($platillos as $platillo): ?>
            <tr>
                <th class="text-danger" scope="row"><?=$platillo['idplatillo'];?></th>
                <td><?=$platillo['nombre'];?></td>
                <td class="text-info"><?=$platillo['descripcion'];?></td>
                <td><?=$platillo['precio'];?></td>   
            </tr>
        <?php endforeach?>
    </table> 
    </div>