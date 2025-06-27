<?php include("includes/header.php"); ?>
<main class="container">
    <h1 class="title">Nos chantiers de fouilles</h1>
    <div class="news-grid">

        <?php
        include("includes/db.php");
        $stmt = $pdo->query("SELECT * FROM chantiers ORDER BY id DESC");

        while ($chantier = $stmt->fetch()) {
            echo '<div class="news-card">';
            echo '<img src="assets/images/' . $chantier['image'] . '" alt="chantier">';
            echo '<div class="news-content">';
            echo '<h2>' . $chantier['nom'] . '</h2>';
            echo '<p>' . $chantier['description'] . '</p>';
            echo '</div></div>';
        }
        ?>

    </div>
</main>
<?php include("includes/footer.php"); ?>