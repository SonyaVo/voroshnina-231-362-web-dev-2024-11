<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Таблица умножения</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <header>
        <h1>Таблица умножения</h1>
    </header>

    <main>
        <!-- Главное меню -->
        <div id="main_menu">
            <?php
            $htmlType = $_GET['html_type'] ?? 'TABLE';
            $content = $_GET['content'] ?? 'all';

            echo '<a href="?html_type=TABLE' . (isset($content) ? '&content=' . $content : '') . '"';
            if ($htmlType === 'TABLE')
                echo ' class="selected"';
            echo '>Табличная верстка</a>';

            echo '<a href="?html_type=DIV' . (isset($content) ? '&content=' . $content : '') . '"';
            if ($htmlType === 'DIV')
                echo ' class="selected"';
            echo '>Блочная верстка</a>';
            ?>
        </div>

        <!-- Основное меню -->
        <div id="product_menu">
            <?php
            echo '<a href="?html_type=' . $htmlType . '"';
            if ($content === 'all')
                echo ' class="selected"';
            echo '>Вся таблица умножения</a>';

            for ($i = 2; $i <= 9; $i++) {
                echo '<a href="?html_type=' . $htmlType . '&content=' . $i . '"';
                if ($content == $i)
                    echo ' class="selected"';
                echo '>Таблица умножения на ' . $i . '</a>';
            }
            ?>
        </div>

        <!-- Таблица умножения -->
        <div class="multiplication-table">
            <?php
            if ($htmlType === 'TABLE') {
                echo '<table>';
            } else {
                echo '<div class="table">';
            }

            for ($row = 1; $row <= 9; $row++) {
                if ($htmlType === 'TABLE') {
                    echo '<tr>';
                }

                for ($col = ($content === 'all' ? 1 : $content); $col <= ($content === 'all' ? 9 : $content); $col++) {
                    $result = $row * $col;
                    $cellContent = '<a href="?html_type=' . $htmlType . '&content=' . $col . '">' . $col . '</a> x ' .
                        '<a href="?html_type=' . $htmlType . '&content=' . $row . '">' . $row . '</a> = ' .
                        '<a href="?html_type=' . $htmlType . '&content=' . $result . '">' . $result . '</a>';

                    if ($htmlType === 'TABLE') {
                        echo '<td>' . $cellContent . '</td>';
                    } else {
                        echo '<div class="cell">' . $cellContent . '</div>';
                    }
                }

                if ($htmlType === 'TABLE') {
                    echo '</tr>';
                }
            }

            if ($htmlType === 'TABLE') {
                echo '</table>';
            } else {
                echo '</div>';
            }
            ?>
        </div>

    </main>
    <footer>
        <p>Тип верстки: <?= ($htmlType === 'TABLE') ? 'Табличная' : 'Блочная'; ?></p>
        <p>Название таблицы умножения:
            <?= ($content === 'all') ? 'Полная таблица' : "Таблица умножения на $content"; ?>
        </p>
        <?php
        date_default_timezone_set('Europe/Moscow');
        ?>
        <p>Дата и время: <?= date('Y-m-d H:i:s'); ?></p>
    </footer>

</body>


</html>