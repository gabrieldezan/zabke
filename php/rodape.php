<footer id="site-footer" class="site-footer footer-v2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->logo_secundaria ?>" title="<?php echo $voResultadoConfiguracoes->titulo ?>" alt="<?php echo $voResultadoConfiguracoes->titulo ?>">
            </div>
        </div>
        <div class="space-60"></div>
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6">
                <div class="contact-info box-style2 ft-contact-info">
                    <div class="box-icon"><i class="fas fa-map-marker-alt"></i></div>
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
            <div class="col-md-4 col-sm-6">
                <div class="contact-info box-style2 ft-contact-info">
                    <div class="box-icon"><i class="fas fa-envelope"></i></div>
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
            <div class="col-md-4 col-sm-6">
                <div class="contact-info box-style2 ft-contact-info">
                    <div class="box-icon"><i class="fas fa-phone"></i></div>
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
        <div class="space-65"></div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="footer-menu">
                    <ul>
                        <li><a href="<?php echo URL ?>">Home</a></li>
                        <li><a href="<?php echo URL . "a-zabke" ?>">A Zabke</a></li>
                        <li><a href="<?php echo URL . "clientes" ?>">Clientes</a></li>
                        <li><a href="<?php echo URL . "blog" ?>">Blog</a></li>
                        <li><a href="<?php echo URL . "contato" ?>">Contato</a></li>
                    </ul>
                    <ul>
                        <?php
                        $vsSqlServicos2 = "SELECT titulo, url_amigavel FROM servicos WHERE status = 1 AND layout = 1 ORDER BY titulo";
                        $vrsExecutaServicos2 = mysqli_query($Conexao, $vsSqlServicos2) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                        while ($voResultadoServicos2 = mysqli_fetch_object($vrsExecutaServicos2)) {
                            ?>
                            <li><a href="<?php echo URL . "app/" . $voResultadoServicos2->url_amigavel ?>"><?php echo $voResultadoServicos2->titulo ?></a></li>
                            <?php
                        }
                        ?>
                        <?php
                        $vsSqlServicos1 = "SELECT titulo, url_amigavel FROM servicos WHERE status = 1 AND layout = 0 ORDER BY titulo";
                        $vrsExecutaServicos1 = mysqli_query($Conexao, $vsSqlServicos1) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                        while ($voResultadoServicos1 = mysqli_fetch_object($vrsExecutaServicos1)) {
                            ?>
                            <li><a href="<?php echo URL . "web/" . $voResultadoServicos1->url_amigavel ?>"><?php echo $voResultadoServicos1->titulo ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="space-20"></div>
                <div class="space-26"></div>
                <div class="ft-list-icon">
                    <?php
                    $vsSqlRedesSociais = "SELECT titulo, link, icone FROM redes_sociais ORDER BY id_redes_sociais";
                    $vrsExecutaRedesSociais = mysqli_query($Conexao, $vsSqlRedesSociais) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                    while ($voResultadoRedesSociais = mysqli_fetch_object($vrsExecutaRedesSociais)) {
                        ?>
                        <a class="<?php echo $voResultadoRedesSociais->titulo ?>" href="<?php echo $voResultadoRedesSociais->link ?>" target="_blank"><i class="<?php echo $voResultadoRedesSociais->icone ?>"></i></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <p class="copyright-text v2"><b><?php echo $voResultadoConfiguracoes->nome_empresa ?></b>. Todos direitos reservados.</p>
            </div>
            <div class="col-md-6">
                <div class="logo-wd">
                    <a href="https://webdezan.com.br" target="_blank">
                        <img src="<?php echo URL . "images/logo-wd.png" ?>" title="Web Dezan - Agência Digital" alt="Web Dezan - Agência Digital">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>