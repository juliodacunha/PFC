<?php

if (isset($_SESSION['email'])) {
    echo "Welcome to the member's area, " . $_SESSION['nome'] . "!";
} else {
    header('Location: paginas/login.php');
}
?>

<html>
<body>

</body>
</html>


