<?php
// Conectare la baza de date
$conn = new mysqli("localhost", "root", "", "blog");

// Verifică conexiunea
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obține articolele din baza de date
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to My Blog</h1>
        <a href="create_post.php">Add New Post</a>
    </header>
    <main>
        <?php while ($row = $result->fetch_assoc()): ?>
            <article>
                <h2><?= htmlspecialchars($row['title']); ?></h2>
                <p><?= nl2br(htmlspecialchars($row['content'])); ?></p>
                <small>Posted on <?= $row['created_at']; ?></small>
            </article>
        <?php endwhile; ?>
    </main>
</body>
</html>
