<!DOCTYPE html>
<html>
<head>
    <title>Registrazione</title>
</head>
<body>
<form action="../actions/signup.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="conferma_password">Conferma Password:</label>
    <input type="password" id="conferma_password" name="conferma_password" required><br>

    <label for="role_id">Ruolo:</label>
    <select id="role_id" name="role_id" required>
        <option value="1">Utente</option>
        <option value="2">Amministratore</option>
    </select><br>

    <input type="submit" value="Sign Up">
</form>
</body>
</html>


