<?php
session_start();
include("includes/db.php");
include("includes/header.php");
?>

<main class="container">
    <h1 class="title">Connexion</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $mdp = $_POST['mot_de_passe'];

        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($mdp, $user['mot_de_passe'])) {
            $_SESSION['user'] = $user['email'];
            echo "<p style='color:green;'>Connexion réussie !</p>";
            header("Location: index.php");
            exit;
        } else {
            echo "<p style='color:red;'>Email ou mot de passe incorrect</p>";
        }
    }
    ?>

    <form method="post" class="form-contact" style="max-width:600px; margin:auto;">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required><br>
        <button type="submit">Se connecter</button>
    </form>
</main>

<?php include("includes/footer.php"); ?>