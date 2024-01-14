<?php

$servername = "localhost";
$username = "user";
$email = $_POST['email'];
$password = $_POST['password'];
$dbname = "ecommerce";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    session_start();

    if (!isset($_SESSION['current_user'])) {
        header('Location: http://localhost:63342/views/login.php');
        exit;
    }

    $user = $_SESSION['current_user'];
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'create':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nome = $_POST['nome'];
                    $prezzo = $_POST['prezzo'];
                    $marca = $_POST['marca'];

                    $stmt = $conn->prepare("INSERT INTO product (nome, prezzo, marca) VALUES (:nome, :prezzo, :marca)");
                    $stmt->bindParam(':nome', $nome);
                    $stmt->bindParam(':prezzo', $prezzo);
                    $stmt->bindParam(':marca', $marca);
                    $stmt->execute();
                }
                break;

            case 'read':
                $stmt = $conn->prepare("SELECT * FROM product");
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($products as $product) {
                    echo 'ID: ' . $product['id'] . '<br>';
                    echo 'Nome: ' . $product['nome'] . '<br>';
                    echo 'Prezzo: ' . $product['prezzo'] . '<br>';
                    echo 'Marca: ' . $product['marca'] . '<br>';
                    echo '--------------------------------------<br>';
                }
                break;

            default:
                break;
        }
    }
    header('Location: http://localhost:63342/views/products/index.php');
    exit;

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn = null;
}

