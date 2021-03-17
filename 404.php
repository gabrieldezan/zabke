<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
        <?php
        // CSS
        include 'php/css.php';
        ?>
        <title>Zabke Tecnologia - 404</title>
    </head>

    <body class="royal_preloader">
        <div id="page" class="site">

            <?php
            // MENU
            include 'php/menu.php';
            ?>

            <div id="content" class="site-content">

                <div class="container">
                    <div class="error-404 not-found text-center">
                        <h2><img class="error-image" src="images/404.png" alt="404"></h2>
                        <h1>Página Não Encontrada!</h1>
                        <div class="content-404">
                            <p>Oops! A página que você estava procurando não existe.</p>
                            <a class="octf-btn" href="index.php">Voltar para página inicial</a>
                        </div>
                    </div>
                </div>

            </div>

            <?php
            // RODAPÉ
            include 'php/rodape.php';
            ?>

        </div>
        <a id="back-to-top" href="#" class="show"><i class="flaticon-up-arrow"></i></a>

        <?php
        // SCRIPT
        include 'php/script.php';
        ?>

    </body>
</html>