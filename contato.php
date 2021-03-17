<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
        <?php
        // CSS
        include 'php/css.php';
        ?>
        <title>Zabke Tecnologia - Contato</title>
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
                                <li><a href="index.php">Home</a></li>
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
                                            <p><a href="https://goo.gl/maps/yAjit9jTPBG8oSH99" target="_blank">Avenida Toledo, 34, Centro - Cascavel - PR</a></p>
                                        </div>
                                    </div>
                                    <div class="contact-info box-style1">
                                        <i class="fas fa-envelope"></i>
                                        <div class="info-text">
                                            <h6>Nossos e-mails:</h6>
                                            <p><a href="mailto:comercial2@webassist.com.br">comercial2@webassist.com.br</a></p>
                                            <p><a href="mailto:suporte3@webassist.com.br">suporte3@webassist.com.br</a></p>
                                        </div>
                                    </div>
                                    <div class="contact-info box-style1">
                                        <i class="fab fa-whatsapp"></i>
                                        <div class="info-text">
                                            <h6>Nossos Telefones:</h6>
                                            <p><a href="https://web.whatsapp.com/send?phone=554533035841&text&app_absent=0" target="_blank">(45) 3303-5841 - Suporte</a></p>
                                            <p><a href="https://web.whatsapp.com/send?phone=554533035840&text&app_absent=0" target="_blank">(45) 3303-5840 - Comercial</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <form method="post" class="wpcf7">
                                    <div class="main-form">
                                        <h2>Fale conosco</h2>
                                        <p>
                                            <input type="text" name="name" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Nome" required>
                                        </p>
                                        <p>
                                            <input type="email" name="email" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="E-mail" required>
                                        </p>
                                        <p>
                                            <input type="tel" name="name" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Telefone" required>
                                        </p>
                                        <p>
                                            <input type="text" name="email" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Assunto" required>
                                        </p>
                                        <p>
                                            <textarea name="message" cols="40" rows="10" class="" aria-invalid="false" placeholder="Mensagem..." required></textarea>
                                        </p>
                                        <p><button type="submit" class="octf-btn octf-btn-light">Enviar</button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="no-padding">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3617.369358756847!2d-53.4795939849953!3d-24.95354498401001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f3d6aa024d98d5%3A0xeb1300b50d8151e7!2sAv.%20Toledo%2C%2034%20-%20Centro%2C%20Cascavel%20-%20PR%2C%2085810-230!5e0!3m2!1spt-BR!2sbr!4v1615919700887!5m2!1spt-BR!2sbr" style="width:100%;height:500px;border:0;margin-bottom:-10px;" allowfullscreen="" loading="lazy"></iframe>
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