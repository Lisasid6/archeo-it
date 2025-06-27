<?php include("includes/header.php"); ?>
<main class="container">
    <h1 class="title">Inscription</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("includes/db.php");

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mode = $_POST['mode'];

        // Appel du script Python
        $output = shell_exec("python python/generate_password.py " . escapeshellarg($mode));
        $mot_de_passe = trim($output);

        // Stockage
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, password_hash($mot_de_passe, PASSWORD_DEFAULT)]);

        echo "<p style='color:green;'>Inscription réussie ! Votre mot de passe est : <strong>$mot_de_passe</strong></p>";
    }
    ?>

    <form method="post" class="form-contact" style="max-width:600px; margin:auto;">
        <input type="text" name="nom" placeholder="Nom" required><br>
        <input type="text" name="prenom" placeholder="Prénom" required><br>
        <input type="email" name="email" placeholder="Email" required><br>

        <label>Type de mot de passe :</label><br>
        <select name="mode" required>
            <option value="1">Alphabétique seulement</option>
            <option value="2">Alphabétique + Numérique</option>
            <option value="3">Alpha + Numérique + Spéciaux</option>
        </select><br><br>

        <button type="submit">S’inscrire</button>
    </form>
</main>
<?php include("includes/footer.php"); ?>