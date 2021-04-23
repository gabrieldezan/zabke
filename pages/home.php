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
        <title><?php echo $voResultadoConfiguracoes->titulo ?></title>
    </head>

    <body class="royal_preloader">
        <div id="page" class="site">

            <?php
            // MENU
            include 'php/menu.php';
            ?>

            <div id="content" class="site-content">
                <div id="rev_slider_one_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="mask-showcase" data-source="gallery">
                    <div id="rev_slider_three" class="rev_slider fullscreenbanner" data-version="5.4.1">
                        <ul>
                            <?php
                            $vsSqlBanner = "SELECT id_banner ,imagem, titulo, descricao, link FROM banner ORDER BY id_banner DESC";
                            $vrsExecutaBanner = mysqli_query($Conexao, $vsSqlBanner) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                            while ($voResultadoBanner = mysqli_fetch_object($vrsExecutaBanner)) {
                                ?>
                                <li data-index="<?php echo "rs-7" . $voResultadoBanner->id_banner ?>" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="<?php echo URL . "wdadmin/uploads/banners_slideshow/" . $voResultadoBanner->imagem ?>"  data-rotate="0"  data-saveperformance="off"  data-title="" data-param1="1" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <img src="<?php echo URL . "wdadmin/uploads/banners_slideshow/" . $voResultadoBanner->imagem ?>" title="<?php echo $voResultadoBanner->titulo ?>" alt="<?php echo $voResultadoBanner->titulo ?>" data-bgcolor='rgba(255,255,255,0)' style='' alt=""  data-bgposition="50% 50%" data-bgfit="auto" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                                    <div class="tp-caption tp-resizeme text-light tp-big-text" 
                                         id="<?php echo "slide-7" . $voResultadoBanner->id_banner . "-layer-2" ?>" 
                                         data-x="['left','left','left','left']" data-hoffset="['15','15','15','15']" 
                                         data-y="['top','top','top','top']" data-voffset="['240','140','155','145']"
                                         data-fontsize="['72','60','48','30']"
                                         data-lineheight="['80','62','52','42']"
                                         data-whitespace="nowrap"
                                         data-type="text" 
                                         data-responsive_offset="on" 
                                         data-frames='[{"delay":500,"split":"chars","splitdelay":0.1,"speed":500,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"power4.inOut"},{"delay":"wait","speed":1000,"frame":"999","to":"x:50px;z:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","ease":"power3.inOut"}]'
                                         data-textAlign="['left','left','left','left']"><?php echo $voResultadoBanner->titulo ?>
                                    </div>
                                    <div class="tp-caption tp-resizeme text-light" 
                                         id="<?php echo "slide-7" . $voResultadoBanner->id_banner . "-layer-3" ?>" 
                                         data-x="['left','left','left','left']" data-hoffset="['15','15','15','15']"
                                         data-y="['top','top','top','top']" data-voffset="['420','279','271','235']" 
                                         data-fontsize="['18','18','22','16']"
                                         data-lineheight="['30','34','32','28']"
                                         data-whitespace="nowrap"
                                         data-type="text" 
                                         data-responsive_offset="on" 
                                         data-frames='[{"delay":2900,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":1000,"frame":"999","to":"x:50px;opacity:0;","ease":"power3.inOut"}]'
                                         data-textAlign="['left','left','left','left']"><?php echo $voResultadoBanner->descricao ?>
                                    </div>
                                    <?php if ($voResultadoBanner->link != null || !empty($voResultadoBanner->link)) { ?>
                                        <div class="tp-caption rev-btn" 
                                             id="<?php echo "slide-7" . $voResultadoBanner->id_banner . "-layer-4" ?>" 
                                             data-x="['left','left','left','left']" data-hoffset="['15','15','15','15']"  
                                             data-y="['top','top','top','top']" data-voffset="['525','385','370','320']"
                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"                     
                                             data-type="button" 
                                             data-responsive_offset="on" 
                                             data-frames='[{"delay":3400,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":1000,"frame":"999","to":"x:50px;opacity:0;","ease":"power3.inOut"}]'
                                             data-textAlign="['center','center','center','center']"
                                             data-paddingtop="[0,0,0,0]"
                                             data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[0,0,0,0]"
                                             data-paddingleft="[0,0,0,0]">
                                            <a href="<?php echo $voResultadoBanner->link ?>" class="octf-btn octf-btn-primary btn-slider btn-large">Ver mais</a>
                                        </div>
                                    <?php } ?>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <div class="tp-bannertimer" style="height: 10px; background: rgba(0, 0, 0, 0);"></div>
                    </div>
                </div>

                <section class="over-hidden">
                    <div class="container">
                        <div class="row">
                            <?php
                            $vsSqlQuemSomos = "SELECT imagem, titulo, texto, link FROM informacoes WHERE id_conteudo_personalizado = 1 AND id_informacoes = 1";
                            $vrsExecutaQuemSomos = mysqli_query($Conexao, $vsSqlQuemSomos) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                            while ($voResultadoQuemSomos = mysqli_fetch_object($vrsExecutaQuemSomos)) {
                                ?>
                                <div class="col-lg-5 col-md-12 align-self-center">
                                    <div class="ot-heading">
                                        <span>// Quem Somos</span>
                                        <h2 class="main-heading"><?php echo $voResultadoQuemSomos->titulo ?></h2>
                                    </div>
                                    <?php echo $voResultadoQuemSomos->texto ?>
                                </div>
                                <div class="offset-lg-1 col-lg-6 col-md-12 align-self-center">
                                    <div class="about-right">
                                        <div class="img-small">
                                            <?php
                                            $vsSqlQuemSomosImgs = "SELECT id_informacoes, imagem, titulo FROM informacoes WHERE id_conteudo_personalizado = 2";
                                            $vrsExecutaQuemSomosImgs = mysqli_query($Conexao, $vsSqlQuemSomosImgs) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                            while ($voResultadoQuemSomosImgs = mysqli_fetch_object($vrsExecutaQuemSomosImgs)) {
                                                ?>
                                                <img class="<?php echo "img-small-" . $voResultadoQuemSomosImgs->id_informacoes ?>" src="<?php echo URL . "wdadmin/uploads/informacoes/" . $voResultadoQuemSomosImgs->imagem ?>" title="<?php echo $voResultadoQuemSomosImgs->titulo ?>" alt="<?php echo $voResultadoQuemSomosImgs->titulo ?>">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="home-about-video d-flex justify-content-center">
                                            <img src="<?php echo URL . "wdadmin/uploads/informacoes/" . $voResultadoQuemSomos->imagem ?>" title="<?php echo $voResultadoQuemSomos->titulo ?>" alt="<?php echo $voResultadoQuemSomos->titulo ?>">
                                        </div>
                                        <div class="home-about-btn">
                                            <div class="ot-button">
                                                <a href="<?php echo $voResultadoQuemSomos->link ?>" class="btn-details"><i class="flaticon-right-arrow-1 text-capitalize"></i> <?php echo "Veja mais sobre " . $voResultadoConfiguracoes->nome_empresa ?></a>
                                                <div class="space-15"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </section>

                <section class="technology-v1">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ot-heading text-center text-white">
                                    <span>// SERVIÇOS</span>
                                    <h2 class="main-heading">Veja abaixo <br>nossos serviços</h2>
                                </div>
                            </div>
                        </div>
                        <div class="space-15"></div>
                        <div class="row justify-content-center">
                            <?php
                            $vsSqlServicos = "SELECT titulo, icone, posicao, layout, url_amigavel FROM servicos WHERE status = 1 ORDER BY posicao";
                            $vrsExecutaServicos = mysqli_query($Conexao, $vsSqlServicos) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                            while ($voResultadoServicos = mysqli_fetch_object($vrsExecutaServicos)) {
                                ?>
                                <?php if ($voResultadoServicos->layout == 1) { ?>
                                    <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                                        <a class="tech-box text-center" href="<?php echo URL . "app/" . $voResultadoServicos->url_amigavel ?>">
                                            <div class="icon-main"><span class="<?php echo $voResultadoServicos->icone ?>"></span></div>
                                            <h5><?php echo $voResultadoServicos->titulo ?></h5>
                                        </a>
                                    </div>
                                <?php } ?>
                                <?php if ($voResultadoServicos->layout == 0) { ?>
                                    <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                                        <a class="tech-box text-center" href="<?php echo URL . "web/" . $voResultadoServicos->url_amigavel ?>">
                                            <div class="icon-main"><span class="<?php echo $voResultadoServicos->icone ?>"></span></div>
                                            <h5><?php echo $voResultadoServicos->titulo ?></h5>
                                        </a>
                                    </div>
                                <?php } ?>
                                <?php
                            }
                            ?>
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

                <section class="news-v4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 text-center text-md-left mb-4 mb-md-0">
                                <div class="ot-heading mb-0">
                                    <span>// Blog</span>
                                    <h2 class="main-heading">Veja nossas últimas notícias</h2>
                                </div>
                            </div>
                            <div class="col-md-4 text-center text-md-right align-self-end">
                                <div class="ot-button">
                                    <a href="<?php echo URL . "blog" ?>" class="octf-btn octf-btn-primary">Ver todas</a>
                                </div>
                                <div class="space-10"></div>
                            </div>
                        </div>
                        <div class="space-40"></div>
                        <div class="post-grid pgrid">
                            <div class="row justify-content-center">
                                <?php
                                $vsSqlBlogHome = "
                                    SELECT
                                        bp.titulo,
                                        bp.url_amigavel,
                                        bp.imagem,
                                        DATE_FORMAT(bp.data_publicacao, '%d/%m/%Y %H:%i') AS data_publicacao
                                    FROM
                                        blog_postagem bp
                                        INNER JOIN blog_subcategorias bs ON bp.id_blog_subcategorias = bs.id_blog_subcategorias
                                        INNER JOIN blog_categorias bc ON bs.id_blog_categorias = bc.id_blog_categorias
                                    WHERE
                                        bp.data_publicacao < '$data_hora_atual' AND
                                        bs.status = 1 AND
                                        bc.status = 1
                                    ORDER BY bp.data_publicacao DESC
                                    LIMIT 3
                                ";
                                $vrsExecutaBlogHome = mysqli_query($Conexao, $vsSqlBlogHome) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoBlogHome = mysqli_fetch_object($vrsExecutaBlogHome)) {
                                    ?>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <article class="post-box blog-item">
                                            <div class="post-inner">
                                                <div class="entry-media">
                                                    <a href="<?php echo URL . "post/" . $voResultadoBlogHome->url_amigavel ?>">
                                                        <img src="<?php echo URL . "wdadmin/uploads/blog_postagens/" . $voResultadoBlogHome->imagem ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="inner-post">
                                                    <div class="entry-header">
                                                        <div class="entry-meta">
                                                            <span class="posted-on"><a><i class="fas fa-clock"></i> <?php echo $voResultadoBlogHome->data_publicacao ?></a></span>
                                                        </div>
                                                        <h3 class="entry-title"><a href="<?php echo URL . "post/" . $voResultadoBlogHome->url_amigavel ?>"><?php echo $voResultadoBlogHome->titulo ?></a></h3>
                                                    </div>
                                                    <div class="btn-readmore">
                                                        <a href="<?php echo URL . "post/" . $voResultadoBlogHome->url_amigavel ?>"><i class="flaticon-right-arrow-1"></i>VER MAIS</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <?php
                                }
                                ?>
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