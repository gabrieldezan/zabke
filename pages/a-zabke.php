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
        <title><?php echo $voResultadoConfiguracoes->titulo . " - A Zabke" ?></title>
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
                            <h1 class="page-title">A Zabke</h1>
                            <ul id="breadcrumbs" class="breadcrumbs none-style">
                                <li><a href="<?php echo URL ?>">Home</a></li>
                                <li class="active">A Zabke</li>
                            </ul>    
                        </div>
                    </div>
                </div>

                <section class="why-choose-us">
                    <div class="container">
                        <div class="row">
                            <?php
                            $vsSqlSobre = "SELECT titulo, texto, imagem FROM sobre";
                            $vrsExecutaSobre = mysqli_query($Conexao, $vsSqlSobre) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                            while ($voResultadoSobre = mysqli_fetch_object($vrsExecutaSobre)) {
                                ?>
                                <div class="col-lg-6">
                                    <img src="<?php echo URL . "wdadmin/uploads/sobre/" . $voResultadoSobre->imagem ?>" title="<?php echo $voResultadoSobre->titulo ?>" alt="<?php echo $voResultadoSobre->titulo ?>">
                                </div>
                                <div class="col-lg-6">
                                    <div class="why-right">
                                        <div class="ot-heading">
                                            <span>// A Zabke</span>
                                            <h2 class="main-heading"><?php echo $voResultadoSobre->titulo ?></h2>
                                        </div>
                                        <?php echo $voResultadoSobre->texto ?>
                                        <div class="row">
                                            <?php
                                            $vsSqlDiferenciais = "SELECT titulo, icone, texto FROM informacoes WHERE id_conteudo_personalizado = 3";
                                            $vrsExecutaDiferenciais = mysqli_query($Conexao, $vsSqlDiferenciais) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                            while ($voResultadoDiferenciais = mysqli_fetch_object($vrsExecutaDiferenciais)) {
                                                ?>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="icon-box-s1">
                                                        <div class="icon-main">
                                                            <span class="<?php echo $voResultadoDiferenciais->icone ?>"></span>
                                                        </div>
                                                        <h5><?php echo $voResultadoDiferenciais->titulo ?></h5>
                                                        <div class="line-box"></div>
                                                        <?php echo $voResultadoDiferenciais->texto ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </section>

                <section class="service-web-video">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="tab-video">
                                    <div class="ot-heading">
                                        <span>// A Zabke</span>
                                        <h2 class="main-heading">Conheça mais <br><?php echo "sobre a " . $voResultadoConfiguracoes->nome_empresa ?></h2>
                                    </div>
                                    <div class="space-15"></div>
                                    <div class="ot-tabs">
                                        <?php
                                        $vsSqlMVV = "SELECT texto_missao, texto_visao, texto_valores FROM missao_visao_valores";
                                        $vrsExecutaMVV = mysqli_query($Conexao, $vsSqlMVV) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                        while ($voResultadoMVV = mysqli_fetch_object($vrsExecutaMVV)) {
                                            ?>
                                            <ul class="tabs-heading unstyle">
                                                <li class="tab-link octf-btn current" data-tab="tab-1518">Missão</li>
                                                <li class="tab-link octf-btn" data-tab="tab-2518">Visão</li>
                                                <li class="tab-link octf-btn" data-tab="tab-3518">Valores</li>
                                            </ul>
                                            <div id="tab-1518" class="tab-content current">
                                                <?php echo $voResultadoMVV->texto_missao ?>
                                            </div>
                                            <div id="tab-2518" class="tab-content">
                                                <?php echo $voResultadoMVV->texto_visao ?>
                                            </div>
                                            <div id="tab-3518" class="tab-content">
                                                <?php echo $voResultadoMVV->texto_valores ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="offset-xl-1 col-xl-6 col-lg-6 split-right-img remove-mobile">
                                <?php
                                $vsSqlMVVImg = "SELECT titulo, imagem FROM informacoes WHERE id_conteudo_personalizado = 4";
                                $vrsExecutaMVVImg = mysqli_query($Conexao, $vsSqlMVVImg) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoMVVImg = mysqli_fetch_object($vrsExecutaMVVImg)) {
                                    ?>
                                    <img src="<?php echo URL . "wdadmin/uploads/informacoes/" . $voResultadoMVVImg->imagem ?>" title="<?php echo $voResultadoMVVImg->titulo ?>" alt="<?php echo $voResultadoMVVImg->titulo ?>">
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-light-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 text-center text-md-left mb-4 mb-md-0">
                                <div class="ot-heading mb-0">
                                    <span>// clientes</span>
                                    <h2 class="main-heading">Confira alguns de nossos clientes</h2>
                                </div>
                            </div>
                            <div class="col-md-4 text-center text-md-right align-self-end">
                                <div class="ot-button">
                                    <a href="<?php echo URL . "clientes" ?>" class="octf-btn octf-btn-primary">Ver Mais</a>
                                </div>
                                <div class="space-10"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="partners">
                                    <div class="owl-carousel owl-theme home-client-carousel">
                                        <?php
                                        $vsSqlClientes = "SELECT descricao, imagem, link FROM clientes WHERE status = 1";
                                        $vrsExecutaClientes = mysqli_query($Conexao, $vsSqlClientes) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                        while ($voResultadoClientes = mysqli_fetch_object($vrsExecutaClientes)) {
                                            ?>
                                            <div class="partners-slide">
                                                <a href="<?php echo $voResultadoClientes->link ?>" target="_blank" class="client-logo">
                                                    <figure class="partners-slide-inner">
                                                        <img class="partners-slide-image" src="<?php echo URL . "wdadmin/uploads/clientes/" . $voResultadoClientes->imagem ?>" title="<?php echo $voResultadoClientes->descricao ?>" alt="<?php echo $voResultadoClientes->descricao ?>">
                                                    </figure>                             
                                                </a>
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