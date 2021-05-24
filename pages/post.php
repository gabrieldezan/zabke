<?php
$vsSqlPostagem = "
    SELECT
        bp.id_blog_postagem,
        bp.titulo,
        bp.imagem,
        bp.texto,
        DATE_FORMAT(data_publicacao, '%d/%m/%Y %H:%i') AS data_publicacao,
        bp.url_amigavel
    FROM
        blog_postagem bp
        INNER JOIN blog_subcategorias bs ON bp.id_blog_subcategorias = bs.id_blog_subcategorias
        INNER JOIN blog_categorias bc ON bs.id_blog_categorias = bc.id_blog_categorias
    WHERE
        bc.status = 1 AND
        bp.url_amigavel = '$parametro'
";
$vrsExecutaPostagem = mysqli_query($Conexao, $vsSqlPostagem) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
$vrsQntPostagem = mysqli_num_rows($vrsExecutaPostagem);

if ($vrsQntPostagem > 0) {
    $voResultadoPostagem = mysqli_fetch_object($vrsExecutaPostagem);

    $vsSqlView = "UPDATE blog_postagem SET visualizacoes = visualizacoes+1 WHERE url_amigavel= '$parametro'";
    mysqli_query($Conexao, $vsSqlView) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));

    $vsSqlPostagemGaleria = "SELECT descricao, imagem FROM blog_postagem_galeria WHERE id_blog_postagem = '$voResultadoPostagem->id_blog_postagem'";
    $vrsExecutaPostagemGaleria = mysqli_query($Conexao, $vsSqlPostagemGaleria) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
    $vrsQntPostagemGaleria = mysqli_num_rows($vrsExecutaPostagemGaleria);
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
            <meta property="og:title" content="<?php echo $voResultadoConfiguracoes->titulo . " - " . $voResultadoPostagem->titulo ?>"/>
            <meta property="og:description" content="<?php echo $voResultadoConfiguracoes->descricao ?>"/>
            <meta property="og:image" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "wdadmin/uploads/blog_postagens/" . $voResultadoPostagem->imagem ?>"/>
            <meta property="og:url" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "post/" . $parametro ?>"/>
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
            <title><?php echo $voResultadoConfiguracoes->titulo . " - " . $voResultadoPostagem->titulo ?></title>
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
                                <h1 class="page-title"><?php echo $voResultadoPostagem->titulo ?></h1>
                                <ul id="breadcrumbs" class="breadcrumbs none-style">
                                    <li><a href="<?php echo URL ?>">Home</a></li>
                                    <li><a href="<?php echo URL . "blog" ?>">Blog</a></li>
                                    <li class="active"><?php echo $voResultadoPostagem->titulo ?></li>
                                </ul>    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entry-content">
                    <div class="container">
                        <div class="row">
                            <div class="content-area col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                <article class="blog-post post-box">
                                    <div class="entry-media">
                                        <img src="<?php echo URL . "wdadmin/uploads/blog_postagens/" . $voResultadoPostagem->imagem ?>" title="<?php echo $voResultadoPostagem->titulo ?>" alt="<?php echo $voResultadoPostagem->titulo ?>">
                                    </div>
                                    <div class="inner-post">
                                        <div class="entry-header">
                                            <div class="entry-meta">
                                                <span class="posted-on"> <a><i class="fas fa-clock"></i> <?php echo $voResultadoPostagem->data_publicacao ?></a></span>
                                            </div>
                                            <h3 class="entry-title"><?php echo $voResultadoPostagem->titulo ?></h3>
                                        </div>
                                        <div class="entry-summary">
                                            <?php echo $voResultadoPostagem->texto ?>
                                        </div>
                                        <div class="share-post">
                                            <a class="whatsapp" href="<?php echo "https://api.whatsapp.com/send?text=Leia mais em:https://" . $_SERVER['HTTP_HOST'] . URL . "post/" . $parametro ?>" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="blank" title="LinkedIn"><i class="fab fa-whatsapp"></i></a>
                                            <a class="face" href="<?php echo "http://www.facebook.com/sharer.php?u=https://" . $_SERVER['HTTP_HOST'] . URL . "post/" . $parametro ?>&title=<?php echo $voResultadoPostagem->titulo ?>" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            <a class="twit" href="<?php echo "http://twitter.com/share?url=https://" . $_SERVER['HTTP_HOST'] . URL . "post/" . $parametro ?>&title=<?php echo $voResultadoPostagem->titulo ?>" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                                            <a class="pint" href="<?php echo "http://pinterest.com/pin/create/button/?url=https://" . $_SERVER['HTTP_HOST'] . URL . "post/" . $parametro ?>&amp;media=<?php echo URL . "wdadmin/uploads/blog_postagens/" . $voResultadoPostagem->imagem ?>&amp;description=<?php echo substr(strip_tags(trim($voResultadoPostagem->texto)), 0, strrpos(substr(strip_tags(trim($voResultadoPostagem->texto)), 0, 140), ' ')) . '...'; ?>" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="blank" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                                        </div>
                                        <div class="post-relate">
                                            <h2>Posts Relacionados</h2>
                                            <div class="row">
                                                <?php
                                                $vsSqlPostsRelacionados = "
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
                                                    LIMIT 2
                                                ";
                                                $vrsExecutaPostsRelacionados = mysqli_query($Conexao, $vsSqlPostsRelacionados) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                                while ($voResultadoPostsRelacionados = mysqli_fetch_object($vrsExecutaPostsRelacionados)) {
                                                    ?>
                                                    <div class="col-md-6">
                                                        <div class="post-box blog-item relate-box">
                                                            <div class="post-inner">
                                                                <div class="entry-media">
                                                                    <a href="<?php echo URL . "post/" . $voResultadoPostsRelacionados->url_amigavel ?>">
                                                                        <img src="<?php echo URL . "wdadmin/uploads/blog_postagens/" . $voResultadoPostsRelacionados->imagem ?>" title="<?php echo $voResultadoPostsRelacionados->titulo ?>" alt="<?php echo $voResultadoPostsRelacionados->titulo ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="inner-post">
                                                                    <div class="entry-header">
                                                                        <div class="entry-meta">
                                                                            <span class="posted-on"><a><i class="fas fa-clock"></i> <?php echo $voResultadoPostsRelacionados->data_publicacao ?></a></span>
                                                                        </div>
                                                                        <h3 class="entry-title"><a href="<?php echo URL . "post/" . $voResultadoPostsRelacionados->url_amigavel ?>"><?php echo $voResultadoPostsRelacionados->titulo ?></a></h3>
                                                                    </div>
                                                                    <div class="btn-readmore">
                                                                        <a href="<?php echo URL . "post/" . $voResultadoPostsRelacionados->url_amigavel ?>"><i class="flaticon-right-arrow-1"></i>VER MAIS</a>
                                                                    </div>
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
                                </article>
                            </div>
                            <div class="widget-area primary-sidebar col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <aside id="search-2" class="widget widget_search">
                                    <form class="search-form">
                                        <input type="hidden" id="vsUrl" name="vsUrl" value="<?php echo URL ?>" />
                                        <input type="text" id="campo_buscar" name="campo_buscar" placeholder="Buscar notícias...">
                                        <button id="botao_buscar" type="button" class="search-submit"><i class="flaticon-search"></i></button>
                                    </form>
                                </aside>
                                <aside class="widget widget_recent_news">
                                    <h5 class="widget-title">Últimos Posts</h5>
                                    <ul class="recent-news clearfix">
                                        <?php
                                        $vsSqlUltimosPosts = "
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
                                        $vrsExecutaUltimosPosts = mysqli_query($Conexao, $vsSqlUltimosPosts) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                        while ($voResultadoUltimosPosts = mysqli_fetch_object($vrsExecutaUltimosPosts)) {
                                            ?>
                                            <li class="clearfix">
                                                <div class="thumb">
                                                    <a href="<?php echo URL . "post/" . $voResultadoUltimosPosts->url_amigavel ?>"><img src="<?php echo URL . "wdadmin/uploads/blog_postagens/" . $voResultadoUltimosPosts->imagem ?>" title="<?php echo $voResultadoUltimosPosts->titulo ?>" alt="<?php echo $voResultadoUltimosPosts->titulo ?>"></a>
                                                </div>
                                                <div class="entry-header">
                                                    <h6><a href="<?php echo URL . "post/" . $voResultadoUltimosPosts->url_amigavel ?>"><?php echo $voResultadoUltimosPosts->titulo ?></a></h6>
                                                    <span class="post-on"><span class="entry-date"><?php echo $voResultadoUltimosPosts->data_publicacao ?></span></span>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </aside>
                            </div>
                        </div>
                    </div>
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
} else {
    include "pages/404.php";
}