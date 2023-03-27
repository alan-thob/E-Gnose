<?php

interface AuthStrategy {
    public function authenticate(string $username, string $password): bool;
}

class DatabaseAuth implements AuthStrategy {
    public function authenticate(string $username, string $password): bool {
        // Vérifie les informations d'identification dans la base de données et retourne true si elles sont valides
    }
}

class LDAPAuth implements AuthStrategy {
    public function authenticate(string $username, string $password): bool {
        // Vérifie les informations d'identification dans le serveur LDAP et retourne true si elles sont valides
    }
}

class Login {
    private $authStrategy;

    public function setAuthStrategy(AuthStrategy $authStrategy) {
        $this->authStrategy = $authStrategy;
    }

    public function authenticate(string $username, string $password): bool {
        return $this->authStrategy->authenticate($username, $password);
    }
}

// Utilisation de la classe Login et de la stratégie d'authentification appropriée en fonction de la configuration de l'application

if ($config['auth_strategy'] === 'database') {
    $authStrategy = new DatabaseAuth();
} else if ($config['auth_strategy'] === 'ldap') {
    $authStrategy = new LDAPAuth();
}

$login = new Login();
$login->setAuthStrategy($authStrategy);

if (isset($_POST['user_email']) && isset($_POST['user_password'])) {
    if ($login->authenticate($_POST['user_email'], $_POST['user_password'])) {
        // Redirige l'utilisateur vers la page d'accueil s'il est authentifié avec succès
        header('Location: ../index.php');
        exit();
    } else {
        // Affiche un message d'erreur si l'authentification échoue
        $error = 'Nom d\'utilisateur ou mot de passe invalide';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de connexion</title>
</head>
<body>
    <h1>Page de connexion</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="user_email">email :</label>
        <input type="text" id="user_email" name="username"><br>
        <label for="user_password">Mot de passe :</label>
        <input type="password" id="user_password" name="user_password"><br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>