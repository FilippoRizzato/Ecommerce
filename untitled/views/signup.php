<?php
?>
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

        <label for="Conferma Password">Conferma Password:</label>
        <input type="password" id="conferma_password" name="conferma_password" required><br>

        <input type="submit" value="Sign Up">
    </form>
    </body>
    </html>
