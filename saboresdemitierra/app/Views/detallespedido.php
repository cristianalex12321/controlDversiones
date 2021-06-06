<div class="container form-container shadow-lg p-3 .bg-light rounded-lg">
    <h2 class="text-center">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    Listado de platillos</h2>
    <div class="row mb-1">
        <div class="col-6">
            <h4>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg>
            Descripcion
            </h4>
        </div>
        <div class="col-6 d-flex align-items-center justify-content-end">    
                <input type="submit" class="btn btn-outline-success"  onClick="history.go(-1)" value="Regresar"/>
        </div>
    </div>
    <table class="table table-hover text-center">
        <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>SubTotal</th>
        </tr>
        </thead>
        <?php foreach($descripcionplat as $descripcion): ?>
            <tr>
                <td><?=$descripcion['nombre'];?></td>
                <td class="text-primary"><?=$descripcion['cantidad'];?></td>
                <td class="text-danger"><?=$descripcion['subtotal'];?></td>
            </tr>
        <?php endforeach?>
    </table>
</div>