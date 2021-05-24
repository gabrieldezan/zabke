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
        <meta property="og:title" content="<?php echo $voResultadoConfiguracoes->titulo ?>"/>
        <meta property="og:description" content="<?php echo $voResultadoConfiguracoes->descricao ?>"/>
        <meta property="og:image" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL ?>"/>
        <meta property="og:url" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL ?>"/>
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
                                            if ($voResultadoClientes->link != null || !empty($voResultadoClientes->link)) {
                                                ?>
                                                <div class="partners-slide">
                                                    <a href="<?php echo $voResultadoClientes->link ?>" rel="noopener" target="_blank" class="client-logo">
                                                        <figure class="partners-slide-inner">
                                                            <img class="partners-slide-image" src="<?php echo URL . "wdadmin/uploads/clientes/" . $voResultadoClientes->imagem ?>" title="<?php echo $voResultadoClientes->descricao ?>" alt="<?php echo $voResultadoClientes->descricao ?>">
                                                        </figure>                             
                                                    </a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="partners-slide">
                                                    <a class="client-logo">
                                                        <figure class="partners-slide-inner">
                                                            <img class="partners-slide-image" src="<?php echo URL . "wdadmin/uploads/clientes/" . $voResultadoClientes->imagem ?>" title="<?php echo $voResultadoClientes->descricao ?>" alt="<?php echo $voResultadoClientes->descricao ?>">
                                                        </figure>                             
                                                    </a>
                                                </div>
                                                <?php
                                            }
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
                                                        <img src="<?php echo URL . "wdadmin/uploads/blog_postagens/" . $voResultadoBlogHome->imagem ?>" title="<?php echo $voResultadoBlogHome->titulo ?>" alt="<?php echo $voResultadoBlogHome->titulo ?>">
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
        <a title="Voltar ao Topo" id="back-to-top" href="#" class="show"><i class="flaticon-up-arrow"></i></a>

        <?php
        // CSS
        include 'php/css.php';

        // SCRIPT
        include 'php/script.php';
        ?>

    </body>
</html>