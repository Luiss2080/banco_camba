<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/styleListar.css">

<div class="card client-card">
    <div class="card-header">
        <h2 class="title-with-line">Lista de Cuentas</h2>
        <a href="index.php?controller=cuenta&action=crear" class="btn-new-client">
            <i class="fa fa-plus-circle"></i> Nueva Cuenta
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($cuentas)): ?>
            <div class="alert alert-mercantil">No hay cuentas registradas en el sistema.</div>
        <?php else: ?>
            <div class="table-container">
                <table class="table table-mercantil">
                    <thead>
                        <tr>
                            <th>Número de Cuenta</th>
                            <th>Cliente</th>
                            <th>Tipo de Cuenta</th>
                            <th>Moneda</th>
                            <th>Saldo</th>
                            <th>Fecha de Apertura</th>
                            <th>Estado</th>
                            <th class="actions-column">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cuentas as $cuenta): ?>
                            <tr class="animate-row">
                                <td class="text-center"><?php echo $cuenta['nroCuenta']; ?></td>
                                <td class="text-center"><?php echo $cuenta['cliente_nombre']; ?></td>
                                <td class="text-center">
                                    <?php echo $cuenta['tipoCuenta'] == 1 ? 'Ahorro' : 'Corriente'; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $cuenta['tipoMoneda'] == 1 ? 'Bolivianos' : 'Dólares'; ?>
                                </td>
                                <td class="text-center">
                                    <?php 
                                    if ($cuenta['tipoMoneda'] == 1) {
                                        echo 'Bs. ' . number_format($cuenta['saldo'], 2);
                                    } else {
                                        echo '$ ' . number_format($cuenta['saldo'], 2);
                                    }
                                    ?>
                                </td>
                                <td class="text-center"><?php echo date('d/m/Y', strtotime($cuenta['fechaApertura'])); ?></td>
                                <td class="text-center">
                                    <?php if ($cuenta['estado'] == 1): ?>
                                        <span class="badge bg-success">Activa</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Inactiva</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center actions-cell">
                                    <div class="action-buttons">
                                        <a href="index.php?controller=cuenta&action=ver&id=<?php echo $cuenta['idCuenta']; ?>" class="btn-action btn-view" title="Ver detalles">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="index.php?controller=cuenta&action=editar&id=<?php echo $cuenta['idCuenta']; ?>" class="btn-action btn-edit" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <?php if ($cuenta['estado'] == 1): ?>
                                            <a href="index.php?controller=transaccion&action=depositar&idCuenta=<?php echo $cuenta['idCuenta']; ?>" class="btn-action btn-info" title="Depositar">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <a href="index.php?controller=transaccion&action=retirar&idCuenta=<?php echo $cuenta['idCuenta']; ?>" class="btn-action btn-warning" title="Retirar">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>