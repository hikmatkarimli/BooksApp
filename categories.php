<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Categories</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Categories</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="books.php">Books</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Category Management</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
            <?php
            $sql = "SELECT id, name FROM category";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No categories found</td></tr>";
            }
            ?>
        </table>
    </main>
</body>

</html>