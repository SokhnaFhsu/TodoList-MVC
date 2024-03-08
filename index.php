<?php
require('model/database.php');
require('model/item_db.php');
require('model/category_db.php');

$action = filter_input(INPUT_POST, 'action') ?: filter_input(INPUT_GET, 'action') ?: 'list_items';
switch ($action) {
    case 'list_items':
        $items = get_all_items();
        $categories = get_categories(); 
        include('view/item_list.php');
        break;

    case 'add_item_form':
        $categories = get_categories(); 
        include('view/add_item_form.php');
        break;

    case 'add_item':
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        if ($title && $description && $category_id) {
            add_item($title, $description, $category_id);
            header("Location: index.php");
        } else {
            $error = "Invalid item data. Check all fields and try again.";
            include('view/error.php');
        }
        break;

    case 'delete_item':
        $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
        delete_item($item_id);
        header("Location: index.php");
        break;

    case 'list_categories':
        $categories = get_categories();
        include('view/category_list.php');
        break;

    case 'add_category_form':
        include('view/add_category_form.php');
        break;

    case 'add_category':
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
        if ($categoryName) {
            add_category($categoryName);
            header("Location: index.php?action=list_categories");
        } else {
            $error = "Invalid category name.";
            include('view/error.php');
        }
        break;

    case 'delete_category':
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        delete_category($category_id);
        header("Location: index.php?action=list_categories");
        break;

    default:
        $error = "Unknown action: $action";
        include('view/error.php');
        break;
}
?>
