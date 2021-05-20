$(document).ready(function () {

    vsUrl = $("#vsUrl").val();

    /*ALTERA TITULO DA PAGINA*/
    $(this).attr("title", "WD Admin - Cadastro de Serviços");

    /*VALIDA TAMANHO E DIMENSÃO DAS IMAGENS DAS SOLUÇÕES*/
    $("#inputImagem").change(function () {

        if (this.files[0].size > 2000000) {
            AvisoPersonalizado("A imagem não pode ter mais que 2MB de tamanho.");
            $("#botao_salvar_solucao").attr("disabled", true);
        } else {
            var fr = new FileReader;

            fr.onload = function () {
                var img = new Image;

                img.onload = function () {
                    if (img.width > 1000 && this.height > 1000) {
                        AvisoPersonalizado("A imagem não pode ser maior que 1000x1000 pixels de dimensão.");
                        $("#botao_salvar_solucao").attr("disabled", true);
                    } else {
                        $("#botao_salvar_solucao").removeAttr("disabled");
                    }
                };
                img.src = fr.result;
            };
            fr.readAsDataURL(this.files[0]);
        }
    });

    /*VALIDA TAMANHO E DIMENSÃO DAS IMAGENS DAS SOLUÇÕES*/
    $("#inputImagemVideo").change(function () {

        if (this.files[0].size > 2000000) {
            AvisoPersonalizado("A imagem não pode ter mais que 2MB de tamanho.");
            $("#botao_salvar_video").attr("disabled", true);
        } else {
            var fr = new FileReader;

            fr.onload = function () {
                var img = new Image;

                img.onload = function () {
                    if (img.width > 1000 && this.height > 1000) {
                        AvisoPersonalizado("A imagem não pode ser maior que 1000x1000 pixels de dimensão.");
                        $("#botao_salvar_video").attr("disabled", true);
                    } else {
                        $("#botao_salvar_video").removeAttr("disabled");
                    }
                };
                img.src = fr.result;
            };
            fr.readAsDataURL(this.files[0]);
        }
    });

    if ($("#inputDescricao").length > 0) {
        tinymce.init({
            selector: "textarea#inputDescricao",
            language: 'pt_BR',
            language_url: vsUrl + '/js/pt_BR.js',
            theme: "modern",
            height: 370,
            width: '100%',
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

        });
    }
    
    if ($("#inputDetalhesPlanos").length > 0) {
        tinymce.init({
            selector: "textarea#inputDetalhesPlanos",
            language: 'pt_BR',
            language_url: vsUrl + '/js/pt_BR.js',
            theme: "modern",
            height: 300,
            width: '100%',
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",

        });
    }

    $("#inputImagem").change(function () {

        if (this.files[0].size > 2000000) {
            AvisoPersonalizado("A imagem não pode ter mais que 2MB de tamanho.");
            $("#botao_salvar").attr("disabled", true);
        } else {
            var fr = new FileReader;

            fr.onload = function () {
                var img = new Image;

                img.onload = function () {
                    if (img.width > 1920 && this.height > 1080) {
                        AvisoPersonalizado("A imagem não pode ser maior que 1920x1080 pixels de dimensão.");
                        $("#botao_salvar").attr("disabled", true);
                    } else {
                        $("#botao_salvar").removeAttr("disabled");
                    }
                };
                img.src = fr.result;
            };
            fr.readAsDataURL(this.files[0]);
        }
    });

    $("#form_servicos").on('submit', (function (e) {

        Loading();

        e.preventDefault();
        $.ajax({
            url: vsUrl + "controllers/SalvaDadosServicos.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data > 0) {
                    $("#inputIdServicos").val(data);
                    $("#hiddenIdServicos").val(data);
                    CloseLoading();
                    Sucesso();
                } else {
                    CloseLoading();
                    Aviso();
                }
            },
            error: function () {
                CloseLoading();
                Erro();
            }
        });
        return false;
    }));

    /*BOTÃO NOVO*/
    $("#botao_nova_solucao").click(function (e) {
        limpa_form_solucoes();
    });

    /*BOTÃO NOVO*/
    $("#botao_novo_diferencial").click(function (e) {
        limpa_form_diferenciais();
    });

    /*BOTÃO NOVO*/
    $("#botao_nova_metrica").click(function (e) {
        limpa_form_metricas();
    });

    /*BOTÃO NOVO*/
    $("#botao_novo_plano").click(function (e) {
        limpa_form_plano();
    });

    /*BOTÃO NOVO*/
    $("#botao_novo_video").click(function (e) {
        limpa_form_video();
    });

    /*BOTÃO NOVO*/
    $("#botao_nova_chamada_teste").click(function (e) {
        limpa_form_chamada_teste();
    });

    /*SUBMETE FORM SOLUÇÕES*/
    $("#form_solucoes").on('submit', (function (e) {

        Loading();

        e.preventDefault();
        $.ajax({
            url: vsUrl + "controllers/SalvaDadosSolucoes.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data > 0) {
                    limpa_form_solucoes();
                    consulta_solucoes();
                    Sucesso();
                } else {
                    CloseLoading();
                    Aviso();
                }
            },
            error: function () {
                CloseLoading();
                Erro();
            }
        });
        return false;
    }));
    
    /*SUBMETE FORM DIFERENCIAIS*/
    $("#form_diferenciais").on('submit', (function (e) {

        Loading();

        e.preventDefault();
        $.ajax({
            url: vsUrl + "controllers/SalvaDadosDiferenciais.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data > 0) {
                    limpa_form_diferenciais();
                    consulta_diferenciais();
                    Sucesso();
                } else {
                    CloseLoading();
                    Aviso();
                }
            },
            error: function () {
                CloseLoading();
                Erro();
            }
        });
        return false;
    }));

    /*SUBMETE FORM MÉTRICAS*/
    $("#form_metricas").on('submit', (function (e) {

        Loading();

        e.preventDefault();
        $.ajax({
            url: vsUrl + "controllers/SalvaDadosMetricas.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data > 0) {
                    limpa_form_metricas();
                    consulta_metricas();
                    Sucesso();
                } else {
                    CloseLoading();
                    Aviso();
                }
            },
            error: function () {
                CloseLoading();
                Erro();
            }
        });
        return false;
    }));

    /*SUBMETE FORM PLANOS*/
    $("#form_planos").on('submit', (function (e) {

        Loading();

        e.preventDefault();
        $.ajax({
            url: vsUrl + "controllers/SalvaDadosPlanos.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data > 0) {
                    limpa_form_planos();
                    consulta_planos();
                    Sucesso();
                } else {
                    CloseLoading();
                    Aviso();
                }
            },
            error: function () {
                CloseLoading();
                Erro();
            }
        });
        return false;
    }));

    /*SUBMETE FORM VÍDEO*/
    $("#form_video").on('submit', (function (e) {

        Loading();

        e.preventDefault();
        $.ajax({
            url: vsUrl + "controllers/SalvaDadosVideo.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data > 0) {
                    limpa_form_video();
                    consulta_video();
                    Sucesso();
                } else {
                    CloseLoading();
                    Aviso();
                }
            },
            error: function () {
                CloseLoading();
                Erro();
            }
        });
        return false;
    }));

    /*SUBMETE FORM CHAMADA TESTE*/
    $("#form_chamada_teste").on('submit', (function (e) {

        Loading();

        e.preventDefault();
        $.ajax({
            url: vsUrl + "controllers/SalvaDadosChamadaTeste.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data > 0) {
                    limpa_form_chamada_teste();
                    consulta_chamada_teste();
                    Sucesso();
                } else {
                    CloseLoading();
                    Aviso();
                }
            },
            error: function () {
                CloseLoading();
                Erro();
            }
        });
        return false;
    }));

    /*CHAMA FUNÇÃO PARA VERIFICAR EDIÇÃO OU CADASTRO*/
    verifica_edicao();

});

/*FUNÇÃO QUE VERIFICA SE EXISTE UM ID*/
function verifica_edicao() {

    /*PEGA ID*/
    var id = $("#hiddenIdServicos").val();

    /*LIMPA AREA DE IMAGEM*/
    $(".dropify-clear").click();

    /*CASO EXISTA O ID, EXECUTA A FUNÇÃO DE EDIÇÃO*/
    if (id !== "") {
        edita_servicos(id);
        consulta_solucoes();
        consulta_diferenciais();
        consulta_metricas();
        consulta_planos();
        consulta_video();
        consulta_chamada_teste();
        $('ul li a[href="#solucoes"]').removeClass("disabled");
        $('ul li a[href="#diferenciais"]').removeClass("disabled");
        $('ul li a[href="#metricas"]').removeClass("disabled");
        $('ul li a[href="#planos"]').removeClass("disabled");
        $('ul li a[href="#video"]').removeClass("disabled");
        $('ul li a[href="#chamada_teste"]').removeClass("disabled");
    } else {
        $('ul li a[href="#solucoes"]').addClass("disabled");
        $('ul li a[href="#diferenciais"]').addClass("disabled");
        $('ul li a[href="#metricas"]').addClass("disabled");
        $('ul li a[href="#planos"]').addClass("disabled");
        $('ul li a[href="#video"]').addClass("disabled");
        $('ul li a[href="#chamada_teste"]').addClass("disabled");
        $("#botao_visualizar_manual").addClass('disabled');
        CloseLoading();
    }
}

/*CARREGA DADOS DO SERVIÇO SELECIONADO*/
function edita_servicos(viIdServicos) {

    $.ajax({
        url: vsUrl + "controllers/RetornaServicosSelecionado.php",
        type: "POST",
        dataType: "json",
        async: false,
        data: ({
            viIdServicos: viIdServicos
        }),
        success: function (data) {
            if (data !== 0) {
                $("#inputTitulo").val(data[0].titulo);
                $("#inputTituloSecao").val(data[0].titulo_secao);
                $("#inputResumo").val(data[0].resumo);
                $("#inputDescricao").val(data[0].descricao);
                $("#inputIcone").val(data[0].icone);
                $("#inputImagemAtual").val(data[0].imagem);
                $("#imgImagemAtual").attr("src", vsUrl + "uploads/servicos/" + data[0].imagem);
                $("#inputPosicao").val(data[0].posicao);
                $("#inputStatus").val(data[0].status);
                $("#inputLayout").val(data[0].layout);
                $("#inputPlanoPersonalizado").val(data[0].plano_personalizado);
                CloseLoading();
            } else {
                $("#inputIdServicos").val("");
                CloseLoading();
                AvisoPersonalizado("Dados não encontrados!");
            }
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA CORES DA SOLUÇÃO*/
function consulta_solucoes() {

    var viIdServicos = $("#hiddenIdServicos").val();

    $.ajax({
        url: vsUrl + "controllers/RetornaSolucoes.php",
        type: "POST",
        dataType: "json",
        async: false,
        data: ({
            viIdServicos: viIdServicos
        }),
        success: function (data) {
            if (data != 0) {

                $("#tabela_solucoes tbody").html("");
                for (i = 0; i < data.length; i++) {
                    $("#tabela_solucoes tbody").append(
                            "<tr>" +
                            "<td>" + data[i].titulo + "</td>" +
                            "<td>" + data[i].texto + "</td>" +
                            "<td>" + data[i].icone + "</td>" +
                            "<td><img src='" + vsUrl + "uploads/solucoes/" + data[i].imagem + "' class='img-fluid' style='height:35px'></td>" +
                            "<td align=\"center\">" +
                            "<button type=\"button\" class=\"btn btn-secondary btn-sm\" onclick=\"edita_dados_solucao(" + data[i].id_solucoes + ")\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Editar solução " + data[i].titulo + "\"><i class=\"far fa-edit fa-fw\" aria-hidden=\"true\"></i></button>&nbsp;" +
                            "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"confirma_exclusao_registro(" + data[i].id_solucoes + ", 'solucoes', 'solucoes', '" + data[i].imagem + "', '', '', '', '');\" data-toggle=\"tooltip\" title=\"Remover " + data[i].titulo + "\"><i class=\"far fa-trash-alt fa-fw\" aria-hidden=\"true\"></i></button>" +
                            "</td>" +
                            "</tr>"
                            );
                    $('[data-toggle="tooltip"]').tooltip();
                    CloseLoading();
                }
            } else {
                $("#tabela_solucoes tbody").html("");
                $("#tabela_solucoes tbody").append(
                        "<tr>" +
                        "<td align=\"center\" colspan=\"10\">Nenhuma solução encontrada!</td>" +
                        "</tr>"
                        );
                CloseLoading();
            }
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA CORES DA DIFERENCIAIS*/
function consulta_diferenciais() {

    var viIdServicos = $("#hiddenIdServicos").val();

    $.ajax({
        url: vsUrl + "controllers/RetornaDiferenciais.php",
        type: "POST",
        dataType: "json",
        async: false,
        data: ({
            viIdServicos: viIdServicos
        }),
        success: function (data) {
            if (data != 0) {

                $("#tabela_diferenciais tbody").html("");
                for (i = 0; i < data.length; i++) {
                    $("#tabela_diferenciais tbody").append(
                            "<tr>" +
                            "<td>" + data[i].descricao + "</td>" +
                            "<td>" + data[i].texto + "</td>" +
                            "<td>" + data[i].icone + "</td>" +
                            "<td align=\"center\">" +
                            "<button type=\"button\" class=\"btn btn-secondary btn-sm\" onclick=\"edita_dados_diferenciais(" + data[i].id_diferenciais + ")\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Editar diferencial " + data[i].descricao + "\"><i class=\"far fa-edit fa-fw\" aria-hidden=\"true\"></i></button>&nbsp;" +
                            "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"confirma_exclusao_registro(" + data[i].id_diferenciais + ", 'diferenciais', 'diferenciais', '', '', '', '');\" data-toggle=\"tooltip\" title=\"Remover " + data[i].descricao + "\"><i class=\"far fa-trash-alt fa-fw\" aria-hidden=\"true\"></i></button>" +
                            "</td>" +
                            "</tr>"
                            );
                    $('[data-toggle="tooltip"]').tooltip();
                    CloseLoading();
                }
            } else {
                $("#tabela_diferenciais tbody").html("");
                $("#tabela_diferenciais tbody").append(
                        "<tr>" +
                        "<td align=\"center\" colspan=\"10\">Nenhuma diferencial encontrado!</td>" +
                        "</tr>"
                        );
                CloseLoading();
            }
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA CORES DA MÉTRICAS*/
function consulta_metricas() {

    var viIdServicos = $("#hiddenIdServicos").val();

    $.ajax({
        url: vsUrl + "controllers/RetornaMetricas.php",
        type: "POST",
        dataType: "json",
        async: false,
        data: ({
            viIdServicos: viIdServicos
        }),
        success: function (data) {
            if (data != 0) {

                $("#tabela_metricas tbody").html("");
                for (i = 0; i < data.length; i++) {
                    $("#tabela_metricas tbody").append(
                            "<tr>" +
                            "<td>" + data[i].descricao + "</td>" +
                            "<td>" + data[i].valor + "</td>" +
                            "<td align=\"center\">" +
                            "<button type=\"button\" class=\"btn btn-secondary btn-sm\" onclick=\"edita_dados_metrica(" + data[i].id_metricas + ")\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Editar Métrica " + data[i].valor + " " + data[i].descricao + "\"><i class=\"far fa-edit fa-fw\" aria-hidden=\"true\"></i></button>&nbsp;" +
                            "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"confirma_exclusao_registro(" + data[i].id_metricas + ", 'metricas', 'metricas', '', '', '');\" data-toggle=\"tooltip\" title=\"Remover " + data[i].descricao + "\"><i class=\"far fa-trash-alt fa-fw\" aria-hidden=\"true\"></i></button>" +
                            "</td>" +
                            "</tr>"
                            );
                    $('[data-toggle="tooltip"]').tooltip();
                    CloseLoading();
                }
            } else {
                $("#tabela_metricas tbody").html("");
                $("#tabela_metricas tbody").append(
                        "<tr>" +
                        "<td align=\"center\" colspan=\"10\">Nenhuma Métrica encontrada!</td>" +
                        "</tr>"
                        );
                CloseLoading();
            }
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA CORES DO PLANO*/
function consulta_planos() {

    var viIdServicos = $("#hiddenIdServicos").val();

    $.ajax({
        url: vsUrl + "controllers/RetornaPlanos.php",
        type: "POST",
        dataType: "json",
        async: false,
        data: ({
            viIdServicos: viIdServicos
        }),
        success: function (data) {
            if (data != 0) {

                $("#tabela_planos tbody").html("");
                for (i = 0; i < data.length; i++) {
                    $("#tabela_planos tbody").append(
                            "<tr>" +
                            "<td>" + data[i].descricao + "</td>" +
                            "<td>" + data[i].detalhes + "</td>" +
                            "<td>" + data[i].valor + "</td>" +
                            "<td>" + data[i].icone + "</td>" +
                            "<td align=\"center\">" +
                            "<button type=\"button\" class=\"btn btn-secondary btn-sm\" onclick=\"edita_dados_plano(" + data[i].id_planos + ")\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Editar Métrica " + data[i].descricao + "\"><i class=\"far fa-edit fa-fw\" aria-hidden=\"true\"></i></button>&nbsp;" +
                            "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"confirma_exclusao_registro(" + data[i].id_planos + ", 'planos', 'planos', '', '', '');\" data-toggle=\"tooltip\" title=\"Remover " + data[i].descricao + "\"><i class=\"far fa-trash-alt fa-fw\" aria-hidden=\"true\"></i></button>" +
                            "</td>" +
                            "</tr>"
                            );
                    $('[data-toggle="tooltip"]').tooltip();
                    CloseLoading();
                }
            } else {
                $("#tabela_planos tbody").html("");
                $("#tabela_planos tbody").append(
                        "<tr>" +
                        "<td align=\"center\" colspan=\"10\">Nenhum plano encontrado!</td>" +
                        "</tr>"
                        );
                CloseLoading();
            }
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA CORES DO PLANO*/
function consulta_video() {

    var viIdServicos = $("#hiddenIdServicos").val();

    $.ajax({
        url: vsUrl + "controllers/RetornaVideo.php",
        type: "POST",
        dataType: "json",
        async: false,
        data: ({
            viIdServicos: viIdServicos
        }),
        success: function (data) {
            if (data != 0) {

                $("#tabela_video tbody").html("");
                for (i = 0; i < data.length; i++) {
                    $("#tabela_video tbody").append(
                            "<tr>" +
                            "<td>" + data[i].titulo + "</td>" +
                            "<td>" + data[i].detalhes + "</td>" +
                            "<td><img src='" + vsUrl + "uploads/video/" + data[i].imagem + "' class='img-fluid' style='height:35px'></td>" +
                            "<td>" + data[i].link + "</td>" +
                            "<td align=\"center\">" +
                            "<button type=\"button\" class=\"btn btn-secondary btn-sm\" onclick=\"edita_dados_video(" + data[i].id_video + ")\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Editar Métrica " + data[i].titulo + "\"><i class=\"far fa-edit fa-fw\" aria-hidden=\"true\"></i></button>&nbsp;" +
                            "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"confirma_exclusao_registro(" + data[i].id_video + ", 'video', 'video', '', '', '');\" data-toggle=\"tooltip\" title=\"Remover " + data[i].titulo + "\"><i class=\"far fa-trash-alt fa-fw\" aria-hidden=\"true\"></i></button>" +
                            "</td>" +
                            "</tr>"
                            );
                    $('[data-toggle="tooltip"]').tooltip();
                    CloseLoading();
                }
            } else {
                $("#tabela_video tbody").html("");
                $("#tabela_video tbody").append(
                        "<tr>" +
                        "<td align=\"center\" colspan=\"10\">Nenhum vídeo encontrado!</td>" +
                        "</tr>"
                        );
                CloseLoading();
            }
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA CORES DA SOLUÇÃO*/
function consulta_chamada_teste() {

    var viIdServicos = $("#hiddenIdServicos").val();

    $.ajax({
        url: vsUrl + "controllers/RetornaChamadaTeste.php",
        type: "POST",
        dataType: "json",
        async: false,
        data: ({
            viIdServicos: viIdServicos
        }),
        success: function (data) {
            if (data != 0) {

                $("#tabela_chamada_teste tbody").html("");
                for (i = 0; i < data.length; i++) {
                    $("#tabela_chamada_teste tbody").append(
                            "<tr>" +
                            "<td>" + data[i].titulo + "</td>" +
                            "<td>" + data[i].texto + "</td>" +
                            "<td>" + data[i].link + "</td>" +
                            "<td><img src='" + vsUrl + "uploads/chamada_teste/" + data[i].imagem + "' class='img-fluid' style='height:35px'></td>" +
                            "<td align=\"center\">" +
                            "<button type=\"button\" class=\"btn btn-secondary btn-sm\" onclick=\"edita_dados_chamada_teste(" + data[i].id_chamada_teste + ")\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Editar Chamada de teste " + data[i].titulo + "\"><i class=\"far fa-edit fa-fw\" aria-hidden=\"true\"></i></button>&nbsp;" +
                            "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"confirma_exclusao_registro(" + data[i].id_chamada_teste + ", 'chamada_teste', 'chamada_teste', '" + data[i].imagem + "', '', '', '', '');\" data-toggle=\"tooltip\" title=\"Remover " + data[i].titulo + "\"><i class=\"far fa-trash-alt fa-fw\" aria-hidden=\"true\"></i></button>" +
                            "</td>" +
                            "</tr>"
                            );
                    $('[data-toggle="tooltip"]').tooltip();
                    CloseLoading();
                }
            } else {
                $("#tabela_chamada_teste tbody").html("");
                $("#tabela_chamada_teste tbody").append(
                        "<tr>" +
                        "<td align=\"center\" colspan=\"10\">Nenhuma chamada encontrada!</td>" +
                        "</tr>"
                        );
                CloseLoading();
            }
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA DADOS DA SOLUÇÃO SELECIONADA*/
function edita_dados_solucao(viIdSolucoes) {

    Loading();

    $.ajax({
        url: vsUrl + "controllers/RetornaSolucoesSelecionado.php",
        type: "POST",
        dataType: "json",
        data: ({
            viIdSolucoes: viIdSolucoes
        }),
        success: function (data) {
            limpa_form_solucoes();
            $("#inputIdSolucoes").val(viIdSolucoes);
            $("#inputTituloSolucoes").val(data[0].titulo);
            $("#inputTextoSolucoes").val(data[0].texto);
            $("#inputIconeSolucoes").val(data[0].icone);
            $("#inputImagemSolucoesAtual").val(data[0].imagem);
            $("#imgImagemSolucoesAtual").attr("src", vsUrl + "uploads/solucoes/" + data[0].imagem);
            CloseLoading();
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA DADOS DA SOLUÇÃO SELECIONADA*/
function edita_dados_diferenciais(viIdDiferenciais) {

    Loading();

    $.ajax({
        url: vsUrl + "controllers/RetornaDiferenciaisSelecionado.php",
        type: "POST",
        dataType: "json",
        data: ({
            viIdDiferenciais: viIdDiferenciais
        }),
        success: function (data) {
            limpa_form_solucoes();
            $("#inputIdDiferenciais").val(viIdDiferenciais);
            $("#inputDescricaoDiferenciais").val(data[0].descricao);
            $("#inputTextoDiferenciais").val(data[0].texto);
            $("#inputIconeDiferenciais").val(data[0].icone);
            CloseLoading();
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA DADOS DA MÉTRICA SELECIONADA*/
function edita_dados_metrica(viIdMetricas) {

    Loading();

    $.ajax({
        url: vsUrl + "controllers/RetornaMetricasSelecionado.php",
        type: "POST",
        dataType: "json",
        data: ({
            viIdMetricas: viIdMetricas
        }),
        success: function (data) {
            limpa_form_metricas();
            $("#inputIdMetricas").val(viIdMetricas);
            $("#inputDescricaoMetricas").val(data[0].descricao);
            $("#inputImagemMetricasAtual").val(data[0].imagem);
            $("#imgImagemMetricasAtual").attr("src", vsUrl + "uploads/metricas/" + data[0].imagem);
            $("#inputValorMetricas").val(data[0].valor);
            CloseLoading();
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA DADOS DO PLANO*/
function edita_dados_plano(viIdPlanos) {

    Loading();

    $.ajax({
        url: vsUrl + "controllers/RetornaPlanosSelecionado.php",
        type: "POST",
        dataType: "json",
        data: ({
            viIdPlanos: viIdPlanos
        }),
        success: function (data) {
            limpa_form_planos();
            $("#inputIdPlanos").val(viIdPlanos);
            $("#inputDescricaoPlanos").val(data[0].descricao);
            $("#inputDetalhesPlanos").val(data[0].detalhes);
            $("#inputValorPlanos").val(data[0].valor);
            $("#inputIconePlanos").val(data[0].icone);
            CloseLoading();
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA DADOS DO VÍDEO*/
function edita_dados_video(viIdVideo) {

    Loading();

    $.ajax({
        url: vsUrl + "controllers/RetornaVideoSelecionado.php",
        type: "POST",
        dataType: "json",
        data: ({
            viIdVideo: viIdVideo
        }),
        success: function (data) {
            limpa_form_planos();
            $("#inputIdVideo").val(viIdVideo);
            $("#inputTituloVideo").val(data[0].titulo);
            $("#inputDetalhesVideo").val(data[0].detalhes);
            $("#inputImagemVideoAtual").val(data[0].imagem);
            $("#imgImagemVideoAtual").attr("src", vsUrl + "uploads/video/" + data[0].imagem);
            $("#inputLinkVideo").val(data[0].link);
            CloseLoading();
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*CARREGA DADOS DA CHAMADA SELECIONADA*/
function edita_dados_chamada_teste(viIdChamadaTeste) {

    Loading();

    $.ajax({
        url: vsUrl + "controllers/RetornaChamadaTesteSelecionado.php",
        type: "POST",
        dataType: "json",
        data: ({
            viIdChamadaTeste: viIdChamadaTeste
        }),
        success: function (data) {
            limpa_form_metricas();
            $("#inputIdChamadaTeste").val(viIdChamadaTeste);
            $("#inputTituloChamadaTeste").val(data[0].titulo);
            $("#inputImagemChamadaTesteAtual").val(data[0].imagem);
            $("#imgImagemChamadaTesteAtual").attr("src", vsUrl + "uploads/chamada_teste/" + data[0].imagem);
            $("#inputTextoChamadaTeste").val(data[0].texto);
            $("#inputTextoBotaoChamadaTeste").val(data[0].texto_botao);
            $("#inputLinkChamadaTeste").val(data[0].link);
            CloseLoading();
        },
        error: function () {
            CloseLoading();
            Erro();
        }
    });
}

/*LIMPA FORMULÁRIO SOLUÇÕES*/
function limpa_form_solucoes() {
    $(".dropify-clear").click();
    $("#inputIdSolucoes").val("");
    $("#inputTituloSolucoes").val("");
    $("#inputTextoSolucoes").val("");
    $("#inputIconeSolucoes").val("");
    $("#inputImagemSolucoesAtual").val("");
    $("#imgImagemSolucoesAtual").attr("src", "");
    $("#inputImagemSolucoes").val("");
}

/*LIMPA FORMULÁRIO DIFERENCIAIS*/
function limpa_form_diferenciais() {
    $("#inputIdDiferenciais").val("");
    $("#inputDescricaoDiferenciais").val("");
    $("#inputTextoDiferenciais").val("");
    $("#inputIconeDiferenciais").val("");
}

/*LIMPA FORMULÁRIO MÉTRICAS*/
function limpa_form_metricas() {
    $("#inputIdMetricas").val("");
    $("#inputDescricaoMetricas").val("");
    $("#inputValorMetricas").val("");
    $("#inputImagemMetricasAtual").val("");
    $("#imgImagemMetricasAtual").attr("src", "");
    $("#inputImagemMetricas").val("");
}

/*LIMPA FORMULÁRIO PLANOS*/
function limpa_form_planos() {
    $("#inputIdPlanos").val("");
    $("#inputDescricaoPlanos").val("");
    $("#inputDetalhesPlanos").val("");
    $("#inputValorPlanos").val("");
    $("#inputIconePlanos").val("");
}

/*LIMPA FORMULÁRIO VÍDEOS*/
function limpa_form_video() {
    $(".dropify-clear").click();
    $("#inputIdVideo").val("");
    $("#inputTituloVideo").val("");
    $("#inputDetalhesVideo").val("");
    $("#inputImagemVideoAtual").val("");
    $("#imgImagemVideoAtual").attr("src", "");
    $("#inputLinkVideo").val("");
}

/*LIMPA FORMULÁRIO CHAMADA TESTE*/
function limpa_form_chamada_teste() {
    $(".dropify-clear").click();
    $("#inputIdChamadaTeste").val("");
    $("#inputTituloChamadaTeste").val("");
    $("#inputImagemChamadaTesteAtual").val("");
    $("#imgImagemChamadaTesteAtual").attr("src", "");
    $("#inputTextoChamadaTeste").val("");
    $("#inputTextoBotaoChamadaTeste").val("");
    $("#inputLinkChamadaTeste").val("");
}