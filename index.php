<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: #fff;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #eee;
        }

        .add-book {
            margin-bottom: 20px;
        }

        .add-book input[type="text"] {
            padding: 5px;
        }

        .add-book input[type="submit"] {
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <h1>Biblioteca</h1>
    <form class="add-book" method="post">
        <input type="text" name="titulo" placeholder="Título del libro" required>
        <input type="text" name="autor" placeholder="Autor" required>
        <input type="submit" value="Agregar libro">
    </form>
    <?php
    session_start();
    if (!isset($_SESSION['libros'])) {
        $_SESSION['libros'] = [];
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'], $_POST['autor'])) {
        $titulo = htmlspecialchars($_POST['titulo']);
        $autor = htmlspecialchars($_POST['autor']);
        $_SESSION['libros'][] = ['titulo' => $titulo, 'autor' => $autor];
    }
    if (!empty($_SESSION['libros'])) {
        echo '<table>';
        echo '<tr><th>Título</th><th>Autor</th></tr>';
        foreach ($_SESSION['libros'] as $libro) {
            echo '<tr><td>' . $libro['titulo'] . '</td><td>' . $libro['autor'] . '</td></tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No hay libros en la biblioteca.</p>';
    }
    ?>
</body>

</html>