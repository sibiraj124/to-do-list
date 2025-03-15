
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="homepagestyle.css">
</head>
<body>
    <header>
     <div>   <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1></div>
    <div><a href="login.html">Logout</a></div>
</header>
    <div class="container">
    <div class="to-do-app">
        <h2>TO-DO-LIST<img src=""></h2>
        <div class="row">
            <input type="text" id="input-box" placeholder="Add your Task">
            <button onclick="addTask()">Add</button>
        </div>
        <ul id="list-container">
           <!-- <li class="checked">Task1</li>
            <li>Task2</li>
            <li>Task3</li>-->
        </ul>
    </div>
</div>
<script src="script.js"></script>


</body>
</html>
