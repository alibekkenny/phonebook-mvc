<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/public/styles/layout.css">
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/popper.js"></script>
</head>
<body>

<main class="mt-5">

    <div class="container pt-4 ">
        <select name="lang" style="width: 10%;" class="form-select float-end" onchange="switchLanguage(this.value)">
            <?php foreach ($language->GetLangList() as $index => $val) { ?>
                <option <?= $language->GetLanguage() == $val ? "selected" : "" ?>> <?= $val ?></option>
            <?php } ?>
        </select>
        <?= $content ?>
    </div>
</main>


</body>
<script>
    function switchLanguage(value) {
        fetch('/lang/switch/' + value, {
            method: "GET",
            headers: {
                "Content-Type": "application/json; charset=UTF-8"
            },
        }).then(x => location.reload());
    }
</script>
