<?php 
    include "global/config.php";
    include "carrito.php";
    include "templates/cabecera.php";
?>
<br>
<h3>Lista del Carrito</h3>
<?php if(!empty($_SESSION['carrito'])) { ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="40%">Descripcion</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0;?>
        <?php foreach($_SESSION['carrito'] as $indice => $producto): ?>
        <tr>
            <td width="40%"><?= $producto['nombre'] ?></td>
            <td width="15%" class="text-center"><?= $producto['cantidad'] ?></td>
            <td width="20%" class="text-center">$<?= $producto['precio'] ?></td>
            <td width="20%" class="text-center">$<?= number_format($producto['cantidad'] * $producto['precio'], 2) ?></td>
            <td width="5%">
                <form action="" method="POST">
                    <input type="hidden" name="id" id="id" value="<?= openssl_encrypt($producto['id'], COD, KEY) ?>">
                    <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php $total = $total + ($producto['cantidad'] * $producto['precio']);?>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total, 2); ?></h3></td>
            <td></td>
        </tr>
    </tfoot>
</table>
<?php } else { ?>
    <div class="alert alert-success" role="alert">
        No hay productos en el carrito...
    </div>
<?php } ?>
<?php include "templates/pie.php"; ?>