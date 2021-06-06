<div class="container form-container shadow-lg p-3 .bg-light rounded-lg">
    <h1 class="text-center"> 
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
        Listado de pedidos
        <button type="button" class="btn btn-success" onclick="location.href='<?=base_url("home/nuevaOrden")?>'">Nueva Orden</button>
        
    </h1>
    <table class="table table-hover text-center">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Monto</th>
            <th>Cliente</th>
            <th>Direccion</th>
            <th>Detalles</th>
        </tr>
        </thead>
        <?php foreach($pedidos as $pedido):?>
            <tr>
                <th class="text-danger" scope="row"><?=$pedido['idpedido'];?></th>
                <td><?=$pedido['fecha'];?></td>
                <td class="text-info" ><?=$pedido['total'];?></td>
                <td><?=$pedido['nombres'];?></td>
                <td><?=$pedido['direccion'];?></td>
                <td>
                    <a href="<?=base_url("home/detallespedido/".$pedido['idpedido'])?>">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
                        <circle cx="3.5" cy="5.5" r=".5"/>
                        <circle cx="3.5" cy="8" r=".5"/>
                        <circle cx="3.5" cy="10.5" r=".5"/>
                    </svg>
                    </a>
                </td>
            </tr>
        <?php endforeach?>
    </table> 
</div>