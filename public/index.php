<?php
session_start();
?>
<style>
    span{
        color: red;
        font-weight: bold;
    }
    a{
        text-decoration: none;
    }
    a:hover{
        text-decoration: underline;
        color:red;
    }
</style>
<?php
$i = $_SERVER['REQUEST_URI'];
switch ($i) {
    case "/":
        if($_SESSION == null){
            echo '<a href="/?login">Login</a>' . '<br>';
            echo '<a href="/?registrations">Registration</a>';
        } else{
            require('/app/lib/functions.php');
            hello();
        }
        break;
    case '/?login':
        require '/app/lib/login.php';
        break;
    case '/?registrations':
        require '/app/lib/registrations.php';
        break;
}