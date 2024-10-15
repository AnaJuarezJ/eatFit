<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html><?php
session_start();
include '../logica/conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["meal"])) {
    $selectedMeal = $_POST["meal"];
    $email = $_SESSION['email'] ?? ''; 

    $sql = "SELECT c.*, a.nombre AS nombre FROM comidas c JOIN alimento a ON c.id_alimento = a.id WHERE c.email = '".$email."' AND tiempo = '".$selectedMeal."'";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
     echo "<div>"; // class=\"recipe-modal\" id=\"recipeModa\>";
     echo "<span class=\"close-btn\" onclick=\"closeRecipeModal()\"><i class=\"fas fa-times-circle\"></i></span>";
     echo "<h3>".$selectedMeal."</h3>";

    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row["nombre"] . " ". $row["porcion"] . " gr </p>";
        echo "<br>";
        }
     echo "</div>";
    } else {
        echo "<span>No se encontraron alimentos</span>";
    }
    
    $conexion->close();
}
?>
