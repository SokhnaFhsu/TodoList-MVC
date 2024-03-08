<?php
require_once('database.php');

function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll();
}

function add_category($categoryName) {
    global $db;
    $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $categoryName);
    $statement->execute();
    $statement->closeCursor();
}

function delete_category($categoryId) {
    global $db;
    $query = 'DELETE FROM categories WHERE categoryID = :categoryId';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryId', $categoryId);
    $statement->execute();
    $statement->closeCursor();
}
?>
