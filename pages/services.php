<section class="content">
    <div class="container-fluid">
        <h2 class="text-center">🛠️ Nuestros Servicios</h2>
        <p class="text-center">Soluciones tecnológicas para todos tus dispositivos.</p>

        <div class="row">
            <?php 
            $services = [
                ["🖥️", "Ensamblaje de PCs", "Construimos computadoras personalizadas según tu presupuesto."],
                ["🔧", "Reparación y Mantenimiento", "Diagnóstico y solución de problemas en PCs, laptops y consolas."],
                ["🚀", "Upgrade de Hardware", "Mejoramos componentes como RAM, SSD y tarjetas gráficas."],
                ["💻", "Instalación de Software", "Instalamos Windows, Linux y software especializado."],
                ["🎮", "Configuración de Equipos Gaming", "Optimizamos tu PC para máximo rendimiento."],
                ["📶", "Redes y Conectividad", "Configuramos routers, WiFi y redes empresariales."]
            ];
            
            foreach ($services as $service) {
                echo "
                <div class='col-md-4'>
                    <div class='card'>
                        <div class='card-body text-center'>
                            <h1>{$service[0]}</h1>
                            <h5>{$service[1]}</h5>
                            <p>{$service[2]}</p>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</section>
