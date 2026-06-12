<?php
require_once 'db.php';

$name = isset($_POST['name']) ? $_POST['name'] : 
        (isset($_POST['namemod']) ? $_POST['namemod'] : 
        (isset($_POST['namesup']) ? $_POST['namesup'] : ''));

$phone = isset($_POST['phone']) ? $_POST['phone'] : 
         (isset($_POST['phonemod']) ? $_POST['phonemod'] : 
         (isset($_POST['phonesup']) ? $_POST['phonesup'] : ''));

$model = isset($_POST['model']) ? $_POST['model'] : 
         (isset($_POST['modelmod']) ? $_POST['modelmod'] : '');

$desc = isset($_POST['messagebell']) ? $_POST['messagebell'] : 
        (isset($_POST['messagesup']) ? $_POST['messagesup'] : '');

$sql = "INSERT INTO swiftorder (name, num, model, description) 
        VALUES ('$name', '$phone', '$model', '$desc')";
$conn->query($sql);
$last_id = $conn->insert_id;
$conn->close();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заявка отправлена</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
            crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
        <link rel="icon" href="img/logoSF.svg" />
        <link rel="stylesheet" href="styles/styles.css?v=1.2" />
    <style>
    body {
        background-color: #F3F2F1;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

main {
    flex: 1 0 auto;
}

footer {
    flex-shrink: 0;
}
.finish {
    border: solid 2px #3e4751
}
    
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-header">
            <div class="container-fluid">
                <a class="logo" href="#"> SWIFT FIX </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse menu" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="servies.html#services">Цены и запись</a>
                        <a class="nav-link" href="index.html#reviews">Отзывы</a>
                        <a class="nav-link" href="regist.html#info">О нас</a>
                    </div>
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="order.php">Отследить ремонт</a>
                        <a class="nav-link" href="regist.html#form-info">Задать вопрос</a>
                        <a class="nav-link" href="regist.html#info">+7(983)-523-55-34</a>
                    </div>
                </div>
            </div>
        </nav>
        
        <main>
            <section class="finish">
        <div style="display:flex; justify-content: space-around; flex-wrap: wrap; margin-bottom: 30px;">
            <a class="btn" style="text-decoration: none; text-align:center;" href="index.html">Вернуться на сайт</a>
            <a class="btn" style="text-decoration: none; text-align:center;" href="order.php">Отследить ремонт</a>

</div>
        <h3>Отлично!</h3>
        <h3>Номер вашей заявки: <?php echo $last_id; ?></h3>
        <h3>Перезвоним вам в течении получаса</h3>
    </section>
        </main>
    
    
    
    <footer>
            <div class="footer-info">
                <a class="logo" href="#"> SWIFT FIX </a>
                <p>Не нашли что искали?<br />Напишите нам и мы вам поможем!</p>
                <div class="footer-social">
                    <a href="https://ok.ru/"><img src="img/Odnoklassniki.svg" alt="ОК" /></a>
                    <a href="https://m.vk.com/"><img src="img/vkLogo.svg" alt="ВКонтакте" /></a>
                    <a href="https://max.ru/"><img src="img/Max_logo.svg" alt="MAX" /></a>
                </div>
            </div>
        </footer>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
</body>
</html>