<?php
session_start();
$isLogged = isset($_SESSION['user']);
?>

<?php include("includes/header.php"); ?>

<main class="container">
    <h1 class="title">Les actualités d'Archéo-IT</h1>
    <div class="news-grid">

        <?php
        // Connexion à la BDD
        include("includes/db.php");
        $limit = $isLogged ? "" : "LIMIT 3";
        $query = $pdo->query("SELECT * FROM actualites ORDER BY date DESC $limit");

        while ($news = $query->fetch()) {
            echo '<div class="news-card">';
            echo '<img src="assets/images/' . $news['image'] . '" alt="Actu">';
            echo '<div class="news-content">';
            echo '<h2>' . $news['titre'] . '</h2>';
            echo '<p>' . $news['contenu'] . '</p>';
            echo '</div></div>';
        }
        ?>

    </div>
</main>

<?php include("includes/footer.php"); ?>