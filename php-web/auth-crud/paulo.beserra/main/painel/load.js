
const content = document.getElementById('content')
const btn_del = document.getElementById('btn-del')
const btn_refresh = document.getElementById('btn-refresh') 

function insertAnnotations(response) {
    for (i=0; i < response.length; i++) {
        text_temp = 
            `<div class="list-item" id="it${response[i].cod}">
                <div class="item-inner">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="${response[i].cod}" name="item_checkbox" value="${response[i].cod}">
                        <span class="custom-control-label">&nbsp;</span>
                    </label>
                    <div class="list-title"><a href="javascript:void(0)">${response[i].mesg}</a></div>
                    <div class="list-actions">
                        <a href="#!"><i class="ik ik-eye-off"></i></a>
                        <a href="#!"><i class="ik ik-edit-2"></i></a>
                        <a href="#!"><i class="ik ik-trash-2"></i></a>
                    </div>
                </div>
                <div class="qickview-wrap">
                    <div class="desc">
                        <p>Essa nota foi escrita pelo usuário com id ${response[i].cod_user} na data ${response[i].data_post}.</p>
                    </div>
                </div>
            </div>`
        content.insertAdjacentHTML('beforeend', text_temp)
    }
    notas = document.querySelectorAll('input[name=item_checkbox]')
    btn_del.onclick = function() {
        itens = []
        for (i = 0; i < notas.length; i++) {
            if (notas[i].checked) {
                itens.push(notas[i].value);
            }
        }
        console.log(itens)

        swal({
            title: "Are you sure?",
            text: "Do you really want to delete this item?",
            icon: "warning",
            buttons: ["Cancel", "Delete Now"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                if (itens.length > 0) {
                    isSuccess = true
                    for (i = 0; i < itens.length; i++) {
                        $.ajax({
                            url: '../php/main.php',
                            type: 'POST',
                            dataType: 'json',
                            data: 'option=del-nota&cod_nota='+itens[i],
                            //beforeSend: function() {
                            //    showInfoToast()
                            //},
                            success: function(response) {
                                if (response['cod'] == 500 )
                                    isSuccess = false
                            },
                        })    
                    }
                    if (isSuccess) {
                        swal({
                            title: "Deletado!",
                            text: "Nota(s) deletada(s) da sua lista de notas.",
                            icon: "success",
                        });
                    } else {
                        swal({
                            title: "Ops!",
                            text: "Não foi possível deletar a(s) nota(s).",
                            icon: "warning",
                        });
                    }
                } else {
                    swal({
                        title: "Ops!",
                        text: "Ops, nem um item selecionado.",
                        icon: "warning",
                    });
                }
            } else {
                swal("O item não será deletado!");
            }
        });

    }
}


function getNotas() {
    $.ajax({
        url: '../php/main.php',
        type: 'POST',
        dataType: 'json',
        data: 'option=get-notas',
        beforeSend: function() {
            showInfoToastLoad()
        },
        success: function(response) {
            insertAnnotations(response.response)
        },
        error: function() {
            showDangerToastLoad()
        }
    })
}

getNotas()

btn_refresh.onclick = function() {
    content.innerHTML = '<div class="list-item-wrap" id="content">'
    getNotas()
}