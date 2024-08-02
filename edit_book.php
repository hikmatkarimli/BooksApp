<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $author_id = $_POST['author_id'];
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $intro = $_POST['intro'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    $sql = "UPDATE books SET author_id=?, title=?, category_id=?, intro=?, is_active=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isiisi", $author_id, $title, $category_id, $intro, $is_active, $id);

    if ($stmt->execute()) {
        header("Location: books.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, author_id, title, category_id, intro, is_active FROM books WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Edit Book</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="books.php">Books</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Edit Book Details</h2>
        <form action="edit_book.php" method="post">
            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
            <label for="author_id">Author ID:</label>
            <input type="number" name="author_id" value="<?php echo $book['author_id']; ?>" required><br>
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo $book['title']; ?>" required><br>
            <label for="category_id">Category ID:</label>
            <input type="number" name="category_id" value="<?php echo $book['category_id']; ?>" required><br>
            <label for="intro">Intro:</label>
            <textarea name="intro" required><?php echo $book['intro']; ?></textarea><br>
            <label for="is_active">Is Active:</label>
            <input type="checkbox" name="is_active" <?php echo $book['is_active'] ? 'checked' : ''; ?>><br>
            <input type="submit" value="Save">
        </form>
    </main>
</body>

</html>