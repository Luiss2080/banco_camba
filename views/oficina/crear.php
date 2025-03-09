<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/styleCrear.css">
<div class="client-card">
    <div class="card-header">
        <h2 class="title-with-line"><?php echo $lang['new_branch'] ?? 'Nueva Oficina'; ?></h2>
    </div>
    <div class="card-body">
        <form id="form-oficina" method="POST" action="index.php?controller=oficina&action=guardar" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6">
                    <!-- Campo: Nombre -->
                    <div class="form-group">
                        <label for="nombre" class="form-label"><?php echo $lang['name'] ?? 'Nombre'; ?><span class="required">*</span></label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                        <div class="invalid-feedback">
                            <?php echo $lang['name_required'] ?? 'El nombre es obligatorio'; ?>
                        </div>
                    </div>
                    
                    <!-- Campo: Dirección -->
                    <div class="form-group">
                        <label for="direccion" class="form-label"><?php echo $lang['address'] ?? 'Dirección'; ?><span class="required">*</span></label>
                        <input type="text" id="direccion" name="direccion" class="form-control" required>
                        <div class="invalid-feedback">
                            <?php echo $lang['address_required'] ?? 'La dirección es obligatoria'; ?>
                        </div>
                    </div>
                    
                    <!-- Campo: Teléfono -->
                    <div class="form-group">
                        <label for="telefono" class="form-label"><?php echo $lang['phone'] ?? 'Teléfono'; ?></label>
                        <input type="text" id="telefono" name="telefono" class="form-control">
                    </div>
                    
                    <!-- Campo: Tipo de Oficina -->
                    <div class="form-group">
                        <label for="central" class="form-label"><?php echo $lang['branch_type'] ?? 'Tipo de Oficina'; ?></label>
                        <select id="central" name="central" class="form-control">
                            <option value="0"><?php echo $lang['branch'] ?? 'Agencia'; ?></option>
                            <option value="1"><?php echo $lang['central'] ?? 'Central'; ?></option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <!-- Campo: Ciudad -->
                    <div class="form-group">
                        <label for="ciudad" class="form-label"><?php echo $lang['city'] ?? 'Ciudad'; ?></label>
                        <input type="text" id="ciudad" name="ciudad" class="form-control" value="Santa Cruz de la Sierra">
                    </div>
                    
                    <!-- Campo: Departamento -->
                    <div class="form-group">
                        <label for="departamento" class="form-label"><?php echo $lang['department'] ?? 'Departamento'; ?></label>
                        <input type="text" id="departamento" name="departamento" class="form-control" value="Santa Cruz">
                    </div>
                    
                    <!-- Campo: País -->
                    <div class="form-group">
                        <label for="pais" class="form-label"><?php echo $lang['country'] ?? 'País'; ?></label>
                        <input type="text" id="pais" name="pais" class="form-control" value="Bolivia">
                    </div>
                    
                    <!-- Campo: Estado -->
                    <div class="form-group">
                        <label for="estado" class="form-label"><?php echo $lang['status'] ?? 'Estado'; ?></label>
                        <select id="estado" name="estado" class="form-control">
                            <option value="activa"><?php echo $lang['active'] ?? 'Activa'; ?></option>
                            <option value="inactiva"><?php echo $lang['inactive'] ?? 'Inactiva'; ?></option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <!-- Campo: Horario de Atención -->
                    <div class="form-group">
                        <label for="horarioAtencion" class="form-label"><?php echo $lang['opening_hours'] ?? 'Horario de Atención'; ?></label>
                        <input type="text" id="horarioAtencion" name="horarioAtencion" class="form-control" placeholder="Ej: Lunes a Viernes: 8:30 - 16:30, Sábados: 8:30 - 12:30">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <!-- Campo: Gerente o Encargado -->
                    <div class="form-group">
                        <label for="gerenteEncargado" class="form-label"><?php echo $lang['manager'] ?? 'Gerente o Encargado'; ?></label>
                        <input type="text" id="gerenteEncargado" name="gerenteEncargado" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <!-- Campo: Fecha de Inauguración -->
                    <div class="form-group">
                        <label for="fechaInauguracion" class="form-label"><?php echo $lang['inauguration_date'] ?? 'Fecha de Inauguración'; ?></label>
                        <input type="date" id="fechaInauguracion" name="fechaInauguracion" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><?php echo $lang['save'] ?? 'Guardar'; ?></button>
                <a href="index.php?controller=oficina&action=listar" class="btn btn-secondary"><?php echo $lang['cancel'] ?? 'Cancelar'; ?></a>
            </div>
        </form>
    </div>
</div>

<script>
// Validación del formulario con JavaScript
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-oficina');
    
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        
        form.classList.add('was-validated');
    });
    
    // Mejorar la experiencia de usuario en los campos
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        // Añadir clase cuando el campo recibe el foco
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('field-focus');
        });
        
        // Quitar la clase cuando pierde el foco
        input.addEventListener('blur', () => {
            input.parentElement.classList.remove('field-focus');
        });
    });
});
</script>