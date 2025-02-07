<h1> Gestión de productos</h1>

<!--Este bloque de código muestra un mensaje de error o éxito almacenado en 
la variable de sesión $_SESSION['producto']. Este mensaje se muestra en rojo 
(color:red) y se elimina de la sesión inmediatamente después de ser mostrado. 
Este mensaje puede ser útil para informar si la creación de un producto fue 
exitosa o no.
-->
<?php if (isset($_SESSION['producto'])) {

    // Mostrar el mensaje de error o éxito
    echo "<p style='color:red;'>" . $_SESSION['producto'] . "</p>";
    unset($_SESSION['producto']); // Limpiar el mensaje después de mostrarlo
} ?>
<!--Este enlace permite al administrador acceder a la página para crear un nuevo producto. -->
<a href="<?=base_url?>producto/crear" class="button button-small">
    Crear producto
</a>

<!--Este bloque de código verifica si el valor de $_SESSION['producto'] 
es igual a 'complete' o 'failed'. Dependiendo de eso, muestra un mensaje 
en verde (alert_green) indicando que el producto se creó correctamente, 
o en rojo (alert_red) indicando que hubo un error en la creación. Los 
estilos están definidos en CSS para estos mensajes.-->
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alert_red">El producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>


<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_red">El producto NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
            <td><?=$pro->id;?></td>
            <td><?=$pro->nombre;?></td>
            <td><?=$pro->precio;?></td>
            <td><?=$pro->stock;?></td>
            <td>
                <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-red">Eliminar</a>
            </td>
        </tr>        
    <?php endwhile; ?>
</table>