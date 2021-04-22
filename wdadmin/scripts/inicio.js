$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();

    $('#div_tabela_contatos_recebidos').hide();
    $('#div_aviso_contatos_recebidos').hide();

    carrega_contatos_recebidos();

    CloseLoading();
});

/*PESQUISA OS PRODUTOS*/
function carrega_contatos_recebidos() {

    $.ajax({
        url: vsUrl + "controllers/RetornaContatosRecebidos.php",
        type: "POST",
        dataType: "json",
        async: false,
        success: function (data) {
            if (data !== 0) {
                $("#tabela_contatos_recebidos tbody").html("");
                $('#tabela_contatos_recebidos').DataTable().destroy();
                var table = $('#tabela_contatos_recebidos').DataTable({
                    "language": {
                        "url": vsUrl + "assets/plugins/datatables/Portuguese-Brasil.json"
                    },
                    "lengthMenu": [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "Todos"]],
                    fixedHeader: false,
                    colReorder: false,
                    responsive: true,
                    "processing": true,
                    data: data,
                    "columns": [
                        {"data": "id_contatos_recebidos"},
                        {"data": "nome"},
                        {"data": "data_recebimento_formatado"},
                        {
                            "render": function (data, type, row) {
                                return "<span class=\"label label-" + row.status_class + "\">" + row.status + "</span>";
                            }
                        },
                        {
                            "render": function (data, type, row) {
                                return "<button class=\"btn btn-sm btn-outline-secondary\" onclick=\"abre_modal_visualizar_contato(" + row.id_contatos_recebidos + ", '" + row.data_recebimento_formatado + "', '" + row.nome + "', '" + row.email + "', '" + row.telefone + "', '" + row.assunto + "', '" + row.mensagem + "')\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Visualizar contato de " + row.nome + "\"><i class=\"far fa-eye fa-fw\" aria-hidden=\"true\"></i></button>";
                            }
                        }
                    ],
                    'columnDefs': [
                        {
                            "targets": 0,
                            "className": "text-center"
                        },
                        {
                            "targets": 2,
                            "className": "text-center"
                        },
                        {
                            "targets": 3,
                            "className": "text-center"
                        },
                        {
                            "targets": 4,
                            "className": "text-center"
                        }
                    ],
                    "drawCallback": function (settings) {
                        $('[data-toggle="tooltip"]').tooltip();
                    },
                    "order": [[0, "desc"]]
                });
                $('#div_aviso_contatos_recebidos').hide();
                $('#div_tabela_contatos_recebidos').show();
            } else {
                $('#div_tabela_contatos_recebidos').hide();
                $('#div_aviso_contatos_recebidos').show();
            }
            CloseLoading();
        },
        error: function () {
            $("#tabela_contatos_recebidos tbody").html("");
            CloseLoading();
            Erro();
        }
    });
}