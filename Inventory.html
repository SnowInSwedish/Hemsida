<?php
$shoppingListFile = 'shopping_list.txt';

function loadShoppingList() {
    global $shoppingListFile;
    if (file_exists($shoppingListFile)) {
        return file($shoppingListFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }
    return array();
}

function saveShoppingList($list) {
    global $shoppingListFile;
    file_put_contents($shoppingListFile, implode(PHP_EOL, $list));
}

$shoppingList = loadShoppingList();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addItem"])) {
        $item = $_POST["item"];
        if (!empty($item)) {
            $shoppingList[] = $item;
            saveShoppingList($shoppingList);
        }
    } elseif (isset($_POST["removeItem"])) {
        array_pop($shoppingList);
        saveShoppingList($shoppingList);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Shopping List</title>
</head>
<body>
<h1>Shopping List</h1>
<ul id="shoppingList">
<?php
foreach ($shoppingList as $item) {
    echo "<li>$item</li>";
}
?>
</ul>
<form method="post">
  <label for="item">Add Item:</label>
  <input type="text" id="item" name="item">
  <button type="submit" name="addItem">Add Item</button>
</form>
<form method="post">
  <button type="submit" name="removeItem">Remove Item</button>
</form>
</body>
</html>
