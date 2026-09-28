<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pan Tadeusz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; flex-direction: column; min-height: 100vh; }
        main { flex: 1; }
        .sidebar { background-color: #f8f9fa; border-right: 1px solid #dee2e6; min-height: 100%; }
        .hero-image { max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
        .nav-link:hover { background-color: #e9ecef; }
        footer { margin-top: auto; }
    </style>
</head>
<body>

<header class="bg-dark text-white p-4">
    <div class="container-fluid text-center">
        <h1 class="display-4">Pan Tadeusz</h1>
        <p class="lead">Adam Mickiewicz - czyli Ostatni zajazd na Litwie</p>
    </div>
</header>

<main class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 p-3 sidebar">
            <h5 class="border-bottom pb-2">Spis treści</h5>
            <div class="list-group">
                <a href="index.php" class="list-group-item list-group-item-action <?php echo !isset($_GET['k']) ? 'active' : ''; ?>">Strona główna</a>
                <?php
                for ($k = 1; $k <= 12; $k++) {
                    $activeClass = (isset($_GET['k']) && $_GET['k'] == $k) ? 'active' : '';
                    echo "<a href='index.php?k=$k' class='list-group-item list-group-item-action $activeClass'>Księga $k</a>";
                }
                ?>
            </div>
        </nav>

        <section class="col-md-9 col-lg-10 p-5 text-center">
            <?php
            if (isset($_GET['k'])) {
                $k = (int)$_GET['k'];
                // POPRAWKA: szukamy .html, bo takie masz pliki w folderze
                $file = "k$k.html";

                if (file_exists($file)) {
                    echo "<div class='text-start border p-4 bg-white shadow-sm'>";
                    include_once($file);
                    echo "</div>";
                } else {
                    echo "<div class='alert alert-danger'>Błąd: PHP nie widzi pliku o nazwie: $file</div>";
                }
            } else {
                // Strona główna
                ?>
                <div class="mb-5">
                    <h2>Witaj w cyfrowej wersji epopei</h2>
                    <p class="text-muted">Wybierz księgę z menu po lewej stronie, aby rozpocząć czytanie.</p>
                </div>

                <div class="row align-items-center mb-5">
                    <div class="col-md-6">
                        <form action="" method="post" class="text-start">
                            <div class="mb-3">
                                <label class="form-label">Pseudonim</label>
                                <input type="text" class="form-control" name="nick" placeholder="podaj pseudonim" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adres e-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="podaj adres e-mail" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Komentarz</label>
                                <textarea class="form-control" name="comment" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger">Prześlij</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <img src="PanTadeo.jpg" alt="Obrazek PanTadeo" class="hero-image img-fluid">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-start bg-light p-4 border-start border-4 border-primary">
                        <p class="fst-italic mb-0">
                            "Litwo! Ojczyzno moja! ty jesteś jak zdrowie.<br>
                            Ile cię trzeba cenić, ten tylko się dowie,<br>
                            Kto cię stracił. Dziś piękność twą w całej ozdobie<br>
                            Widzę i opisuję, bo tęsknię po tobie."
                        </p>
                    </div>
                </div>
            <?php } ?>
        </section>
    </div>
</main>

<footer class="bg-danger-subtle text-center py-3 mt-4">
    <div class="container">
        <p class="mb-0 text-dark">Projekt strony: <strong>Bartłomiej Fiedor</strong></p>
        <small class="text-secondary">ANS Nowy Targ</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>