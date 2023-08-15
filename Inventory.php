<?php
$host = 'localhost';
$dbname = 'shoppinglist';
$username = 'root';
$password = 'rootpassword';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

function loadShoppingList() {
    global $db;
    $stmt = $db->prepare("SELECT name FROM items");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function saveShoppingList($list) {
    global $db;
    $db->exec("DELETE FROM items");
    foreach ($list as $item) {
        $stmt = $db->prepare("INSERT INTO items (name) VALUES (?)");
        $stmt->execute([$item]);
    }
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
