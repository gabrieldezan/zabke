<header id="site-header" class="site-header header-style-2 header-fullwidth sticky-header header-static">
    <div class="header-topbar">
        <div class="octf-area-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <ul class="topbar-info">
                            <?php
                            $vsSqlEmails = "SELECT link FROM contatos WHERE tipo = 2";
                            $vrsExecutaEmails = mysqli_query($Conexao, $vsSqlEmails) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                            while ($voResultadoEmails = mysqli_fetch_object($vrsExecutaEmails)) {
                                ?>
                                <li><i class="fas fa-envelope"></i><a href="<?php echo "mailto:" . $voResultadoEmails->link ?>"> <?php echo $voResultadoEmails->link ?></a></li>
                                <?php
                            }
                            ?>
                            <?php
                            $vsSqlHorario = "SELECT horario_atendimento FROM enderecos WHERE id_enderecos = 1";
                            $vrsExecutaHorario = mysqli_query($Conexao, $vsSqlHorario) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                            while ($voResultadoHorario = mysqli_fetch_object($vrsExecutaHorario)) {
                                ?>
                                <li><i class="fas fa-clock"></i> <?php echo $voResultadoHorario->horario_atendimento ?></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 text-right">
                        <div class="topbar-right">
                            <ul class="social-list">
                                <?php
                                $vsSqlRedesSociais = "SELECT titulo, link, icone FROM redes_sociais ORDER BY id_redes_sociais";
                                $vrsExecutaRedesSociais = mysqli_query($Conexao, $vsSqlRedesSociais) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoRedesSociais = mysqli_fetch_object($vrsExecutaRedesSociais)) {
                                    ?>
                                    <li><a class="<?php echo $voResultadoRedesSociais->titulo ?>" href="<?php echo $voResultadoRedesSociais->link ?>" target="_blank"><i class="<?php echo $voResultadoRedesSociais->icone ?>"></i></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="octf-main-header">
        <div class="octf-area-wrap">
            <div class="container-fluid octf-mainbar-container">
                <div class="octf-mainbar">
                    <div class="octf-mainbar-row octf-row">
                        <div class="octf-col logo-col">
                            <div id="site-logo" class="site-logo">
                                <a href="<?php echo URL ?>">
                                    <img src="<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->logo_principal ?>" title="<?php echo $voResultadoConfiguracoes->titulo ?>" alt="<?php echo $voResultadoConfiguracoes->titulo ?>">
                                </a>
                            </div>
                        </div>
                        <div class="octf-col menu-col">
                            <nav id="site-navigation" class="main-navigation">
                                <ul class="menu">
                                    <li><a href="<?php echo URL ?>">Home</a></li>
                                    <li><a href="<?php echo URL . "a-zabke" ?>">A Zabke</a></li>
                                    <li class="menu-item-has-children"><a class="cursor-pointer">Soluções</a>
                                        <ul class="sub-menu">
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
                                    </li>
                                    <li><a href="<?php echo URL . "clientes" ?>">Clientes</a></li>
                                    <li><a href="<?php echo URL . "blog" ?>">Blog</a></li>
                                    <li><a href="<?php echo URL . "contato" ?>">Contato</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="octf-col cta-col text-right">
                            <div class="octf-btn-cta">
                                <div class="octf-header-module">
                                    <div class="toggle_search octf-cta-icons">
                                        <i class="flaticon-search"></i>
                                    </div>
                                    <div class="h-search-form-field collapse">
                                        <div class="h-search-form-inner">
                                            <form class="search-form">
                                                <label>
                                                    <span class="screen-reader-text">Pesquise no blog:</span>
                                                    <input type="hidden" id="vsUrl" name="vsUrl" value="<?php echo URL ?>" />
                                                    <input type="text" id="campo_buscar" name="campo_buscar" placeholder="Buscar no blog...">
                                                </label>
                                                <button id="botao_buscar" type="button" class="search-submit"><i class="flaticon-search"></i></button>
                                            </form>
                                        </div>                                  
                                    </div>
                                </div>

                                <div class="octf-header-module">
                                    <div class="btn-cta-group contact-header">
                                        <i class="fab fa-whatsapp"></i>
                                        <div class="cinfo-header">
                                            <span>Fale conosco</span>
                                            <?php
                                            $vsSqlTelefones = "SELECT titulo, link FROM contatos WHERE tipo = 1";
                                            $vrsExecutaTelefones = mysqli_query($Conexao, $vsSqlTelefones) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                            while ($voResultadoTelefones = mysqli_fetch_object($vrsExecutaTelefones)) {
                                                ?>
                                                <span class="main-text">
                                                    <a href="<?php echo "https://api.whatsapp.com/send?l=pt_BR&phone=55" . str_replace(array("(", ")", "-", " "), "", $voResultadoTelefones->link) ?>" target="_blank"><?php echo $voResultadoTelefones->link . " - " . $voResultadoTelefones->titulo ?></a>
                                                </span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="octf-header-module">
                                    <div class="btn-cta-group btn-cta-header">
                                        <a class="octf-btn octf-btn-third" href="<?php echo URL . "contato" ?>">Faça um orçamento</a>
                                    </div>
                                </div>

                            </div>                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header_mobile">
        <div class="container">
            <div class="mlogo_wrapper clearfix">
                <div class="mobile_logo">
                    <a href="<?php echo URL ?>">
                        <img src="<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->logo_principal ?>" title="<?php echo $voResultadoConfiguracoes->titulo ?>" alt="<?php echo $voResultadoConfiguracoes->titulo ?>">
                    </a>
                </div>
                <div id="mmenu_toggle">
                    <button></button>
                </div>
            </div>
            <div class="mmenu_wrapper">
                <div class="mobile_nav collapse">
                    <ul id="menu-main-menu" class="mobile_mainmenu">
                        <li><a href="<?php echo URL ?>">Home</a></li>
                        <li><a href="<?php echo URL . "a-zabke" ?>">A Zabke</a></li>
                        <li class="menu-item-has-children"><a class="cursor-pointer">Soluções</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo URL . "app" ?>">App</a></li>
                                <li><a href="<?php echo URL . "web" ?>">Sistema WA</a></li>
                                <li><a href="<?php echo URL . "web" ?>">Sistema WP</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo URL . "clientes" ?>">Clientes</a></li>
                        <li><a href="<?php echo URL . "blog" ?>">Blog</a></li>
                        <li><a href="<?php echo URL . "contato" ?>">Contato</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>