<?php
// Conectare la baza de date
$conn = new mysqli("localhost", "root", "", "blog");

// Verifică dacă formularul a fost trimis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    // Adaugă articolul în baza de date
    $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();

    // Redirecționează înapoi la index.php
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Add a New Post</h1>
        <a href="index.php">Back to Blog</a>
    </header>
    <main>
        <form action="create_post.php" method="POST">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
            <label for="content">Content:</label>
            <textarea name="content" id="content" rows="10" required></textarea>
            <button type="submit">Add Post</button>
        </form>
    </main>
</body>
</html>
