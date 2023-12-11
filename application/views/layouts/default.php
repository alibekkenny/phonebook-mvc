<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/styles/layout.css">
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/popper.js"></script>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand text-white">Phone Book</a>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a class="nav-link text-white active" href="/">Home</a>
                    <a class="nav-link text-white" href="/contact">Contacts</a>
                    <a class="nav-link text-white">About us</a>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <?php if (!isset($_SESSION['authorize']['id'])) { ?>
                    <a class="nav-link text-white" href="/login">Login</a>
                <?php } else { ?>
                    <a class="nav-link text-white" href="/logout">Logout</a>
                <?php } ?>

            </div>
        </div>
        </div>
    </nav>
</header>
<body>

<main>
    <div class="container py-5"> <?= $content ?>
    </div>
</main>


</body>