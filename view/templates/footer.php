<footer>
    <div class="columns-footer">
        <div class="column-festival">
            <ul class="lista">
                <li class="footer-list-item-header">
                    <div class="footer-header">FESTIVAL</div>
                </li>
                <li class="footer-list-item"><a href="index.php?action=MainHome">Home</a></li>
                <li class="footer-list-item"><a href="index.php?action=AcercaDe">Acerca de</a></li>
                <li class="footer-list-item"><a href="index.php?action=Experiencia">Experiencia</a></li>
                <li class="footer-list-item"><a href="index.php?action=Servicios">Servicios</a></li>
                <li class="footer-list-item"><a href="index.php?action=Programacion">Programacion</a></li>
            </ul>
        </div>

        <div class="column-contactanos">
            <ul class="lista">
                <li class="footer-list-item-header">
                    <div class="footer-header">AYUDA</div>
                </li>
                <li class="footer-list-item"><a href="mailto:festival@hotmail.com">Contacto</a></li>
            </ul>
        </div>

        <div class="column-social">
            <div class="footer-social">
                <ul class="lista">
                    <li class="footer-list-item-header">
                        <div class="footer-header">SOCIAL</div>
                    </li>
                </ul>
                <div class="logos">
                    <a href="https://www.instagram.com/?hl=es-la" target="_blank"><img src="<?php echo IMAGE_PATH; ?>instagram-logo.png" alt="instagram-logo"></a>
                    <a href="https://www.facebook.com/" target="_blank"><img src="<?php echo IMAGE_PATH; ?>facebook-logo.png" alt="facebook-logo"></a>
                    <a href="https://x.com/home?lang=es" target="_blank"><img src="<?php echo IMAGE_PATH; ?>twitter-logo.png" alt="twitter-logo"></a>
                    <a href="https://www.youtube.com/" target="_blank"><img src="<?php echo IMAGE_PATH; ?>youtube-logo.png" alt="youtube-logo"></a>
                </div>
            </div>
        </div>

        <div class="footer-form">
            <ul class="lista">
                <li class="footer-list-item-header">
                    <div class="footer-header">SUSCRIBITE AL NEWSLETTER</div>
                </li>
            </ul>
            <div class="footer-form-item">
                <form id="form-suscribir" name="form-suscribir">
                    <div>
                        <label for="correo"></label>
                        <input type="text" name="correo" id="correo" class="form-item" placeholder="Ingrese su correo">
                    </div>
                    <div class="form-submit-btn">
                        <input type="submit" name="enviar" id="btnEnviar" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let formulario = document.getElementById("form-suscribir");

            formulario.addEventListener('submit', function(e) {
                e.preventDefault();
                let txtCorreo = formulario.correo.value;
                var correoValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                limpiarMensajes();

                // Validar correo electrónico   
                if (txtCorreo === "") {       
                    Mensaje("Correo requerido", formulario.correo);     
                } else if (!correoValido.test(txtCorreo)) {         
                    Mensaje("Correo inválido", formulario.correo);       
                } else {          
                    alert("Formulario de suscripción enviado correctamente");
                    formulario.submit();           
                    formulario.reset();         
                }
            });

            function Mensaje(mensaje, elemento) {
                elemento.focus();
                let mensajeError = document.createElement("span");
                mensajeError.textContent = mensaje;
                mensajeError.className = "mensajeError";
                elemento.parentNode.insertBefore(mensajeError, elemento.nextSibling);
            }

            function limpiarMensajes() {
                let mensajesError = document.querySelectorAll(".mensajeError");
                mensajesError.forEach(mensaje => mensaje.remove());
            }
        });
    </script>
</footer>
