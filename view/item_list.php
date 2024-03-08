<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" type="text/css" href="view/css/main.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <h2>To-Do Items</h2>
    <?php if (!empty($items)): ?>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>&nbsp;</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['Title']); ?></td>
                <td><?= htmlspecialchars($item['Description']); ?></td>
                <td><?= htmlspecialchars($item['categoryName'] ?? 'Uncategorized'); ?></td>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="delete_item">
                        <input type="hidden" name="item_id" value="<?= $item['ItemNum']; ?>">
                        <input type="submit" value="Remove">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>No to-do items have been added yet.</p>
    <?php endif; ?>

    <div class="links">
    <a href="index.php?action=add_item_form">Add New Item</a>
<br>
        <a href="index.php?action=list_categories">View/Edit Categories</a>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
