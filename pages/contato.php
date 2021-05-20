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
        <meta property="og:title" content="<?php echo $voResultadoConfiguracoes->titulo . " - Contato" ?>"/>
        <meta property="og:description" content="<?php echo $voResultadoConfiguracoes->descricao ?>"/>
        <meta property="og:image" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "contato" ?>"/>
        <meta property="og:url" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "contato" ?>"/>
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
        <title><?php echo $voResultadoConfiguracoes->titulo . " - Contato" ?></title>
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
                            <h1 class="page-title">Contato</h1>
                            <ul id="breadcrumbs" class="breadcrumbs none-style">
                                <li><a href="<?php echo URL ?>">Home</a></li>
                                <li class="active">Contato</li>
                            </ul>    
                        </div>
                    </div>
                </div>
                <section class="contact-page">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="contact-left">
                                    <div class="ot-heading">
                                        <span>// Contato</span>
                                        <h2 class="main-heading">Fale Conosco</h2>
                                    </div>
                                    <div class="space-5"></div>
                                    <p>Possua alguma dúvida ou sugestão? Sinta-se a vontade para contatar-nos</p>
                                    <div class="contact-info box-style1">
                                        <i class="fas fa-map-marker-alt"></i>                    
                                        <div class="info-text">
                                            <h6>Nosso Endereço:</h6>
                                            <?php
                                            $vsSqlEndereco = "SELECT endereco, cidade, estado, link FROM enderecos WHERE id_enderecos = 1";
                                            $vrsExecutaEndereco = mysqli_query($Conexao, $vsSqlEndereco) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                            while ($voResultadoEndereco = mysqli_fetch_object($vrsExecutaEndereco)) {
                                                ?>
                                                <p><a href="<?php echo $voResultadoEndereco->link ?>" target="_blank"><?php echo $voResultadoEndereco->endereco . " - " . $voResultadoEndereco->cidade . " - " . $voResultadoEndereco->estado ?></a></p>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="contact-info box-style1">
                                        <i class="fas fa-envelope"></i>
                                        <div class="info-text">
                                            <h6>Nossos e-mails:</h6>
                                            <?php
                                            $vsSqlEmails = "SELECT link FROM contatos WHERE tipo = 2";
                                            $vrsExecutaEmails = mysqli_query($Conexao, $vsSqlEmails) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                            while ($voResultadoEmails = mysqli_fetch_object($vrsExecutaEmails)) {
                                                ?>
                                                <p><a href="<?php echo "mailto:" . $voResultadoEmails->link ?>"> <?php echo $voResultadoEmails->link ?></a></p>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="contact-info box-style1">
                                        <i class="fab fa-whatsapp"></i>
                                        <div class="info-text">
                                            <h6>Nossos Telefones:</h6>
                                            <?php
                                            $vsSqlTelefones = "SELECT titulo, link FROM contatos WHERE tipo = 1";
                                            $vrsExecutaTelefones = mysqli_query($Conexao, $vsSqlTelefones) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                            while ($voResultadoTelefones = mysqli_fetch_object($vrsExecutaTelefones)) {
                                                ?>
                                                <p><a href="<?php echo "https://api.whatsapp.com/send?l=pt_BR&phone=55" . str_replace(array("(", ")", "-", " "), "", $voResultadoTelefones->link) ?>" target="_blank"><?php echo $voResultadoTelefones->link . " - " . $voResultadoTelefones->titulo ?></a></p>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <form id="form_contato" method="post" class="wpcf7">
                                    <input type="hidden" id="vsUrl" name="vsUrl" value="<?php echo URL ?>">
                                    <input type="hidden" id="vsEmailContato" name="vsEmailContato" value="<?php echo EMAIL_CONTATO ?>">
                                    <input type="hidden" id="vsNomeEmpresa" name="vsNomeEmpresa" value="<?php echo $voResultadoConfiguracoes->nome_empresa ?>">
                                    <div class="main-form">
                                        <h2>Fale conosco</h2>
                                        <p>
                                            <input type="text" name="vsNome" id="vsNome" placeholder="Nome" required>
                                        </p>
                                        <p>
                                            <input type="email" name="vsEmail" id="vsEmail" placeholder="E-mail" required>
                                        </p>
                                        <p>
                                            <input type="tel" name="vsTelefone" id="vsTelefone" placeholder="Telefone" required>
                                        </p>
                                        <p>
                                            <input type="text" name="vsAssunto" id="vsAssunto" placeholder="Assunto" required>
                                        </p>
                                        <p>
                                            <textarea name="vsMensagem" id="vsMensagem" placeholder="Mensagem" required></textarea>
                                        </p>
                                        <p>
                                            <button id="botao_enviar_mensagem" class="octf-btn octf-btn-light" type="submit">Enviar Mensagem</button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="no-padding">
                    <?php
                    $vsSqlMapa = "SELECT mapa FROM enderecos WHERE id_enderecos = 1";
                    $vrsExecutaMapa = mysqli_query($Conexao, $vsSqlMapa) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                    while ($voResultadoMapa = mysqli_fetch_object($vrsExecutaMapa)) {
                        ?>
                        <?php echo $voResultadoMapa->mapa ?>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <?php
            // RODAPÉ
            include 'php/rodape.php';
            ?>

        </div>
        <a id="back-to-top" href="#" class="show"><i class="flaticon-up-arrow"></i></a>

        <?php
        // CSS
        include 'php/css.php';

        // SCRIPT
        include 'php/script.php';
        ?>
        <script src="<?php echo URL . "wdadmin/js/jquery.mask.min.js" ?>" rel="stylesheet"></script>
        <script src="<?php echo URL . "wdadmin/assets/plugins/sweetalert/sweetalert.min.js" ?>"></script>
        <link href="<?php echo URL . "wdadmin/assets/plugins/sweetalert/sweetalert.min.css" ?>" rel="stylesheet">
        <script src="<?php echo URL . "wdadmin/js/contato.js" ?>"></script>

    </body>
</html>