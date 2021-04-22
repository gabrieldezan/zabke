<?php
$filtro = str_replace("-", "|", url_amigavel($parametro));

// definir o numero de itens por pagina
$itens_por_pagina = 10;

// pegar a pagina atual
$pagina = intval($numero_pagina - 1 . "0");

//verifica se a página é menor que 0
if ($pagina < 0) {
    include "pages/404.php";
} else {

    // pega a quantidade total de objetos no banco de dados
    $vsSqlTotal = "
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
            bp.titulo REGEXP '$filtro' AND
            bp.data_publicacao < '$data_hora_atual' AND
            bs.status = 1 AND
            bc.status = 1
        ORDER BY
            bp.data_publicacao DESC
    ";
    $vrsExecutaTotal = mysqli_query($Conexao, $vsSqlTotal) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
    $viNumRowsTotal = mysqli_num_rows($vrsExecutaTotal);
    $voResultadoTotal = mysqli_fetch_object($vrsExecutaTotal);

    // puxar produtos do banco
    $vsSqlBusca = "
        $vsSqlTotal
        LIMIT $pagina, $itens_por_pagina
    ";
    $vrsExecutaBusca = mysqli_query($Conexao, $vsSqlBusca) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
    $viNumRowsBusca = mysqli_num_rows($vrsExecutaBusca);

    // definir numero de páginas
    $num_paginas = ceil($viNumRowsTotal / $itens_por_pagina);
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
            <title><?php echo $voResultadoConfiguracoes->titulo . " - Busca" ?></title>
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
                                <h1 class="page-title">Resultados de "<?php echo $filtro ?>"</h1>
                                <ul id="breadcrumbs" class="breadcrumbs none-style">
                                    <li><a href="<?php echo URL ?>">Home</a></li>
                                    <li><a href="<?php echo URL . "blog" ?>">Blog</a></li>
                                    <li class="active">Busca</li>
                                </ul>    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entry-content">
                    <div class="container">
                        <div class="blog-grid pgrid">
                            <div class="row">
                                <?php
                                /* CONSULTA POSTS */
                                if ($viNumRowsBusca > 0) {
                                    while ($voResultadoBusca = mysqli_fetch_object($vrsExecutaBusca)) {
                                        ?>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <article class="post-box blog-item">
                                                <div class="post-inner">
                                                    <div class="entry-media">
                                                        <a href="<?php echo URL . "post/" . $voResultadoBusca->url_amigavel ?>">
                                                            <img src="<?php echo URL . "wdadmin/uploads/blog_postagens/" . $voResultadoBusca->imagem ?>" title="<?php echo $voResultadoBusca->titulo ?>" alt="<?php echo $voResultadoBusca->titulo ?>">
                                                        </a>
                                                    </div>
                                                    <div class="inner-post">
                                                        <div class="entry-header">
                                                            <div class="entry-meta">
                                                                <span class="posted-on"><a><i class="fas fa-clock"></i> <?php echo $voResultadoBusca->data_publicacao ?></a></span>
                                                            </div>
                                                            <h3 class="entry-title"><a href="<?php echo URL . "post/" . $voResultadoBusca->url_amigavel ?>"><?php echo $voResultadoBusca->titulo ?></a></h3>
                                                        </div>
                                                        <div class="btn-readmore">
                                                            <a href="<?php echo URL . "post/" . $voResultadoBusca->url_amigavel ?>"><i class="flaticon-right-arrow-1"></i>VER MAIS</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <div class="col-lg-12">
                                        <div class="no-results-found">
                                            <h1>Nenhum resultado encontrado!</h1>
                                            <a class="octf-btn octf-btn-third" href="<?php echo URL . "blog" ?>">Voltar ao blog</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <ul class="page-pagination none-style">
                                        <li><a class="prev page-numbers" href="<?php echo URL . "busca/" . $filtro ?>"><i class="flaticon-back"></i></a></li>
                                        <?php
                                        $limite = 10;

                                        if ($num_paginas <= $limite) {
                                            $minimo = 0;
                                            $maximo = $num_paginas;
                                        } else if ($numero_pagina < $limite) {
                                            $minimo = 0;
                                            $maximo = $limite;
                                        } else if ($numero_pagina > ($num_paginas - 9)) {
                                            $minimo = $num_paginas - $limite;
                                            $maximo = $num_paginas;
                                        } else {
                                            $minimo = $numero_pagina - 6;
                                            $maximo = $numero_pagina + 5;
                                        }

                                        for ($i = $minimo; $i < $maximo; $i++) {
                                            $estilo = "";
                                            if ($numero_pagina == $i + 1)
                                                $estilo = "current";
                                            ?>
                                            <li><a class="page-numbers <?php echo $estilo ?>" href="<?php echo URL . "busca/" . $filtro . "/" ?><?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                                        <?php } ?>
                                        <li><a class="next page-numbers" href="<?php echo URL . "busca/" . $filtro . "/" . $num_paginas ?>"><i class="flaticon-right-arrow-1"></i></a></li>
                                    </ul>
                                </div>
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
}