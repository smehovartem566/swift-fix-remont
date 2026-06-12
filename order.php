<?php
require_once 'db.php';

$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$order_id = isset($_POST['order_id']) ? $_POST['order_id'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Поиск заказов</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
            crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
        <link rel="icon" href="img/logoSF.svg" />
    <link rel="stylesheet" href="styles/styles.css?v=1.2">
    <style>
    body{
        display: flex;
    flex-direction: column;
    min-height: 100vh;
    }
        .status-ready {
            color: green;
        }
        .status-process {
            color: red;
        }
        .order-table {
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
        }
        .table-header {
            background-color: #d6e2db;
        }
        .table-row {
            background-color: #e9e3dc;
        }
        th, td, h1, h2 {
            padding: 5px;
            text-align: center;
        }
        .form-def {
            flex-direction: column;
        }
        main {
    flex: 1 0 auto;
}

footer {
    flex-shrink: 0;
}
@media (max-width: 768px) {
    body {
        font-size: 0.7rem;
    }
    th, td, h1, h2 {
        padding: 4px;
    }
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
        <section>
    
    <div class="cont-form">
        <h1>Поиск заказов</h1>
        <form method="POST" class="form-def">
            <div class="header-form">
                <div class="group">
                <label>Номер телефона:</label>
                <input type="text" name="phone" value="<?= $phone ?>" required>
            </div>
            <div class="group">
                <label>ID заказа:</label>
                <input type="text" name="order_id" value="<?= $order_id ?>" required>
            </div>
                
            </div>
            <button type="submit" name="search" class="btn">Найти</button>
        </form>
        
    </div>
    
    <?php
    if (isset($_POST['search']) && $phone && $order_id) {
        $result = $conn->query("SELECT * FROM swiftorder WHERE id='$order_id' and num='$phone'");
        
        if ($result->num_rows > 0) {
            $order = $result->fetch_assoc();
            
            if ($order['num'] == $phone) {
                $status_class = $order['status'] == 1 ? 'status-ready' : 'status-process';
                $status_text = $order['status'] == 1 ? 'Готово' : 'В процессе';
                
                echo "
                <h2>Найден заказ:</h2>
                <table class='order-table'>
                    <tr class='table-header'>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Модель</th>
                        <th>Описание</th>
                        <th>Статус</th>
                    </tr>
                    <tr class='table-row'>
                        <td>" . $order['id'] . "</td>
                        <td>" . $order['name'] . "</td>
                        <td>" . $order['num'] . "</td>
                        <td>" . $order['model'] . "</td>
                        <td>" . $order['description'] . "</td>
                        <td class='$status_class'>$status_text</td>
                    </tr>
                </table>";
                
                $result2 = $conn->query("SELECT * FROM swiftorder WHERE num='$phone' ORDER BY id DESC");
                
                echo "
                <h2>Все заказы с номером " . $phone . ":</h2>
                <table class='order-table'>
                    <tr class='table-header'>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Модель</th>
                        <th>Описание</th>
                        <th>Статус</th>
                    </tr>";
                
                $counter = 0;
                $total_rows = $result2->num_rows;
                
                while ($row = $result2->fetch_assoc()) {
                    $counter++;
                    $is_last = $counter == $total_rows;
                    $s_class = $row['status'] == 1 ? 'status-ready' : 'status-process';
                    $s_text = $row['status'] == 1 ? 'Готово' : 'В процессе';
                    
                    echo "
                    <tr class='table-row" . ($is_last ? ' last-row' : '') . "'>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['num'] . "</td>
                        <td>" . $row['model'] . "</td>
                        <td>" . $row['description'] . "</td>
                        <td class='$s_class'>$s_text</td>
                    </tr>";
                }
                
                echo "</table>";
            }
            
        } 
        else {
            echo "<h2>Ничего не найдено</h2>";
        }
    }
    ?>
            
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