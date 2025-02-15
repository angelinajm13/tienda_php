<?php if ($pedidos && $pedidos->num_rows > 0): ?>
    <table>
        <tr>
            <th>Num. de pedido</th>
            <th>Costo</th>
            <th>Fecha</th>
        </tr>
        <?php 
            while ($ped = $pedidos->fetch_object()): ?>
                <tr>
                    <td>
                        <a href="<?=base_url?>pedido/detalle&id=<?=$ped->id?>"><?=$ped->id?></a>
                    </td>
                    <td>
                        <?=$ped->coste ?>
                    </td>
                    <td>
                        <?=$ped->fecha ?>
                    </td>
                </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No hay pedidos disponibles.</p>
<?php endif; ?>
