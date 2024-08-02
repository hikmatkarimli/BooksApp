<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .edit-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-right: 5px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Books</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="categories.php">Categories</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Book Management</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Author ID</th>
                <th>Title</th>
                <th>Category ID</th>
                <th>Intro</th>
                <th>Is Active</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT id, author_id, title, category_id, intro, is_active FROM books";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row["id"]}</td>
                            <td>{$row["author_id"]}</td>
                            <td>{$row["title"]}</td>
                            <td>{$row["category_id"]}</td>
                            <td>{$row["intro"]}</td>
                            <td>" . ($row["is_active"] ? 'Yes' : 'No') . "</td>
                            <td>
                                <a class='edit-btn' href='edit_book.php?id={$row["id"]}'>Edit</a>
                                <a class='delete-btn' href='delete_book.php?id={$row["id"]}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No books found</td></tr>";
            }
            ?>
        </table>
    </main>
</body>

</html>