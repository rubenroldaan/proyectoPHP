<div id="login">
    <h2 class="text-center">Iniciar sesión en Accidentao'</h2>
    <div class="container">
        <?php
            if (isset($data['msjError'])) {
                echo "<p style='color:red;text-align:center'>".$data['msjError']."</p>";
            }
            if (isset($data['msjInfo'])) {
                echo "<p style='color:blue;text-align:center'>".$data['msjInfo']."</p>";
            }
        ?>

        <form action="index.php" method="get" class="form_login">
            <input type="text" name="usr" placeholder="Usuario"><br><br>
            <input type="text" name="passwd" placeholder="Contraseña"><br><br>
            <input type="hidden" name="action" value="procesarLogin">
            <input type="submit" value="Iniciar sesión">
        </form>
    </div>
</div>