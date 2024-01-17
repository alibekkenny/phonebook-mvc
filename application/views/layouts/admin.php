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
    <nav id="sidebarMenu" class="d-lg-block sidebar bg-white">
        <div class="position-sticky">
            <h3 class="text-center"><?= $language->GetVar('admin_page') ?></h3>
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="/<?= $language->GetLanguage() ?>/admin"
                   class="list-group-item list-group-item-action py-2 ripple"
                   aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span><?= $language->GetVar('main_dash') ?></span>
                </a>
                <a href="/<?= $language->GetLanguage() ?>/admin/contact"
                   class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span><?= $language->GetVar('contacts') ?></span>
                </a>

                <a href="/<?= $language->GetLanguage() ?>/admin/logout"
                   class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span><svg xmlns="http://www.w3.org/2000/svg"
                                                                           width="16"
                                                                           height="16" fill="currentColor"
                                                                           class="bi bi-box-arrow-right"
                                                                           viewBox="0 0 16 16">

  <path fill-rule="evenodd"
        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
  <path fill-rule="evenodd"
        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
</svg> <?= $language->GetVar('logout') ?></span></a>
                <select name="lang" class="form-select"
                        onchange="switchLanguage(this.value)">
                    <?php foreach ($language->GetLangList() as $index => $val) { ?>
                        <option <?= $language->GetLanguage() == $val ? "selected" : "" ?>> <?= $val ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
</header>
<body>

<main style="margin-left: 240px;">
    <div class="container py-5 mt-2">
        <?= $content ?>
    </div>
</main>
</body>

<script>
    function switchLanguage(value) {
        // console.log(this.location.pathname.split('/')[1]);
        let currentUrl = this.location.href;
        let newUrl = currentUrl.replace(/\/[a-z]{2}\//, '/' + value + '/');
        console.log('current: ', currentUrl, '\nnew url: ', newUrl)
        window.location.href = newUrl;
    }
</script>