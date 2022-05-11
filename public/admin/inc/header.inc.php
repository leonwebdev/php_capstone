<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container col-12">
            <a class="navbar-brand flex-grow-1" href="#">Gardener Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link <?= ('Dashboard | Administration' == $title) ? "active\" aria-current=\"page\"" : '' ?> " href="./index.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ('Posts | Administration' == $title) ? "active\" aria-current=\"page\"" : '' ?> " href="./posts.php">Posts</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ('Categories | Administration' == $title) ? "active\" aria-current=\"page\"" : '' ?> " href="./categories.php">Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ('Comments | Administration' == $title) ? "active\" aria-current=\"page\"" : '' ?> " href="./comments.php">Comments</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ('Users | Administration' == $title) ? "active\" aria-current=\"page\"" : '' ?> " href="./users.php">Users</a>
                    </li>

                    <li class="nav-item"><a class="nav-link fw-bold text-danger" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>