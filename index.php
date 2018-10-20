<?php
function __autoload($class_name)
{
    require_once $class_name . '.php';
}

/* Pana aici folosim conectarea la BD $db in constructorul clasului la care avem neovie sa ne conectam la bd
    Dar daca avem 100 de clase ? in fiecare 100 va trebuie sa introducem in constructor $db pt conectare
Pentru aceasta este patternul Singleton  care il realizam in clasul Db */

//$db = new PDO('mysql:host=localhost;dbname=scoala', 'root', ''); // conectarea la BD
$products = new DB();
//
//$products->insertUser();
//$products->deleteUser();
if($_GET['id']){
    $products->deleteUser($_GET['id']);
}

$file = new Strategy(new File());
$db = new Strategy(new DB());
echo $file->getUser('Alex');
echo $db->getUser('Alex');
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<table style="width:25%">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php foreach ($products->getAllUser() as $user) { ?>
    <tr>
        <td> <?php echo $user['name'] ?></td>
        <td> <?php echo $user['email'] ?></td>
        <td><a href="?id=<?=$user['id']?>">Sterge</a></td>
    </tr>
        <?php  } ?>
</table>

<br><br>

<?php if ($_POST['name'] && $_POST['email']) {
        $products->insertUser($_POST['name'], $_POST['email']);
} ?>
<form action="" method="post">
    <input type="text" name="name" placeholder="Numele">
    <input type="text" name="email" placeholder="Email">
    <select name="storage">
        <option value="1">Baza de date</option>
        <option value="2">Fisier</option>
    </select>

    <input type="submit" value="Trimite">
</form>
</body>
</html>



