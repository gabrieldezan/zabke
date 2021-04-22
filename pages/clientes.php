<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->favicon ?>" />
        <?php
        // CSS
        include 'php/css.php';
        ?>
        <title><?php echo $voResultadoConfiguracoes->titulo . " - Clientes" ?></title>
    </head>

    <body class="royal_preloader">
        <div id="page" class="site">

            <?php
            // MENU
            include 'php/menu.php';
            ?>

            <div id="content" class="site-content">
                <div class="page-header flex-middle">
                    <div class="container">
                        <div class="inner flex-middle">
                            <h1 class="page-title">Clientes</h1>
                            <ul id="breadcrumbs" class="breadcrumbs none-style">
                                <li><a href="<?php echo URL ?>">Home</a></li>
                                <li class="active">Clientes</li>
                            </ul>    
                        </div>
                    </div>
                </div>
            </div>

            <section class="section-case-study">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="project-filter-wrapper pt-50">
                                <div class="projects-grid projects-style-1 projects-col3 projects-no-gaps">
                                    <?php
                                    $vsSqlClientes = "SELECT descricao, imagem, link FROM clientes WHERE status = 1";
                                    $vrsExecutaClientes = mysqli_query($Conexao, $vsSqlClientes) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                    while ($voResultadoClientes = mysqli_fetch_object($vrsExecutaClientes)) {
                                        ?>
                                        <div class="project-item">
                                            <div class="projects-box">
                                                <div class="projects-thumbnail">
                                                    <a href="<?php echo $voResultadoClientes->link ?>" target="_blank">
                                                        <img src="<?php echo URL . "wdadmin/uploads/clientes/" . $voResultadoClientes->imagem ?>" title="<?php echo $voResultadoClientes->descricao ?>" alt="<?php echo $voResultadoClientes->descricao ?>">
                                                    </a>
                                                </div>
                                                <div class="portfolio-info ">
                                                    <a class="overlay" href="<?php echo $voResultadoClientes->link ?>" target="_blank"></a>                                
                                                    <div class="portfolio-info-inner">
                                                        <h5><a href="<?php echo $voResultadoClientes->link ?>" target="_blank"><?php echo $voResultadoClientes->descricao ?></a></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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