   <script>
        // Función para mostrar/ocultar fecha de regreso
        document.querySelectorAll('input[name="trip"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const fechaRegreso = document.querySelector('.fecha-regreso');
                if (this.value === 'one-way') {
                    fechaRegreso.style.display = 'none';
                    fechaRegreso.querySelector('input').removeAttribute('required');
                } else {
                    fechaRegreso.style.display = 'block';
                    fechaRegreso.querySelector('input').setAttribute('required', 'required');
                }
            });
        });

        // Función para cambiar pestañas de destinos
        function mostrarDestinos(tipo) {
            document.querySelectorAll('.dest-tab').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.destinations-grid').forEach(grid => grid.style.display = 'none');
            
            event.target.classList.add('active');
            document.getElementById('destinos-' + tipo).style.display = 'block';
        }

        // Función para buscar vuelo específico
        function buscarVueloEspecifico(origen, destino) {
            document.querySelector('input[name="origen"]').value = origen;
            document.querySelector('input[name="destino"]').value = destino;
            
            // Scroll al formulario de búsqueda
            document.querySelector('.search-form').scrollIntoView({ behavior: 'smooth' });
        }

        // Función para reservar vuelo
        function reservarVuelo(vueloId) {
            <?php if (isset($_SESSION['usuario_id'])): ?>
                window.location.href = 'reservar.php?vuelo_id=' + vueloId;
            <?php else: ?>
                alert('Debes iniciar sesión para reservar un vuelo');
                window.location.href = 'login-register.php';
            <?php endif; ?>
        }

        // Autocompletado para campos de origen y destino
        function setupAutocompletado(inputElement) {
            let timeout;
            inputElement.addEventListener('input', function() {
                clearTimeout(timeout);
                const valor = this.value;
                
                if (valor.length >= 2) {
                    timeout = setTimeout(() => {
                        fetch(`index.php?accion=buscar_ciudades&termino=${encodeURIComponent(valor)}`)
                            .then(response => response.json())
                            .then(ciudades => {
                                // Implementar dropdown de sugerencias
                                mostrarSugerencias(this, ciudades);
                            });
                    }, 300);
                }
            });
        }

        // Configurar autocompletado
        document.addEventListener('DOMContentLoaded', function() {
            setupAutocompletado(document.querySelector('input[name="origen"]'));
            setupAutocompletado(document.querySelector('input[name="destino"]'));
        });

        function mostrarSugerencias(input, ciudades) {
            // Remover dropdown existente
            const existingDropdown = document.querySelector('.sugerencias-dropdown');
            if (existingDropdown) {
                existingDropdown.remove();
            }

            if (ciudades.length === 0) return;

            // Crear nuevo dropdown
            const dropdown = document.createElement('div');
            dropdown.className = 'sugerencias-dropdown';
            dropdown.style.position = 'absolute';
            dropdown.style.backgroundColor = 'white';
            dropdown.style.border = '1px solid #ccc';
            dropdown.style.maxHeight = '200px';
            dropdown.style.overflowY = 'auto';
            dropdown.style.zIndex = '1000';
            dropdown.style.width = input.offsetWidth + 'px';

            ciudades.forEach(ciudad => {
                const item = document.createElement('div');
                item.textContent = `${ciudad.nombre} (${ciudad.codigo})`;
                item.style.padding = '10px';
                item.style.cursor = 'pointer';
                item.addEventListener('click', function() {
                    input.value = ciudad.nombre;
                    dropdown.remove();
                });
                item.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#f0f0f0';
                });
                item.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = 'white';
                });
                dropdown.appendChild(item);
            });

            input.parentNode.style.position = 'relative';
            input.parentNode.appendChild(dropdown);

            // Cerrar dropdown al hacer clic fuera
            document.addEventListener('click', function(e) {
                if (!input.parentNode.contains(e.target)) {
                    dropdown.remove();
                }
            }, { once: true });
        }
    </script>