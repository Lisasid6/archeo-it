<?php include("includes/header.php"); ?>
<main class="container">
    <h1 class="title">Contactez-nous</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("includes/db.php");

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];

        $stmt = $pdo->prepare("INSERT INTO contacts (nom, prenom, email, sujet, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $sujet, $message]);

        echo "<p style='color: green;'>Message envoyé avec succès !</p>";
    }
    ?>

    <form method="post" class="form-contact" style="max-width:600px; margin:auto;">
        <input type="text" name="nom" placeholder="Nom" required><br>
        <input type="text" name="prenom" placeholder="Prénom" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <select name="sujet" required>
            <option value="">-- Sujet --</option>
            <option value="Demande d'infos">Demande d'infos</option>
            <option value="Demande de Rendez-vous">Demande de Rendez-vous</option>
            <option value="Autre">Autre</option>
        </select><br>
        <textarea name="message" placeholder="Votre message..." rows="5" required></textarea><br>
        <button type="submit">Envoyer</button>
    </form>
</main>
<?php include("includes/footer.php"); ?>