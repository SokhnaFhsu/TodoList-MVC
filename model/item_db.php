<?php
require_once('database.php');

function get_all_items() {
    global $db;
    $query = 'SELECT i.ItemNum, i.Title, i.Description, c.categoryName 
              FROM todoitems i 
              LEFT JOIN categories c ON i.categoryID = c.categoryID 
              ORDER BY i.ItemNum';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}


function get_items_by_category($category_id) {
    global $db;
    $query = 'SELECT i.ItemNum, i.Title, i.Description, c.categoryName FROM todoitems i INNER JOIN categories c ON i.categoryID = c.categoryID WHERE i.categoryID = :category_id ORDER BY i.ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function add_item($title, $description, $category_id) {
    global $db;
    $query = 'INSERT INTO todoitems (Title, Description, categoryID) VALUES (:title, :description, :category_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_item($item_id) {
    global $db;
    $query = 'DELETE FROM todoitems WHERE ItemNum = :item_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_id', $item_id);
    $statement->execute();
    $statement->closeCursor();
}
