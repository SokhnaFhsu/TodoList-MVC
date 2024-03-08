<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New To-Do Item</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <h2>Add New Item</h2>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_item">

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description">
        </div>

        <div>
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                <option value="">Select Category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['categoryID']; ?>">
                        <?= htmlspecialchars($category['categoryName']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-actions">
            <input type="submit" value="Add Item">
        </div>
    </form>

    
    <p><a href="index.php?action=list_items">View To-Do List</a></p>
    <?php include 'footer.php'; ?>
</body>
</html>
