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
        // SCRIPT
        include 'php/script.php';
        ?>
        <script src="<?php echo URL . "wdadmin/js/jquery.mask.min.js" ?>" rel="stylesheet"></script>
        <script src="<?php echo URL . "wdadmin/assets/plugins/sweetalert/sweetalert.min.js" ?>"></script>
        <link href="<?php echo URL . "wdadmin/assets/plugins/sweetalert/sweetalert.min.css" ?>" rel="stylesheet">
        <script src="<?php echo URL . "wdadmin/js/contato.js" ?>"></script>

    </body>
</html>