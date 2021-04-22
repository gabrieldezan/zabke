<?php
$vsSqlServicoWeb = "
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
        layout = 0 AND
        url_amigavel = '$parametro'
";
$vrsExecutaServicoWeb = mysqli_query($Conexao, $vsSqlServicoWeb) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
$vrsQntServicoWeb = mysqli_num_rows($vrsExecutaServicoWeb);
if ($vrsQntServicoWeb > 0) {
    $voResultadoServicoWeb = mysqli_fetch_object($vrsExecutaServicoWeb);
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
            <title><?php echo $voResultadoConfiguracoes->titulo . " - " . $voResultadoServicoWeb->titulo ?></title>
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
                                <h1 class="page-title"><?php echo $voResultadoServicoWeb->titulo ?></h1>
                                <ul id="breadcrumbs" class="breadcrumbs none-style">
                                    <li><a href="<?php echo URL ?>">Home</a></li>
                                    <li><a>Soluções</a></li>
                                    <li class="active"><?php echo $voResultadoServicoWeb->titulo ?></li>
                                </ul>    
                            </div>
                        </div>
                    </div>

                    <section class="why-choose-us">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 web">
                                    <img src="<?php echo URL . "wdadmin/uploads/servicos/" . $voResultadoServicoWeb->imagem ?>" title="<?php echo $voResultadoServicoWeb->titulo ?>" alt="<?php echo $voResultadoServicoWeb->titulo ?>">
                                </div>
                                <div class="col-lg-6">
                                    <div class="why-right">
                                        <div class="ot-heading">
                                            <span>// <?php echo $voResultadoServicoWeb->titulo ?></span>
                                            <h2 class="main-heading"><?php echo $voResultadoServicoWeb->resumo ?></h2>
                                        </div>
                                        <div class="mb-15">
                                            <?php echo $voResultadoServicoWeb->descricao ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <?php
                                                $vsSqlDiferenciais = "
                                                    SELECT
                                                        descricao,
                                                        texto,
                                                        icone
                                                    FROM
                                                        diferenciais
                                                    WHERE
                                                        id_servicos = $voResultadoServicoWeb->id_servicos
                                                ";
                                                $vrsExecutaDiferenciais = mysqli_query($Conexao, $vsSqlDiferenciais) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                                while ($voResultadoDiferenciais = mysqli_fetch_object($vrsExecutaDiferenciais)) {
                                                    ?>
                                                    <div class="icon-box-s1">
                                                        <div class="icon-main">
                                                            <span class="<?php echo $voResultadoDiferenciais->icone ?>"></span>
                                                        </div>
                                                        <h5><?php echo $voResultadoDiferenciais->descricao ?></h5>
                                                        <div class="line-box"></div>
                                                        <?php echo $voResultadoDiferenciais->texto ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="about-counter">
                        <div class="container">
                            <div class="row">
                                <div class=col-lg-12>
                                    <div class="s-counter4">
                                        <div class="row">
                                            <?php
                                            $vsSqlMetricas = "
                                                SELECT
                                                    descricao,
                                                    valor
                                                FROM
                                                    metricas
                                                WHERE
                                                    id_servicos = $voResultadoServicoWeb->id_servicos
                                            ";
                                            $vrsExecutaMetricas = mysqli_query($Conexao, $vsSqlMetricas) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                            while ($voResultadoMetricas = mysqli_fetch_object($vrsExecutaMetricas)) {
                                                ?>
                                                <div class="col-lg-4 col-md-4 col-sm-6 text-center mb-4 mb-lg-0">
                                                    <div class="ot-counter text-white">
                                                        <div>
                                                            <p>+</p><span class="num" data-to="<?php echo $voResultadoMetricas->valor ?>" data-time="2000">0</span>
                                                        </div>
                                                        <h6 class="text-white"><?php echo $voResultadoMetricas->descricao ?></h6>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-110"></div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="ot-heading">
                                        <span>// Soluções</span>
                                        <h2 class="main-heading">Trabalhamos com diversas <br>Soluções no desenvolvimento Web</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="space-30"></div>
                            <div class="row">
                                <?php
                                $vsSqlSolucoes = "
                                    SELECT
                                        titulo,
                                        texto,
                                        imagem,
                                        icone
                                    FROM
                                        solucoes
                                    WHERE
                                        id_servicos = $voResultadoServicoWeb->id_servicos
                                ";
                                $vrsExecutaSolucoes = mysqli_query($Conexao, $vsSqlSolucoes) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoSolucoes = mysqli_fetch_object($vrsExecutaSolucoes)) {
                                    ?>
                                    <div class="col-lg-4 col-md-6 mb-30">
                                        <div class="icon-box-s2 s2 border-s1 bg bg1 text-center">
                                            <div class="icon-main">
                                                <span class="<?php echo $voResultadoSolucoes->icone ?>"></span>
                                            </div>
                                            <div class="content-box">
                                                <h5><a><?php echo $voResultadoSolucoes->titulo ?></a></h5>
                                                <?php echo $voResultadoSolucoes->texto ?>
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
                                        id_servicos = $voResultadoServicoWeb->id_servicos
                                ";
                                $vrsExecutaVideo = mysqli_query($Conexao, $vsSqlVideo) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoVideo = mysqli_fetch_object($vrsExecutaVideo)) {
                                    ?>
                                    <div class="col-xl-5 col-lg-6">
                                        <div class="tab-video">
                                            <div class="ot-heading">
                                                <span>// <?php echo $voResultadoConfiguracoes->titulo ?></span>
                                                <h2 class="main-heading"><?php echo $voResultadoVideo->titulo ?></h2>
                                            </div>
                                            <div class="space-15"></div>
                                            <div class="ot-tabs">
                                                <p><?php echo $voResultadoVideo->detalhes ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-xl-1 col-xl-6 col-lg-6 split-right-img bg-video" style="background-image: url(<?php echo URL . "wdadmin/uploads/video/" . $voResultadoVideo->imagem ?>);">
                                        <div class="video-popup">
                                            <div class="btn-inner">
                                                <a class="btn-play" href="<?php echo $voResultadoVideo->link ?>">
                                                    <i class="flaticon-play"></i>
                                                    <span class="circle-1"></span>
                                                    <span class="circle-2"></span>
                                                </a>
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
                                        id_servicos = $voResultadoServicoWeb->id_servicos
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
                                        <h2 class="main-heading">O que nossos clientes<br/>dizem de nós</h2>
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
                                                    d.id_servicos = $voResultadoServicoWeb->id_servicos
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