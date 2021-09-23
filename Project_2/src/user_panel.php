<?php

require_once __DIR__ . '/cmodel.php';
$model = new CModel();

/*$filename = 'Project_2/src/cmodel.php';

if (file_exists($filename)) {
    echo "Файл $filename существует";
} else {
    echo "Файл $filename не существует";
}*/


if (!empty($_POST)) {
    $action = $_POST["action"];
    switch ($action) {
        case 'addUser':
            $model->addUser($_POST['firstName'], $_POST['lastName'], $_POST['birthd'], $_POST['active']);
            break;
        default:
            die("Неизвестное действие");
    }

    header("Location: user_panel.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>HTML5</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Дата рождения</th>
                    <th scope="col">Активность</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $parameters = $model->getUsers();
                foreach ($parameters as $parameter) : ?>
                    <tr>
                        <th scope="row"><?= $parameter[0] ?></th>
                        <td><?= $parameter[1] ?></td>
                        <td><?= $parameter[2] ?></td>
                        <td><?= $parameter[3] ?></td>
                        <td><?= $parameter[4] ?></td>
                        <td><?= $parameter[5] ?></td>
                    </tr>

                <?php
                endforeach;
                ?>
            </tbody>

            <body>
                <div class="container">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td></td>
                            </tr>
                        </thead>
                    </table>
                    <tr>
                        <th scope="row">
                            <h3>Добавить пользователя</h3>
                            <form method="POST" action="user_panel.php">
                                <div>
                    <tr>
                        <label for="firstName">Имя</label>
                        <input type="text" name="firstName" value="">
                </div>
                <div>
                    <label for="lastName">Фамилия</label>
                    <input type="text" name="lastName" value="">
                </div>
                <div>
                    <label for="birthd">Дата рождения</label>
                    <input type="data" name="birthd" value="">
                </div>

                <div>
                    <label for="active">Активность</label>
                    <input type="checkbox" name="active" value="">
                </div>

                <input type="submit" value="Добавить">
                <input type="hidden" name="action" value="addUser">
                </form>
                </th>
                </tr>


            </body>

</html>