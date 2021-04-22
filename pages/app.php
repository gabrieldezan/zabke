<?php
$vsSqlServicoApp = "
    SELECT
        id_servicos,
        titulo,
        resumo,
        imagem,
        descricao
    FROM
        servicos
    WHERE
        status = 1 AND
        layout = 1 AND
        url_amigavel = '$parametro'
";
$vrsExecutaServicoApp = mysqli_query($Conexao, $vsSqlServicoApp) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
$vrsQntServicoApp = mysqli_num_rows($vrsExecutaServicoApp);
if ($vrsQntServicoApp > 0) {
    $voResultadoServicoApp = mysqli_fetch_object($vrsExecutaServicoApp);
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->favicon ?>">
            <?php
            // CSS
            include 'php/css.php';
            ?>
            <title><?php echo $voResultadoConfiguracoes->titulo . " - " . $voResultadoServicoApp->titulo ?></title>
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
                                <h1 class="page-title">App</h1>
                                <ul id="breadcrumbs" class="breadcrumbs none-style">
                                    <li><a href="<?php echo URL ?>">Home</a></li>
                                    <li><a>Soluções</a></li>
                                    <li class="active"><?php echo $voResultadoServicoApp->titulo ?></li>
                                </ul>    
                            </div>
                        </div>
                    </div>

                    <section class="mobile-app">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="ot-heading">
                                        <span>// <?php echo $voResultadoServicoApp->titulo ?></span>
                                        <h2 class="main-heading"><?php echo $voResultadoServicoApp->resumo ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 align-self-center">
                                    <?php
                                    $vsSqlDiferenciais1 = "
                                        SELECT
                                            descricao,
                                            texto,
                                            icone
                                        FROM
                                            diferenciais
                                        WHERE
                                            id_servicos = $voResultadoServicoApp->id_servicos
                                        ORDER BY
                                            id_diferenciais
                                        LIMIT 3
                                    ";
                                    $vrsExecutaDiferenciais1 = mysqli_query($Conexao, $vsSqlDiferenciais1) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                    while ($voResultadoDiferenciais1 = mysqli_fetch_object($vrsExecutaDiferenciais1)) {
                                        ?>
                                        <div class="icon-box-s2 s3 app-benefits-left">
                                            <div class="icon-main">
                                                <span class="<?php echo $voResultadoDiferenciais1->icone ?>"></span>
                                            </div>
                                            <div class="content-box">
                                                <h5><?php echo $voResultadoDiferenciais1->descricao ?></h5>
                                                <p>51% of smartphone users have discovered a new company or product.</p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-4 align-self-center">
                                    <div class="app-benefits-img text-center">
                                        <img src="<?php echo URL . "wdadmin/uploads/servicos/" . $voResultadoServicoApp->imagem ?>" title="<?php echo $voResultadoServicoApp->titulo ?>" alt="<?php echo $voResultadoServicoApp->titulo ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4 align-self-center">
                                    <?php
                                    $vsSqlDiferenciais2 = "
                                        SELECT
                                            descricao,
                                            texto,
                                            icone
                                        FROM
                                            diferenciais
                                        WHERE
                                            id_servicos = $voResultadoServicoApp->id_servicos
                                        ORDER BY
                                            id_diferenciais DESC
                                        LIMIT 3
                                    ";
                                    $vrsExecutaDiferenciais2 = mysqli_query($Conexao, $vsSqlDiferenciais2) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                    while ($voResultadoDiferenciais2 = mysqli_fetch_object($vrsExecutaDiferenciais2)) {
                                        ?>
                                        <div class="icon-box-s2 s1 app-benefits-right">
                                            <div class="icon-main"><span class="flaticon-data-1"></span></div>
                                            <div class="content-box">
                                                <h5><?php echo $voResultadoDiferenciais2->descricao ?></h5>
                                                <p><?php echo $voResultadoDiferenciais2->texto ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="counter-v5">
                        <div class="container-fluid">
                            <div class="row">
                                <?php
                                $vsSqlMetricas = "
                                    SELECT
                                        descricao,
                                        imagem,
                                        valor
                                    FROM
                                        metricas
                                    WHERE
                                        id_servicos = $voResultadoServicoApp->id_servicos
                                ";
                                $vrsExecutaMetricas = mysqli_query($Conexao, $vsSqlMetricas) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoMetricas = mysqli_fetch_object($vrsExecutaMetricas)) {
                                    ?>
                                    <div class="col-xl-3 col-lg-6 order-lg-last no-padding">
                                        <img src="<?php echo URL . "wdadmin/uploads/metricas/" . $voResultadoMetricas->imagem ?>" title="<?php echo $voResultadoMetricas->descricao ?>" alt="<?php echo $voResultadoMetricas->descricao ?>" class="img-full">
                                    </div>
                                    <div class="col-xl-3 col-lg-6 no-padding order-xl-last align-self-center">
                                        <div class="ot-counter2">
                                            <div class="s-num">
                                                <span class="num" data-to="<?php echo $voResultadoMetricas->valor ?>" data-time="2000">0</span>
                                            </div>
                                            <h6><?php echo $voResultadoMetricas->descricao ?></h6>
                                            <div class="b-num"><?php echo $voResultadoMetricas->valor ?></div>    
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </section>

                    <section class="app-offer">
                        <div class="overlay overlay-image"></div>
                        <div class="container">
                            <div class="row">
                                <?php
                                $vsSqlVideo = "
                                    SELECT
                                        titulo,
                                        detalhes,
                                        imagem,
                                        link
                                    FROM
                                        video
                                    WHERE
                                        id_servicos = $voResultadoServicoApp->id_servicos
                                ";
                                $vrsExecutaVideo = mysqli_query($Conexao, $vsSqlVideo) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoVideo = mysqli_fetch_object($vrsExecutaVideo)) {
                                    ?>
                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                        <img src="<?php echo URL . "wdadmin/uploads/video/" . $voResultadoVideo->imagem ?>" title="<?php echo $voResultadoVideo->titulo ?>" alt="<?php echo $voResultadoVideo->titulo ?>">
                                    </div>
                                    <div class="col-lg-6 align-self-center">
                                        <div class="right-about-v4">
                                            <div class="ot-heading">
                                                <span>// <?php echo $voResultadoConfiguracoes->titulo ?></span>
                                                <h2 class="main-heading"><?php echo $voResultadoVideo->titulo ?></h2>
                                            </div>
                                            <div class="space-5"></div>
                                            <p><?php echo $voResultadoVideo->detalhes ?></p>
                                            <div class="video-popup style-2">
                                                <div class="btn-inner">
                                                    <a class="btn-play" href="<?php echo $voResultadoVideo->link ?>"><i class="flaticon-play"></i>
                                                        <span class="circle-1"></span>
                                                        <span class="circle-2"></span>
                                                    </a>
                                                </div>
                                                <span>Assista nosso vídeo</span>     
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </section>

                    <section class="service-web-pricing">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="ot-heading">
                                        <span>// Planos</span>
                                        <h2 class="main-heading">Veja Nossos Planos</h2>
                                    </div>
                                    <div class="space-20"></div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <?php
                                $vsSqlPlanos = "
                                    SELECT
                                        descricao,
                                        detalhes,
                                        valor,
                                        icone
                                    FROM
                                        planos
                                    WHERE
                                        id_servicos = $voResultadoServicoApp->id_servicos
                                ";
                                $vrsExecutaPlanos = mysqli_query($Conexao, $vsSqlPlanos) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoPlanos = mysqli_fetch_object($vrsExecutaPlanos)) {
                                    ?>
                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <div class="ot-pricing-table">
                                            <div class="icon-main"><span class="<?php echo $voResultadoPlanos->icone ?>"></span></div>
                                            <div class="inner-table">
                                                <h4 class="title-table"><?php echo $voResultadoPlanos->descricao ?></h4>
                                                <h2><sup>R$</sup> <?php echo $voResultadoPlanos->valor ?></h2>
                                                <div class="details ">
                                                    <?php echo $voResultadoPlanos->detalhes ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="ot-pricing-table mais-planos">
                                        <div class="inner-table">
                                            <h4 class="title-table">Para outros planos, favor entrar em contato com nossa equipe comercial</h4>
                                            <p>*Consultar o valor de ativação</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="service-web-clients"> 
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ot-heading text-center">
                                        <span>// Nossos Clientes</span>
                                        <h2 class="main-heading">O que nossos clientes <br/>dizem de nós</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="space-35"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ot-testimonials">
                                        <div class="owl-carousel owl-theme testimonial-inner ot-testimonials-slider">
                                            <?php
                                            $vsSqlDepoimentos = "
                                                SELECT
                                                    d.nome,
                                                    d.texto,
                                                    c.imagem,
                                                    c.descricao
                                                FROM
                                                    depoimentos d
                                                    INNER JOIN clientes c ON d.id_clientes = c.id_clientes
                                                WHERE
                                                    d.id_servicos = $voResultadoServicoApp->id_servicos
                                            ";
                                            $vrsExecutaDepoimentos = mysqli_query($Conexao, $vsSqlDepoimentos) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                            while ($voResultadoDepoimentos = mysqli_fetch_object($vrsExecutaDepoimentos)) {
                                                ?>
                                                <div class="testi-item">
                                                    <div class="layer1"></div>
                                                    <div class="layer2">
                                                        <div class="t-head flex-middle">
                                                            <img src="<?php echo URL . "wdadmin/uploads/clientes/" . $voResultadoDepoimentos->imagem ?>" title="<?php echo $voResultadoDepoimentos->descricao ?>" alt="<?php echo $voResultadoDepoimentos->descricao ?>">
                                                            <div class="tinfo">
                                                                <h6><?php echo $voResultadoDepoimentos->nome . " - " . $voResultadoDepoimentos->descricao ?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="ttext">
                                                            <?php echo $voResultadoDepoimentos->texto ?>
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

                    <?php
                    $vsSqlTeste = "
                        SELECT
                            titulo,
                            texto,
                            link,
                            imagem
                        FROM
                            informacoes
                        WHERE
                            id_conteudo_personalizado = 5 AND
                            id_informacoes = 7
                    ";
                    $vrsExecutaTeste = mysqli_query($Conexao, $vsSqlTeste) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                    while ($voResultadoTeste = mysqli_fetch_object($vrsExecutaTeste)) {
                        ?>
                        <section class="section-consultation" style="background-image: url(<?php echo URL . "wdadmin/uploads/informacoes/" . $voResultadoTeste->imagem ?>);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <?php echo $voResultadoTeste->texto ?>
                                        <h2><?php echo $voResultadoTeste->titulo ?></h2>
                                        <div class="ot-button">
                                            <a href="<?php echo $voResultadoTeste->link ?>" target="_blank" class="octf-btn octf-btn-primary">Solicite um Teste</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php
                    }
                    ?>

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
    <?php
}