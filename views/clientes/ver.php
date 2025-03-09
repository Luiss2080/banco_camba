<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/StyleVerCliente.css">
<!-- Contenedor principal sin márgenes laterales -->
<div class="content-wrapper">
    <!-- Encabezado con título y badge de modo visualización -->
    <div class="header-container">
        <h2 class="page-title">Detalles de Cliente</h2>
        <div class="mode-visualizacion">
            <span class="mode-icon">👁️</span> Modo Visualización
        </div>
    </div>

    <!-- Resumen de cliente -->
    <div class="client-summary">
        <div class="avatar-box">
            <div class="client-avatar">
                <i class="fas fa-user"></i>
            </div>
        </div>
        <div class="client-info">
            <h2 class="client-name"><?php echo htmlspecialchars($this->model->nombre . ' ' . $this->model->apellidoPaterno . ' ' . $this->model->apellidoMaterno); ?></h2>
            <p class="client-identification">CI: <?php echo htmlspecialchars($this->model->ci); ?></p>
        </div>
    </div>

    <!-- Campos principales de información -->
    <div class="details-container">
        <div class="details-row">
            <div class="details-cell">
                <label class="detail-label">ID Cliente</label>
                <div class="detail-value"><?php echo $this->model->idPersona; ?></div>
            </div>
            <div class="details-cell">
                <label class="detail-label">Teléfono</label>
                <div class="detail-value"><?php echo !empty($this->model->telefono) ? htmlspecialchars($this->model->telefono) : '—'; ?></div>
            </div>
        </div>
        
        <div class="details-row">
            <div class="details-cell">
                <label class="detail-label">Nombre</label>
                <div class="detail-value"><?php echo htmlspecialchars($this->model->nombre); ?></div>
            </div>
            <div class="details-cell">
                <label class="detail-label">Email</label>
                <div class="detail-value"><?php echo !empty($this->model->email) ? htmlspecialchars($this->model->email) : '—'; ?></div>
            </div>
        </div>
        
        <div class="details-row">
            <div class="details-cell">
                <label class="detail-label">Apellido Paterno</label>
                <div class="detail-value"><?php echo htmlspecialchars($this->model->apellidoPaterno); ?></div>
            </div>
            <div class="details-cell">
                <label class="detail-label">Dirección</label>
                <div class="detail-value"><?php echo !empty($this->model->direccion) ? htmlspecialchars($this->model->direccion) : '—'; ?></div>
            </div>
        </div>
        
        <div class="details-row">
            <div class="details-cell">
                <label class="detail-label">Apellido Materno</label>
                <div class="detail-value"><?php echo htmlspecialchars($this->model->apellidoMaterno); ?></div>
            </div>
            <div class="details-cell">
                <label class="detail-label">Fecha de Nacimiento</label>
                <div class="detail-value">
                    <?php if (!empty($this->model->fechaNacimiento)): ?>
                        <?php echo date('d/m/Y', strtotime($this->model->fechaNacimiento)); ?>
                    <?php else: ?>
                        —
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="details-row">
            <div class="details-cell">
                <label class="detail-label">CI / Documento</label>
                <div class="detail-value highlight-value"><?php echo htmlspecialchars($this->model->ci); ?></div>
            </div>
            <div class="details-cell">
                <label class="detail-label">Fecha de Registro</label>
                <div class="detail-value">
                    <?php if (!empty($this->model->fechaRegistro)): ?>
                        <?php echo date('d/m/Y', strtotime($this->model->fechaRegistro)); ?>
                    <?php else: ?>
                        —
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Tipo de Cliente y Estado en la misma fila -->
    <div class="option-row-container">
        <div class="option-section">
            <label class="option-label">Tipo de Cliente</label>
            <div class="option-buttons">
                <div class="option-button <?php echo $this->model->tipoCliente == 1 ? 'selected' : ''; ?>">
                    Personal
                </div>
                <div class="option-button <?php echo $this->model->tipoCliente == 2 ? 'selected' : ''; ?>">
                    Empresarial
                </div>
            </div>
        </div>

        <div class="option-section">
            <label class="option-label">Estado</label>
            <div class="option-buttons">
                <div class="option-button status-active <?php echo $this->model->estado == 1 ? 'selected' : ''; ?>">
                    <i class="fas fa-check-circle"></i> Activo
                </div>
                <div class="option-button status-inactive <?php echo $this->model->estado == 0 ? 'selected' : ''; ?>">
                    <i class="fas fa-times-circle"></i> Inactivo
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de cuentas -->
    <div class="accounts-section">
        <div class="section-header">
            <h3 class="section-title">Cuentas Bancarias</h3>
            <a href="index.php?controller=cuenta&action=crear&idCliente=<?php echo $this->model->idPersona; ?>" class="add-button">
                <i class="fas fa-plus-circle"></i> Nueva Cuenta
            </a>
        </div>
        
        <?php if (empty($cuentas)): ?>
        <div class="no-accounts">
            <p>No hay cuentas asociadas a este cliente.</p>
            <a href="index.php?controller=cuenta&action=crear&idCliente=<?php echo $this->model->idPersona; ?>" class="add-account-btn">
                <i class="fas fa-plus-circle"></i> Crear Cuenta
            </a>
        </div>
        <?php else: ?>
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nro. Cuenta</th>
                        <th>Tipo</th>
                        <th>Moneda</th>
                        <th>Saldo</th>
                        <th>Fecha Apertura</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cuentas as $cuenta): ?>
                    <tr>
                        <td class="account-number"><?php echo htmlspecialchars($cuenta['nroCuenta']); ?></td>
                        <td>
                            <?php echo $cuenta['tipoCuenta'] == 1 ? 'Ahorro' : 'Corriente'; ?>
                        </td>
                        <td>
                            <?php echo $cuenta['tipoMoneda'] == 1 ? 'Bolivianos (Bs)' : 'Dólares ($)'; ?>
                        </td>
                        <td class="account-balance">
                            <strong>
                                <?php 
                                if ($cuenta['tipoMoneda'] == 1) {
                                    echo 'Bs. ' . number_format($cuenta['saldo'], 2);
                                } else {
                                    echo '$ ' . number_format($cuenta['saldo'], 2);
                                }
                                ?>
                            </strong>
                        </td>
                        <td><?php echo date('d/m/Y', strtotime($cuenta['fechaApertura'])); ?></td>
                        <td>
                            <?php if ($cuenta['estado'] == 1): ?>
                            <span class="status-pill active">Activa</span>
                            <?php else: ?>
                            <span class="status-pill inactive">Inactiva</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="index.php?controller=cuenta&action=ver&id=<?php echo $cuenta['idCuenta']; ?>" class="action-btn view" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="index.php?controller=cuenta&action=editar&id=<?php echo $cuenta['idCuenta']; ?>" class="action-btn edit" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <?php if ($cuenta['estado'] == 1): ?>
                                <a href="index.php?controller=transaccion&action=depositar&idCuenta=<?php echo $cuenta['idCuenta']; ?>" class="action-btn deposit" title="Depositar">
                                    <i class="fas fa-arrow-down"></i>
                                </a>
                                <a href="index.php?controller=transaccion&action=retirar&idCuenta=<?php echo $cuenta['idCuenta']; ?>" class="action-btn withdraw" title="Retirar">
                                    <i class="fas fa-arrow-up"></i>
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

    <!-- Sección de últimas transacciones -->
    <div class="transactions-section">
        <div class="section-header">
            <h3 class="section-title">Últimas Transacciones</h3>
            <a href="index.php?controller=cliente&action=transacciones&id=<?php echo $this->model->idPersona; ?>" class="view-all-btn">
                Ver todas
            </a>
        </div>
        
        <?php if (empty($transacciones)): ?>
        <div class="no-transactions">
            <p>No hay transacciones registradas para este cliente.</p>
        </div>
        <?php else: ?>
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Cuenta</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_slice($transacciones, 0, 5) as $transaccion): ?>
                    <tr>
                        <td><?php echo date('d/m/Y', strtotime($transaccion['fecha'])); ?></td>
                        <td><?php echo date('H:i:s', strtotime($transaccion['hora'])); ?></td>
                        <td><?php echo htmlspecialchars($transaccion['nroCuenta']); ?></td>
                        <td>
                            <?php 
                            switch($transaccion['tipoTransaccion']) {
                                case 1:
                                    echo '<span class="transaction-type withdrawal">Retiro</span>';
                                    break;
                                case 2:
                                    echo '<span class="transaction-type deposit">Depósito</span>';
                                    break;
                                case 3:
                                    echo '<span class="transaction-type transfer-in">Transferencia Recibida</span>';
                                    break;
                                case 4:
                                    echo '<span class="transaction-type transfer-out">Transferencia Enviada</span>';
                                    break;
                                default:
                                    echo '<span class="transaction-type other">Otro</span>';
                            }
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($transaccion['descripcion']); ?></td>
                        <td class="amount-cell <?php echo in_array($transaccion['tipoTransaccion'], [1, 4]) ? 'negative' : 'positive'; ?>">
                            <?php 
                            $prefix = in_array($transaccion['tipoTransaccion'], [1, 4]) ? '-' : '+';
                            if ($transaccion['tipoMoneda'] == 1) {
                                echo $prefix . ' Bs. ' . number_format($transaccion['monto'], 2);
                            } else {
                                echo $prefix . ' $ ' . number_format($transaccion['monto'], 2);
                            }
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>

    <!-- Botones de acción -->
    <div class="actions-container">
        <a href="index.php?controller=cliente&action=editar&id=<?php echo $this->model->idPersona; ?>" class="action-main edit-btn">
            Editar
        </a>
        
        <?php if ($this->model->estado == 1): ?>
        <a href="index.php?controller=cuenta&action=crear&idCliente=<?php echo $this->model->idPersona; ?>" class="action-main new-account-btn">
            Nueva Cuenta
        </a>
        <a href="index.php?controller=cliente&action=desactivar&id=<?php echo $this->model->idPersona; ?>" class="action-main deactivate-btn" onclick="return confirm('¿Está seguro que desea desactivar este cliente?')">
            Desactivar
        </a>
        <?php else: ?>
        <a href="index.php?controller=cliente&action=activar&id=<?php echo $this->model->idPersona; ?>" class="action-main activate-btn" onclick="return confirm('¿Está seguro que desea activar este cliente?')">
            Activar
        </a>
        <?php endif; ?>
        
        <a href="index.php?controller=cliente&action=listar" class="action-main back-btn">
            Volver a la Lista
        </a>
    </div>
</div>