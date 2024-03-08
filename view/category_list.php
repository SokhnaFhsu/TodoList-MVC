<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category List</title>
    <link rel="stylesheet" type="text/css" href="view/css/main.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <h2>Categories</h2>

    <?php if (!empty($categories)): ?>
        <table class="categories-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= htmlspecialchars($category['categoryName']); ?></td>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="delete_category">
                        <input type="hidden" name="category_id" value="<?= $category['categoryID']; ?>">
                        <input type="submit" value="Remove">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>No categories to display.</p>
    <?php endif; ?>

    <h2>Add Category</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_category">
        <div>
            <label for="categoryName">Name:</label>
            <input type="text" id="categoryName" name="categoryName" required>
        </div>
        <div>
            <input type="submit" value="Add Category">
        </div>
    </form>

    <p><a href="index.php?action=list_items">View To-Do List</a></p>

    <?php include 'footer.php'; ?>
</body>
</html>
