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
            <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->favicon ?>" />
            <?php
            // CSS
            include 'php/css.php';
            ?>
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
                                        <?php /*
                                          <div class="author-bio">
                                          <div class="author-image">
                                          <img src="images/autor.jpg" alt="Tom Black" class="avatar">
                                          </div>
                                          <div class="author-info">
                                          <p class="title text-primary font-second">Autor</p>
                                          <h6>Tom Black</h6>
                                          <p class="des">He is attended the State University of New York at Oswego where he majored in English Literature and Creative Writing.</p>
                                          <div class="author-socials">
                                          <a href="facebook.com" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                          <a href="instagram.com" target="_blank"><i class="fab fa-instagram"></i> </a>
                                          <a href="linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i> </a>
                                          </div>
                                          </div>
                                          </div>
                                          <div class="post-nav clearfix">
                                          <div class="post-prev">
                                          <a href="post.php">
                                          <div class="thumb">
                                          <img src="images/post-autor1.jpg" alt="">
                                          </div>
                                          <div class="entry-header">
                                          <h6>Does Magento Shared  Hosting Suit You?</h6>
                                          <span class="post-on"><span class="entry-date">10:00 16/03/2021</span></span>
                                          </div>
                                          </a>
                                          </div>
                                          <div class="post-next">
                                          <a href="post.php">
                                          <div class="thumb">
                                          <img src="images/post-autor2.jpg" alt="">
                                          </div>
                                          <div class="entry-header">
                                          <h6>Plan Your Project  with Your Software</h6>
                                          <span class="post-on"><span class="entry-date">10:00 16/03/2021</span></span>
                                          </div>
                                          </a>
                                          </div>
                                          </div>
                                         */ ?>
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
                                                    <a href="<?php echo URL . "post/" . $voResultadoUltimosPosts->url_amigavel ?>"><img src="<?php echo URL . "wdadmin/uploads/blog_postagens/" . $voResultadoUltimosPosts->imagem ?>" alt=""></a>
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
            <a id="back-to-top" href="#" class="show"><i class="flaticon-up-arrow"></i></a>

            <?php
            // SCRIPT
            include 'php/script.php';
            ?>

        </body>
    </html>
    <?php
} else {
    include "pages/404.php";
}