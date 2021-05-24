<?php
$vsSqlServicoWeb = "
    SELECT
        id_servicos,
        titulo,
        titulo_secao,
        resumo,
        imagem,
        descricao,
        plano_personalizado
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

    $vsSqlDepoimentos = "SELECT d.nome, d.texto, c.imagem, c.descricao FROM depoimentos d INNER JOIN clientes c ON d.id_clientes = c.id_clientes WHERE d.id_servicos = $voResultadoServicoWeb->id_servicos";
    $vrsExecutaDepoimentos = mysqli_query($Conexao, $vsSqlDepoimentos) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
    $vrsQntDepoimentos = mysqli_num_rows($vrsExecutaDepoimentos);
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <link rel="shortcut icon" href="<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->favicon ?>">
            <meta name="description" content="<?php echo $voResultadoConfiguracoes->descricao ?>">
            <meta name="author" content="Web Dezan - Agência Digital">
            <meta name="robots" content="index, follow" />
            <meta name="googlebot" content="index, follow" />
            <meta property="og:type" content="website"/>
            <meta property="og:title" content="<?php echo $voResultadoConfiguracoes->titulo . " - " . $voResultadoServicoWeb->titulo ?>"/>
            <meta property="og:description" content="<?php echo $voResultadoServicoWeb->resumo ?>"/>
            <meta property="og:image" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "wdadmin/uploads/servicos/" . $voResultadoServicoWeb->imagem ?>"/>
            <meta property="og:url" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "web/" . $parametro ?>"/>
            <meta property="og:site_name" content="<?php echo $voResultadoConfiguracoes->nome_empresa ?>"/>
            <?php
            $vsSqlFacebook = "SELECT link FROM redes_sociais WHERE id_redes_sociais = 1";
            $vrsExecutaFacebook = mysqli_query($Conexao, $vsSqlFacebook) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
            while ($voResultadoFacebook = mysqli_fetch_object($vrsExecutaFacebook)) {
                ?>
                <meta property="fb:admins" content="<?php echo $voResultadoFacebook->link ?>"/>
            <?php } ?>
            <meta name="google-site-verification" content="FfN2fTfXECDfi5ntNpX76FKuShyTrKbwRZ6oeAbn6po" />
            <style type="text/css">body.royal_preloader{background:0 0;visibility:hidden}#royal_preloader{visibility:visible;position:fixed;width:100%;height:100%;top:0;right:0;bottom:0;left:0;height:auto;margin:0;z-index:9999999999}#royal_preloader.royal_preloader_number:before,#royal_preloader.royal_preloader_progress:before{content:'';position:absolute;top:0;right:0;bottom:0;left:0;background-image:-webkit-radial-gradient(circle,rgba(255,255,255,.1),rgba(255,255,255,.01));background-image:-moz-radial-gradient(circle,rgba(255,255,255,.1),rgba(255,255,255,.01));background-image:-ms-radial-gradient(circle,rgba(255,255,255,.1),rgba(255,255,255,.01));background-image:-o-radial-gradient(circle,rgba(255,255,255,.1),rgba(255,255,255,.01));background-image:radial-gradient(circle,rgba(255,255,255,.1),rgba(255,255,255,.01))}#royal_preloader.complete{opacity:0;-webkit-transition:opacity .2s linear .5s;-moz-transition:opacity .2s linear .5s;-ms-transition:opacity .2s linear .5s;-o-transition:opacity .2s linear .5s;transition:opacity .2s linear .5s}#royal_preloader.royal_preloader_line{height:2px;bottom:auto}#royal_preloader.royal_preloader_number .royal_preloader_percentage{position:absolute;top:0;right:0;bottom:0;left:0;margin:auto;width:100px;height:100px;border-width:1px;border-style:solid;border-radius:50%;line-height:100px;font-size:20px;font-family:Impact,Arial;text-shadow:1px 1px 2px rgba(0,0,0,.1);text-align:center}#royal_preloader.royal_preloader_number .royal_preloader_percentage>div{position:absolute;top:-2px;right:-2px;bottom:-2px;left:-2px;border:4px solid transparent;border-left-color:#fff;border-radius:50%;-webkit-animation:rotate .8s linear infinite;-moz-animation:rotate .8s linear infinite;-ms-animation:rotate .8s linear infinite;-o-animation:rotate .8s linear infinite;animation:rotate .8s linear infinite}#royal_preloader.royal_preloader_line .royal_preloader_loader{position:absolute;height:100%;left:0}#royal_preloader.royal_preloader_line .royal_preloader_peg{position:absolute;right:0;height:100%;width:100px;opacity:.5}#royal_preloader.royal_preloader_text .royal_preloader_loader{color:#fff;position:absolute;top:0;bottom:0;opacity:.2;left:50%;font-family:'Open Sans',sans-serif;font-weight:700;height:80px;line-height:80px;margin:auto;letter-spacing:-4px;font-size:55px;white-space:nowrap}#royal_preloader.royal_preloader_text .royal_preloader_loader div{position:absolute;top:0;right:0;bottom:0;left:0;background-color:#000;opacity:.7}#royal_preloader.royal_preloader_scale_text .royal_preloader_loader{color:#fff;position:absolute;font-family:'Open Sans',sans-serif;font-weight:700;top:0;bottom:0;left:50%;height:32px;line-height:32px;margin:auto;letter-spacing:1px;font-size:32px;white-space:nowrap}#royal_preloader.royal_preloader_scale_text .royal_preloader_loader span{display:inline-block;-webkit-transform:scale(0);-moz-transform:scale(0);-ms-transform:scale(0);-o-transform:scale(0);transform:scale(0)}#royal_preloader.royal_preloader_scale_text .royal_preloader_loader span.loaded{-webkit-animation:scale .2s forwards;-moz-animation:scale .2s forwards;-ms-animation:scale .2s forwards;-o-animation:scale .2s forwards;animation:scale .2s forwards}#royal_preloader.royal_preloader_logo .royal_preloader_loader{position:absolute;left:50%;top:50%;margin:0;overflow:hidden;background-position:50% 50%;background-repeat:no-repeat;background-size:100%;border-radius:5px}#royal_preloader.royal_preloader_logo .royal_preloader_loader div{position:absolute;bottom:0;left:0;right:0;height:100%;opacity:.7}#royal_preloader.royal_preloader_logo .royal_preloader_percentage{position:absolute;top:50%;left:50%;height:40px;line-height:40px;margin:0;color:#072e77;text-align:center;font-family:'Open Sans';font-size:13px;font-weight:400;letter-spacing:2px;padding-top:10px}#royal_preloader.royal_preloader_progress .royal_preloader_percentage{position:absolute;top:50%;left:0;right:0;color:#aaa;color:rgba(255,255,255,.1);font-family:Impact,Arial;font-size:20px;text-align:center}#royal_preloader.royal_preloader_progress .royal_preloader_loader{content:'';position:absolute;top:50%;left:0;right:0;width:60%;height:2px;margin:-10px auto auto auto;background-color:rgba(0,0,0,.1)}#royal_preloader.royal_preloader_progress .royal_preloader_meter{width:0;height:100%;margin:auto;padding:0;background-color:#c76363}@-webkit-keyframes rotate{0%{-webkit-transform:rotate(0)}100%{-webkit-transform:rotate(360deg)}}@-moz-keyframes rotate{0%{-moz-transform:rotate(0)}100%{-moz-transform:rotate(360deg)}}@-ms-keyframes rotate{0%{-ms-transform:rotate(0)}100%{-ms-transform:rotate(360deg)}}@-o-keyframes rotate{0%{-o-transform:rotate(0)}100%{-o-transform:rotate(360deg)}}@keyframes rotate{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@-webkit-keyframes scale{0%{-webkit-transform:scale(0);opacity:0}50%{-webkit-transform:scale(2);opacity:.5}100%{-webkit-transform:scale(1);opacity:1}}@-moz-keyframes scale{0%{-moz-transform:scale(0);opacity:0}50%{-moz-transform:scale(2);opacity:.5}100%{-moz-transform:scale(1);opacity:1}}@-ms-keyframes scale{0%{-ms-transform:scale(0);opacity:0}50%{-ms-transform:scale(2);opacity:.5}100%{-ms-transform:scale(1);opacity:1}}@-o-keyframes scale{0%{-o-transform:scale(0);opacity:0}50%{-o-transform:scale(2);opacity:0}.5 100%{-o-transform:scale(1);opacity:1}}@keyframes scale{0%{transform:scale(0);opacity:0}50%{transform:scale(2);opacity:.5}100%{transform:scale(1);opacity:1}}@media only screen and (max-width:800px){#royal_preloader.royal_preloader_scale_text .royal_preloader_loader{height:22px;line-height:22px;font-size:22px}}.royal_preloader_percentage{font-weight:600!important;font-size:18px!important;font-family:"Nunito Sans",sans-serif!important}</style>
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
                                        <h2 class="main-heading"><?php echo $voResultadoServicoWeb->titulo_secao ?></h2>
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
                                    ORDER BY
                                        id_video DESC
                                    LIMIT 1
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
                            <?php if ($voResultadoServicoWeb->plano_personalizado == 1) { ?>
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
                            <?php } ?>
                        </div>
                    </section>

                    <?php
                    if ($vrsQntDepoimentos > 0) {
                        ?>
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
                    }
                    ?>

                    <?php
                    $vsSqlTeste = "
                        SELECT
                            titulo,
                            texto,
                            texto_botao,
                            link,
                            imagem
                        FROM
                            chamada_teste
                        WHERE
                            id_servicos = $voResultadoServicoWeb->id_servicos
                        ORDER BY
                            id_chamada_teste DESC
                        LIMIT 1
                    ";
                    $vrsExecutaTeste = mysqli_query($Conexao, $vsSqlTeste) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                    while ($voResultadoTeste = mysqli_fetch_object($vrsExecutaTeste)) {
                        ?>
                        <section class="section-consultation" style="background-image: url(<?php echo URL . "wdadmin/uploads/chamada_teste/" . $voResultadoTeste->imagem ?>);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p><?php echo $voResultadoTeste->texto ?></p>
                                        <h2><?php echo $voResultadoTeste->titulo ?></h2>
                                        <div class="ot-button">
                                            <a href="<?php echo $voResultadoTeste->link ?>" rel="noopener" target="_blank" class="octf-btn octf-btn-primary"><?php echo $voResultadoTeste->texto_botao ?></a>
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
            <a title="Voltar ao Topo" id="back-to-top" href="#" class="show"><i class="flaticon-up-arrow"></i></a>

            <?php
            // CSS
            include 'php/css.php';

            // SCRIPT
            include 'php/script.php';
            ?>

        </body>
    </html>
    <?php
}