<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/styleListar.css">

<div class="card client-card">
    <div class="card-header">
        <h2 class="title-with-line"><?php echo isset($lang['reports']) ? $lang['reports'] : 'Reportes'; ?></h2>
        <div class="header-buttons">
            <a href="javascript:window.print();" class="btn-action-header btn-print">
                <i class="fa fa-print"></i> <?php echo isset($lang['print']) ? $lang['print'] : 'Imprimir'; ?>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="alert alert-mercantil">
            <strong>Nota:</strong> <?php echo isset($lang['reports_note']) ? $lang['reports_note'] : 'Los reportes se generan en tiempo real con datos actualizados del sistema.'; ?>
        </div>
        
        <!-- Sección: Reportes de Transacciones y Estadísticas -->
        <div class="section-header">
            <h3><?php echo isset($lang['transactions_stats_reports']) ? $lang['transactions_stats_reports'] : 'Reportes de Transacciones y Estadísticas'; ?></h3>
        </div>
        
        <div class="table-container">
            <table class="table table-mercantil">
                <thead>
                    <tr>
                        <th><?php echo isset($lang['report_name']) ? $lang['report_name'] : 'Nombre del Reporte'; ?></th>
                        <th><?php echo isset($lang['description']) ? $lang['description'] : 'Descripción'; ?></th>
                        <th class="actions-column"><?php echo isset($lang['actions']) ? $lang['actions'] : 'Acciones'; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fila 1 -->
                    <tr class="animate-row">
                        <td class="text-left">
                            <div class="report-name">
                                <i class="fa fa-calendar report-icon"></i>
                                <?php echo isset($lang['transactions_by_date']) ? $lang['transactions_by_date'] : 'Transacciones por Fecha'; ?>
                            </div>
                        </td>
                        <td class="text-left"><?php echo isset($lang['transactions_by_date_desc']) ? $lang['transactions_by_date_desc'] : 'Informe detallado de transacciones realizadas en un rango de fechas seleccionado.'; ?></td>
                        <td class="text-center actions-cell">
                            <div class="action-buttons">
                                <a href="index.php?controller=reporte&action=transaccionesPorFecha" class="btn-action btn-view" title="<?php echo isset($lang['view_report']) ? $lang['view_report'] : 'Ver Reporte'; ?>">
                                    <i class="fa fa-chart-bar"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Fila 2 -->
                    <tr class="animate-row">
                        <td class="text-left">
                            <div class="report-name">
                                <i class="fa fa-user report-icon"></i>
                                <?php echo isset($lang['transactions_by_client']) ? $lang['transactions_by_client'] : 'Transacciones por Cliente'; ?>
                            </div>
                        </td>
                        <td class="text-left"><?php echo isset($lang['transactions_by_client_desc']) ? $lang['transactions_by_client_desc'] : 'Historial de transacciones agrupadas por cliente para un análisis detallado de actividad.'; ?></td>
                        <td class="text-center actions-cell">
                            <div class="action-buttons">
                                <a href="index.php?controller=reporte&action=transaccionesPorCliente" class="btn-action btn-view" title="<?php echo isset($lang['view_report']) ? $lang['view_report'] : 'Ver Reporte'; ?>">
                                    <i class="fa fa-chart-bar"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Fila 3 -->
                    <tr class="animate-row">
                        <td class="text-left">
                            <div class="report-name">
                                <i class="fa fa-credit-card report-icon"></i>
                                <?php echo isset($lang['atm_statistics']) ? $lang['atm_statistics'] : 'Estadísticas de ATM'; ?>
                            </div>
                        </td>
                        <td class="text-left"><?php echo isset($lang['atm_statistics_desc']) ? $lang['atm_statistics_desc'] : 'Análisis de uso de cajeros automáticos, transacciones y disponibilidad.'; ?></td>
                        <td class="text-center actions-cell">
                            <div class="action-buttons">
                                <a href="index.php?controller=reporte&action=estadisticasATM" class="btn-action btn-view" title="<?php echo isset($lang['view_report']) ? $lang['view_report'] : 'Ver Reporte'; ?>">
                                    <i class="fa fa-chart-bar"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Sección: Reportes de Saldos y Actividad -->
        <div class="section-header">
            <h3><?php echo isset($lang['balances_activity_reports']) ? $lang['balances_activity_reports'] : 'Reportes de Saldos y Actividad'; ?></h3>
        </div>
        
        <div class="table-container">
            <table class="table table-mercantil">
                <thead>
                    <tr>
                        <th><?php echo isset($lang['report_name']) ? $lang['report_name'] : 'Nombre del Reporte'; ?></th>
                        <th><?php echo isset($lang['description']) ? $lang['description'] : 'Descripción'; ?></th>
                        <th class="actions-column"><?php echo isset($lang['actions']) ? $lang['actions'] : 'Acciones'; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fila 1 -->
                    <tr class="animate-row">
                        <td class="text-left">
                            <div class="report-name">
                                <i class="fa fa-building report-icon"></i>
                                <?php echo isset($lang['balances_by_branch']) ? $lang['balances_by_branch'] : 'Saldos por Oficina'; ?>
                            </div>
                        </td>
                        <td class="text-left"><?php echo isset($lang['balances_by_branch_desc']) ? $lang['balances_by_branch_desc'] : 'Reporte de saldos consolidados por oficina y tipo de cuenta.'; ?></td>
                        <td class="text-center actions-cell">
                            <div class="action-buttons">
                                <a href="index.php?controller=reporte&action=saldosPorOficina" class="btn-action btn-view" title="<?php echo isset($lang['view_report']) ? $lang['view_report'] : 'Ver Reporte'; ?>">
                                    <i class="fa fa-chart-bar"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Fila 2 -->
                    <tr class="animate-row">
                        <td class="text-left">
                            <div class="report-name">
                                <i class="fa fa-file-alt report-icon"></i>
                                <?php echo isset($lang['account_activity']) ? $lang['account_activity'] : 'Actividad de Cuenta'; ?>
                            </div>
                        </td>
                        <td class="text-left"><?php echo isset($lang['account_activity_desc']) ? $lang['account_activity_desc'] : 'Historial detallado de actividades para todas las cuentas en un período seleccionado.'; ?></td>
                        <td class="text-center actions-cell">
                            <div class="action-buttons">
                                <a href="index.php?controller=reporte&action=actividadCuentas" class="btn-action btn-view" title="<?php echo isset($lang['view_report']) ? $lang['view_report'] : 'Ver Reporte'; ?>">
                                    <i class="fa fa-chart-bar"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Fila 3 -->
                    <tr class="animate-row">
                        <td class="text-left">
                            <div class="report-name">
                                <i class="fa fa-chart-line report-icon"></i>
                                <?php echo isset($lang['executive_summary']) ? $lang['executive_summary'] : 'Resumen Ejecutivo'; ?>
                            </div>
                        </td>
                        <td class="text-left"><?php echo isset($lang['executive_summary_desc']) ? $lang['executive_summary_desc'] : 'Resumen general de estadísticas e indicadores clave para la gerencia.'; ?></td>
                        <td class="text-center actions-cell">
                            <div class="action-buttons">
                                <a href="index.php?controller=reporte&action=resumenEjecutivo" class="btn-action btn-view" title="<?php echo isset($lang['view_report']) ? $lang['view_report'] : 'Ver Reporte'; ?>">
                                    <i class="fa fa-chart-bar"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Sección: Reportes de Rendimiento y Auditoría -->
        <div class="section-header">
            <h3><?php echo isset($lang['performance_audit_reports']) ? $lang['performance_audit_reports'] : 'Reportes de Rendimiento y Auditoría'; ?></h3>
        </div>
        
        <div class="table-container">
            <table class="table table-mercantil">
                <thead>
                    <tr>
                        <th><?php echo isset($lang['report_name']) ? $lang['report_name'] : 'Nombre del Reporte'; ?></th>
                        <th><?php echo isset($lang['description']) ? $lang['description'] : 'Descripción'; ?></th>
                        <th class="actions-column"><?php echo isset($lang['actions']) ? $lang['actions'] : 'Acciones'; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fila 1 -->
                    <tr class="animate-row">
                        <td class="text-left">
                            <div class="report-name">
                                <i class="fa fa-cube report-icon"></i>
                                <?php echo isset($lang['product_performance']) ? $lang['product_performance'] : 'Rendimiento por Producto'; ?>
                            </div>
                        </td>
                        <td class="text-left"><?php echo isset($lang['product_performance_desc']) ? $lang['product_performance_desc'] : 'Análisis de rendimiento para cada producto financiero ofrecido por el banco.'; ?></td>
                        <td class="text-center actions-cell">
                            <div class="action-buttons">
                                <a href="index.php?controller=reporte&action=rendimientoProductos" class="btn-action btn-view" title="<?php echo isset($lang['view_report']) ? $lang['view_report'] : 'Ver Reporte'; ?>">
                                    <i class="fa fa-chart-bar"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Fila 2 -->
                    <tr class="animate-row">
                        <td class="text-left">
                            <div class="report-name">
                                <i class="fa fa-shield-alt report-icon"></i>
                                <?php echo isset($lang['system_audit']) ? $lang['system_audit'] : 'Auditoría del Sistema'; ?>
                            </div>
                        </td>
                        <td class="text-left"><?php echo isset($lang['system_audit_desc']) ? $lang['system_audit_desc'] : 'Registro de todas las operaciones y cambios realizados en el sistema por usuario.'; ?></td>
                        <td class="text-center actions-cell">
                            <div class="action-buttons">
                                <a href="index.php?controller=reporte&action=auditoriaSistema" class="btn-action btn-view" title="<?php echo isset($lang['view_report']) ? $lang['view_report'] : 'Ver Reporte'; ?>">
                                    <i class="fa fa-chart-bar"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Fila 3 -->
                    <tr class="animate-row">
                        <td class="text-left">
                            <div class="report-name">
                                <i class="fa fa-star report-icon"></i>
                                <?php echo isset($lang['service_metrics']) ? $lang['service_metrics'] : 'Métricas de Servicio'; ?>
                            </div>
                        </td>
                        <td class="text-left"><?php echo isset($lang['service_metrics_desc']) ? $lang['service_metrics_desc'] : 'Estadísticas de calidad de servicio y satisfacción del cliente en todas las sucursales.'; ?></td>
                        <td class="text-center actions-cell">
                            <div class="action-buttons">
                                <a href="index.php?controller=reporte&action=metricasServicio" class="btn-action btn-view" title="<?php echo isset($lang['view_report']) ? $lang['view_report'] : 'Ver Reporte'; ?>">
                                    <i class="fa fa-chart-bar"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
/* Estilos específicos para la vista de reportes */

/* Sección de reportes */
.section-header {
    background-color: #f2ffe0;
    padding: 12px 20px 12px 45px;
    margin: 30px 0 15px 0;
    border-radius: 4px;
    border-left: 4px solid #0a6c0a;
    font-weight: 600;
    color: #0a6c0a;
    position: relative;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

.section-header:before {
    content: '\f0c0';  /* Icon para la primera sección */
    font-family: 'Font Awesome 5 Free', FontAwesome;
    font-weight: 900;
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1.2rem;
    opacity: 0.8;
    color: #0a6c0a;
}

.section-header:nth-of-type(2):before {
    content: '\f24e';  /* Icon para la segunda sección */
}

.section-header:nth-of-type(3):before {
    content: '\f201';  /* Icon para la tercera sección */
}

.section-header::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(10, 108, 10, 0.1), transparent);
    animation: sectionHeaderShine 3s ease-in-out infinite;
}

@keyframes sectionHeaderShine {
    0% { left: -100%; }
    50% { left: 100%; }
    100% { left: 100%; }
}

.section-header h3 {
    margin: 0;
    font-size: 1.2rem;
}

/* Botón de impresión */
.btn-print {
    background-color: #6c757d;
    color: white;
    border-radius: 4px;
    padding: 8px 15px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    text-decoration: none;
    border: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.btn-print i {
    font-size: 1.1rem;
}

.btn-print:hover {
    background-color: #5a6268;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.btn-print:active {
    transform: translateY(0);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

/* Alineación del texto */
.text-left {
    text-align: left;
}

/* Estilo para el nombre del reporte con icono */
.report-name {
    display: flex;
    align-items: center;
    font-weight: 600;
    color: #0a6c0a;
}

.report-icon {
    color: #0a6c0a;
    margin-right: 10px;
    font-size: 1.2rem;
    opacity: 0.7;
    transition: all 0.3s ease;
}

tr:hover .report-icon {
    opacity: 1;
    transform: scale(1.2);
    animation: pulseIcon 1s infinite alternate;
}

@keyframes pulseIcon {
    0% { transform: scale(1.1); }
    100% { transform: scale(1.3); }
}

/* Botón para ver reporte */
.btn-view {
    background-color: #0a6c0a;
    color: white;
    position: relative;
    overflow: hidden;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 3px 8px rgba(8, 88, 9, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.btn-view::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: all 0.6s ease;
}

.btn-view:hover {
    background-color: #085809;
    transform: translateY(-2px) rotate(5deg);
}

.btn-view:hover::before {
    left: 100%;
}

.btn-view i {
    font-size: 1.1rem;
    color: white;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

/* Estilo para la tabla de reportes */
.table-container + .section-header {
    margin-top: 40px;
}

/* Ajuste para mejorar el espaciado en la tabla */
.table-mercantil {
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    border: 1px solid #eaeaea;
    background-color: white;
    width: 100%;
}

.table-mercantil thead {
    background-color: #f8f9fa;
}

.table-mercantil th {
    border-bottom: 2px solid #0a6c0a;
    color: #0a6c0a;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
    padding: 15px 12px;
    letter-spacing: 0.5px;
}

.table-mercantil td {
    padding: 15px 12px;
    border-bottom: 1px solid #f0f0f0;
}

.table-mercantil tr:last-child td {
    border-bottom: none;
}

.table-mercantil tr:nth-child(even) {
    background-color: #f9fff9;
}

/* Animación mejorada para aparecer filas */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-row {
    animation: fadeInUp 0.4s ease forwards;
    opacity: 0;
}

/* Mejorar la alerta con animación */
.alert-mercantil {
    background-color: #f2ffe0;
    border-left: 4px solid #0a6c0a;
    color: #0a6c0a;
    padding: 15px 35px 15px 15px;
    border-radius: 4px;
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(10, 108, 10, 0.1);
    position: sticky;
    top: 0;
    z-index: 100;
}

.alert-mercantil::after {
    content: '\f05a'; /* FontAwesome icon for info */
    font-family: 'Font Awesome 5 Free', FontAwesome;
    font-weight: 900;
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1.2rem;
    opacity: 0.7;
    animation: pulse 2s infinite;
}

.alert-mercantil::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 200%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(10, 108, 10, 0.05), transparent);
    animation: alertGlow 4s ease-in-out infinite;
}

@keyframes pulse {
    0% { transform: translateY(-50%) scale(1); }
    50% { transform: translateY(-50%) scale(1.1); }
    100% { transform: translateY(-50%) scale(1); }
}

@keyframes alertGlow {
    0% { left: -100%; }
    50% { left: 0; }
    100% { left: 100%; }
}

/* Animar las filas de la tabla cuando se hace hover */
tr.animate-row {
    transition: all 0.3s ease;
}

tr.animate-row:hover {
    background-color: rgba(10, 108, 10, 0.05);
    transform: translateX(5px);
    box-shadow: -5px 0 10px -5px rgba(10, 108, 10, 0.2);
}

/* Media queries para responsividad */
@media (max-width: 992px) {
    .header-buttons {
        flex-wrap: wrap;
    }
    
    .report-name {
        font-size: 0.9rem;
    }
    
    .section-header h3 {
        font-size: 1.1rem;
    }
}

@media (max-width: 768px) {
    .table-mercantil td {
        padding: 12px 8px;
        font-size: 0.9rem;
    }
    
    .report-icon {
        font-size: 1rem;
        margin-right: 5px;
    }
    
    .section-header h3 {
        font-size: 1rem;
    }
}

@media print {
    .section-header {
        background-color: #f8f9fa !important;
        color: #000 !important;
        border-left: 2px solid #0a6c0a;
    }
    
    .section-header::after {
        display: none;
    }
    
    .report-icon {
        color: #000 !important;
    }
    
    .btn-action {
        display: none !important;
    }
    
    .animate-row:hover {
        transform: none;
        box-shadow: none;
    }
}

/* Animación para el encabezado de la tarjeta */
.card-header {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #0a6c0a 0%, #0d8f0d 100%);
}

.card-header::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 150px;
    height: 150px;
    background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cpath fill='%23ffffff' fill-opacity='0.05' d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z'/%3E%3C/svg%3E");
    opacity: 0.5;
}

.card-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: -100%;
    width: 200%;
    height: 2px;
    background: linear-gradient(90deg, transparent, #ffd700, transparent);
    animation: headerUnderline 3s ease-in-out infinite;
}

@keyframes headerUnderline {
    0% { left: -100%; }
    50% { left: 0; }
    100% { left: 100%; }
}

/* Animar el título */
.title-with-line {
    display: flex;
    align-items: center;
    margin: 0;
    position: relative;
    padding-left: 15px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.title-with-line::before {
    content: '\f0ce'; /* FontAwesome icon for table */
    font-family: 'Font Awesome 5 Free', FontAwesome;
    font-weight: 900;
    margin-right: 12px;
    font-size: 1.2rem;
    color: #ffd700;
    text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
}

.title-with-line::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 60px;
    height: 3px;
    background-color: #ffd700;
    transition: width 0.3s ease;
    box-shadow: 0 0 8px rgba(255, 215, 0, 0.5);
}

.title-with-line:hover::after {
    width: 100px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Asignar retrasos de animación a las filas
    const rows = document.querySelectorAll('.animate-row');
    rows.forEach((row, index) => {
        const sectionIndex = Math.floor(index / 3);
        const rowInSection = index % 3;
        row.style.animationDelay = `${0.3 + (sectionIndex * 0.2) + (rowInSection * 0.1)}s`;
    });
    
    // Efectos de hover para las filas
    rows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transition = 'transform 0.2s ease, box-shadow 0.2s ease';
            this.style.zIndex = '1';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.zIndex = 'auto';
        });
    });
    
    // Animar la alerta al cargar
    const alertBox = document.querySelector('.alert-mercantil');
    if (alertBox) {
        alertBox.style.animation = 'fadeInUp 0.5s ease forwards';
    }
    
    // Animar los encabezados de sección
    const sectionHeaders = document.querySelectorAll('.section-header');
    sectionHeaders.forEach((header, index) => {
        header.style.opacity = '0';
        header.style.animation = `fadeInUp 0.5s ease ${0.3 + (index * 0.1)}s forwards`;
    });
    
    // Efecto ripple para botones
    const actionButtons = document.querySelectorAll('.btn-action');
    actionButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const x = e.clientX - e.target.getBoundingClientRect().left;
            const y = e.clientY - e.target.getBoundingClientRect().top;
            
            const ripple = document.createElement('span');
            ripple.style.position = 'absolute';
            ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.7)';
            ripple.style.borderRadius = '50%';
            ripple.style.width = '5px';
            ripple.style.height = '5px';
            ripple.style.top = y + 'px';
            ripple.style.left = x + 'px';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s linear';
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});

</script>