<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/styleListar.css">
<div class="card client-card">
    <div class="card-header">
        <h2 class="title-with-line">Lista de Clientes</h2>
        <a href="index.php?controller=cliente&action=crear" class="btn-new-client">
            <i class="fa fa-plus-circle"></i> Nuevo Cliente
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($clientes)): ?>
            <div class="alert alert-mercantil">No hay clientes registrados en el sistema.</div>
        <?php else: ?>
            <div class="table-container">
                <table class="table table-mercantil">
                    <thead>
                        <tr>
                            <th>Cédula de Identidad</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Teléfono</th>
                            <th>Oficina</th>
                            <th class="actions-column">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr class="animate-row">
                                <td class="text-center"><?php echo $cliente['ci']; ?></td>
                                <td class="text-center"><?php echo $cliente['nombre']; ?></td>
                                <td class="text-center"><?php echo $cliente['apellidoPaterno']; ?></td>
                                <td class="text-center"><?php echo $cliente['apellidoMaterno']; ?></td>
                                <td class="text-center"><?php echo $cliente['telefono']; ?></td>
                                <td class="text-center"><?php echo $cliente['oficina_nombre']; ?></td>
                                <td class="text-center actions-cell">
                                    <div class="action-buttons">
                                        <a href="index.php?controller=cliente&action=ver&id=<?php echo $cliente['idPersona']; ?>" class="btn-action btn-view" title="Ver detalles">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="index.php?controller=cliente&action=editar&id=<?php echo $cliente['idPersona']; ?>" class="btn-action btn-edit" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="index.php?controller=cliente&action=eliminar&id=<?php echo $cliente['idPersona']; ?>" class="btn-action btn-delete delete-button" title="Eliminar">
                                            <i class="fa fa-trash"></i>
                                        </a>
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