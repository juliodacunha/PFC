<?php
session_start();
require('funcoes/Login.php');
if (isset($_SESSION['email'])) {
    header('Location: paginas/perfil.php');
} else {
    header('Location: paginas/login.php');
}
?>

<html>
<body>

</body>
</html>


