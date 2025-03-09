<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/StyleVer.css">

<!-- Tarjeta de visualización de oficina -->
<div class="client-card view-mode">
    <div class="card-header">
        <h2 class="title-with-line"><?php echo isset($lang['branch_details']) ? $lang['branch_details'] : 'Detalles de Oficina'; ?></h2>
        <div class="view-badge">
            <span class="view-icon">👁️</span>
            <span class="view-text"><?php echo isset($lang['viewing_mode']) ? $lang['viewing_mode'] : 'Modo Visualización'; ?></span>
        </div>
    </div>
    <div class="card-body">
        <!-- Resumen de la oficina -->
        <div class="client-info-summary">
            <div class="client-avatar">
                <i class="fas fa-building"></i>
            </div>
            <div class="client-summary">
                <h3><?php echo $this->model->nombre; ?></h3>
                <div class="office-identifiers">
                    <span class="office-id"><?php echo isset($lang['id']) ? $lang['id'] : 'ID'; ?>: <?php echo $this->model->idOficina; ?></span>
                    <span class="office-type">
                        <?php if ($this->model->central == 1): ?>
                            <span class="badge badge-primary"><?php echo isset($lang['central']) ? $lang['central'] : 'Central'; ?></span>
                        <?php else: ?>
                            <span class="badge badge-info"><?php echo isset($lang['branch']) ? $lang['branch'] : 'Sucursal'; ?></span>
                        <?php endif; ?>
                    </span>
                    <span class="office-status">
                        <?php if ($this->model->estado == 'activa'): ?>
                            <span class="badge badge-success"><?php echo isset($lang['active']) ? $lang['active'] : 'Activa'; ?></span>
                        <?php else: ?>
                            <span class="badge badge-danger"><?php echo isset($lang['inactive']) ? $lang['inactive'] : 'Inactiva'; ?></span>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Información detallada en formato de grid -->
        <div class="detail-section">
            <h4 class="section-title"><?php echo isset($lang['general_information']) ? $lang['general_information'] : 'Información General'; ?></h4>
            <div class="detail-grid">
                <!-- Columna izquierda: Información básica -->
                <div class="detail-column">
                    <!-- Nombre -->
                    <div class="detail-item">
                        <div class="detail-label"><?php echo isset($lang['name']) ? $lang['name'] : 'Nombre'; ?></div>
                        <div class="detail-value"><?php echo $this->model->nombre; ?></div>
                    </div>
                    
                    <!-- Dirección -->
                    <div class="detail-item">
                        <div class="detail-label"><?php echo isset($lang['address']) ? $lang['address'] : 'Dirección'; ?></div>
                        <div class="detail-value"><?php echo $this->model->direccion; ?></div>
                    </div>
                    
                    <!-- Ciudad -->
                    <div class="detail-item">
                        <div class="detail-label"><?php echo isset($lang['city']) ? $lang['city'] : 'Ciudad'; ?></div>
                        <div class="detail-value"><?php echo $this->model->ciudad; ?></div>
                    </div>
                    
                    <!-- Departamento -->
                    <div class="detail-item">
                        <div class="detail-label"><?php echo isset($lang['state']) ? $lang['state'] : 'Departamento'; ?></div>
                        <div class="detail-value"><?php echo $this->model->departamento; ?></div>
                    </div>
                    
                    <!-- País -->
                    <div class="detail-item">
                        <div class="detail-label"><?php echo isset($lang['country']) ? $lang['country'] : 'País'; ?></div>
                        <div class="detail-value"><?php echo $this->model->pais; ?></div>
                    </div>
                </div>
                
                <!-- Columna derecha: Información adicional -->
                <div class="detail-column">
                    <!-- Teléfono -->
                    <div class="detail-item">
                        <div class="detail-label"><?php echo isset($lang['phone']) ? $lang['phone'] : 'Teléfono'; ?></div>
                        <div class="detail-value"><?php echo !empty($this->model->telefono) ? $this->model->telefono : '-'; ?></div>
                    </div>
                    
                    <!-- Horario de Atención -->
                    <div class="detail-item">
                        <div class="detail-label"><?php echo isset($lang['office_hours']) ? $lang['office_hours'] : 'Horario de Atención'; ?></div>
                        <div class="detail-value"><?php echo !empty($this->model->horarioAtencion) ? $this->model->horarioAtencion : '-'; ?></div>
                    </div>
                    
                    <!-- Gerente Encargado -->
                    <div class="detail-item">
                        <div class="detail-label"><?php echo isset($lang['manager']) ? $lang['manager'] : 'Gerente Encargado'; ?></div>
                        <div class="detail-value"><?php echo !empty($this->model->gerenteEncargado) ? $this->model->gerenteEncargado : '-'; ?></div>
                    </div>
                    
                    <!-- Fecha de Inauguración -->
                    <div class="detail-item">
                        <div class="detail-label"><?php echo isset($lang['opening_date']) ? $lang['opening_date'] : 'Fecha de Inauguración'; ?></div>
                        <div class="detail-value">
                            <?php if (!empty($this->model->fechaInauguracion)): ?>
                                <?php echo date('d/m/Y', strtotime($this->model->fechaInauguracion)); ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Tipo de Oficina -->
                    <div class="detail-item">
                        <div class="detail-label"><?php echo isset($lang['branch_type']) ? $lang['branch_type'] : 'Tipo de Oficina'; ?></div>
                        <div class="detail-value type-value">
                            <?php if ($this->model->central == 1): ?>
                                <i class="fas fa-building"></i> <?php echo isset($lang['central']) ? $lang['central'] : 'Central'; ?>
                            <?php else: ?>
                                <i class="fas fa-store"></i> <?php echo isset($lang['branch']) ? $lang['branch'] : 'Sucursal'; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sección de Estado -->
        <div class="status-section">
            <h4 class="section-title"><?php echo isset($lang['status']) ? $lang['status'] : 'Estado'; ?></h4>
            <div class="status-display <?php echo $this->model->estado == 'activa' ? 'status-active' : 'status-inactive'; ?>">
                <?php if ($this->model->estado == 'activa'): ?>
                    <i class="fas fa-check-circle"></i> <?php echo isset($lang['active']) ? $lang['active'] : 'Activa'; ?>
                <?php else: ?>
                    <i class="fas fa-times-circle"></i> <?php echo isset($lang['inactive']) ? $lang['inactive'] : 'Inactiva'; ?>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Empleados de la oficina -->
        <div class="employees-section">
            <div class="section-header">
                <h4 class="section-title"><?php echo isset($lang['employees']) ? $lang['employees'] : 'Empleados'; ?></h4>
                <a href="index.php?controller=empleado&action=crear&idOficina=<?php echo $this->model->idOficina; ?>" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> <?php echo isset($lang['new_employee']) ? $lang['new_employee'] : 'Nuevo Empleado'; ?>
                </a>
            </div>
            
            <?php if (empty($empleados)): ?>
                <div class="empty-state">
                    <i class="fas fa-users-slash empty-icon"></i>
                    <p><?php echo isset($lang['no_employees']) ? $lang['no_employees'] : 'No hay empleados asignados a esta oficina.'; ?></p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped employees-table">
                        <thead>
                            <tr>
                                <th><?php echo isset($lang['id']) ? $lang['id'] : 'ID'; ?></th>
                                <th><?php echo isset($lang['name']) ? $lang['name'] : 'Nombre'; ?></th>
                                <th><?php echo isset($lang['position']) ? $lang['position'] : 'Cargo'; ?></th>
                                <th><?php echo isset($lang['email']) ? $lang['email'] : 'Email'; ?></th>
                                <th><?php echo isset($lang['phone']) ? $lang['phone'] : 'Teléfono'; ?></th>
                                <th><?php echo isset($lang['status']) ? $lang['status'] : 'Estado'; ?></th>
                                <th class="text-center"><?php echo isset($lang['actions']) ? $lang['actions'] : 'Acciones'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($empleados as $empleado): ?>
                                <tr>
                                    <td><?php echo $empleado['idEmpleado']; ?></td>
                                    <td>
                                        <?php echo $empleado['nombre'] . ' ' . $empleado['apellidoPaterno'] . ' ' . $empleado['apellidoMaterno']; ?>
                                    </td>
                                    <td><?php echo $empleado['cargo']; ?></td>
                                    <td><a href="mailto:<?php echo $empleado['email']; ?>"><?php echo $empleado['email']; ?></a></td>
                                    <td><?php echo $empleado['telefono']; ?></td>
                                    <td>
                                        <?php if ($empleado['estado'] == 'activo'): ?>
                                            <span class="badge badge-success"><?php echo isset($lang['active']) ? $lang['active'] : 'Activo'; ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-danger"><?php echo isset($lang['inactive']) ? $lang['inactive'] : 'Inactivo'; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center actions-column">
                                        <a href="index.php?controller=empleado&action=ver&id=<?php echo $empleado['idEmpleado']; ?>" class="btn btn-info btn-sm" title="<?php echo isset($lang['view']) ? $lang['view'] : 'Ver'; ?>">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="index.php?controller=empleado&action=editar&id=<?php echo $empleado['idEmpleado']; ?>" class="btn btn-primary btn-sm" title="<?php echo isset($lang['edit']) ? $lang['edit'] : 'Editar'; ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Botones de acción -->
        <div class="action-buttons">
            <a href="index.php?controller=oficina&action=editar&id=<?php echo $this->model->idOficina; ?>" class="btn btn-primary">
                <i class="fas fa-edit"></i> <?php echo isset($lang['edit']) ? $lang['edit'] : 'Editar'; ?>
            </a>
            <a href="index.php?controller=oficina&action=listar" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> <?php echo isset($lang['back_to_list']) ? $lang['back_to_list'] : 'Volver a la Lista'; ?>
            </a>
            <?php if ($this->model->estado == 'activa'): ?>
                <a href="index.php?controller=oficina&action=desactivar&id=<?php echo $this->model->idOficina; ?>" class="btn btn-warning" onclick="return confirm('<?php echo isset($lang['confirm_deactivate']) ? $lang['confirm_deactivate'] : '¿Está seguro que desea desactivar esta oficina?'; ?>')">
                    <i class="fas fa-ban"></i> <?php echo isset($lang['deactivate']) ? $lang['deactivate'] : 'Desactivar'; ?>
                </a>
            <?php else: ?>
                <a href="index.php?controller=oficina&action=activar&id=<?php echo $this->model->idOficina; ?>" class="btn btn-success" onclick="return confirm('<?php echo isset($lang['confirm_activate']) ? $lang['confirm_activate'] : '¿Está seguro que desea activar esta oficina?'; ?>')">
                    <i class="fas fa-check"></i> <?php echo isset($lang['activate']) ? $lang['activate'] : 'Activar'; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animación de entrada para elementos de la página
    const detailItems = document.querySelectorAll('.detail-item');
    
    detailItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.05}s`;
        item.classList.add('animate-in');
    });
    
    // Resaltar filas de la tabla al pasar el cursor
    const tableRows = document.querySelectorAll('.employees-table tbody tr');
    
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.classList.add('highlight-row');
        });
        
        row.addEventListener('mouseleave', () => {
            row.classList.remove('highlight-row');
        });
    });
});
</script>