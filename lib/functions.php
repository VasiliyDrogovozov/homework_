<?php
function loginGet() {
    echo '<form method="post">
    <p><input type="text" placeholder="Login" name="login"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="submit"></p>
    </form>';
}
function registrationsGet() {
    echo '<form method="post">
    <p><input type="text" placeholder="New Login" name="newLogin"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="text" placeholder="Email" name="email"></p>
    <p><input type="submit"></p>
    </form>';
}
function login() {
$fileContent = file('/app/tmp/test.txt');


    $flag = false;
    for($i = 0; $i < count($fileContent); $i++) {
        
        $array = explode(' ', $fileContent[$i]);
        if($_POST['login'] == $array[0] && md5($_POST['password']) == $array[1]) { 
            $flag = true;
            
            $_SESSION['name'] = $_POST['login'];
            ?>
            <script type="text/javascript">

            location.replace("http://localhost:8011/");

            </script>
            <?php
            
        } 
    }
    if($flag == false) {
       echo '<a href="/?registrations">Зарегистрируйтесь </a>';
    }
}

function hello() {
    echo "<b>Hello, {$_SESSION['name']}!</b>"; 
}



function registrations() {
    $fileContent = file('/app/tmp/test.txt');
    $flag = false;
    for($i = 0; $i < count($fileContent); $i++) {
        $array = explode(' ', $fileContent[$i]);
        if($_POST['newLogin'] == $array[0] && $_POST['email'] == rtrim($array[2])) {
            $flag = true;
            registrationsGet(); 
            echo '<span>Ползователь с таким логиным и имейлом уже существует!</span>';
        } elseif($_POST['newLogin'] == $array[0]) {
            $flag = true;
            registrationsGet(); 
            echo '<span>Ползователь с таким логиным уже существует!</span>';
        } elseif($_POST['email'] == rtrim($array[2])){
            $flag = true;
            registrationsGet(); 
            echo '<span>Ползователь с таким email уже существует!</span>';
        } 

}
if($flag == false) {
    file_put_contents('/app/tmp/test.txt', $_POST['newLogin'] . ' ' . md5($_POST['password']) . ' ' . $_POST['email'] . PHP_EOL, FILE_APPEND);
?>
<script type="text/javascript">
location.replace("http://localhost:8011/?login");
</script>
<?php
}
}


