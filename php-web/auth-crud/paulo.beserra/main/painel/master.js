/*
* GNU GENERAL PUBLIC LICENSE
* Version 3, 29 June 2007
*
* Copyright (C) 2007 Free Software Foundation, Inc. <https://fsf.org/>
* Everyone is permitted to copy and distribute verbatim copies
* of this license document, but changing it is not allowed.
* https://www.gnu.org/licenses/gpl-3.0.txt
*/

/*
* By Paulo Roberto Júnior
*/

/*
* Tags Html para eventos JavaScript
* E validação Front-End dos campos
*/
const nota   = document.getElementById('inp-nota')
const btn_nota   = document.getElementById('btn-nota')
const btn_nota_close = document.getElementById('btn-nota-close')
const btn_addnota = document.getElementById('add-nota')
const btn_editnota = document.getElementById('btn-edit')

function deleteAnnotation() {
    swal({
        title: "Are you sure?",
        text: "Do you really want to delete this item?",
        icon: "warning",
        buttons: ["Cancel", "Delete Now"],
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal({
                title: "Deleted",
                text: "The list item has been deleted!",
                icon: "success",
            });
        } else {
            swal("The item is not deleted!");
        }
    });
}

function addAnnotation() {
    swal({
        title: "Adicionar nota",
        text: "Tem certeza que deseja adicionar está nota?",
        icon: "warning",
        buttons: ["Cancelar", "Adicionar Nota"],
        dangerMode: false,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: '../php/main.php',
                type: 'POST',
                dataType: 'json',
                data: 'option=insert-nota&nota='+nota.value,
                beforeSend: function() {
                    showInfoToast()
                },
                success: function(response) {
                    if (response['cod'] == 500 ) {
                        swal("Não foi possível adicionar a nota!");
                    } else {
                        swal({
                            title: "Adicionado!",
                            text: "Está nota foi adicionado a sua lista de notas.",
                            icon: "success",
                        });
                        nota.value = ''
                    }
                },
                error: function() {
                    swal("Erro no servidor!");
                }
            }) 
            
        } else {
            swal("Está nota não foi adicionada!");
        }
    });
}

function editNota() {
    swal({
        title: "Editar nota(s)",
        text: "Tem certeza que deseja editar está(s) nota(s)?",
        icon: "warning",
        buttons: ["Cancelar", "Editar Nota(s)"],
        dangerMode: false,
    })
    .then((willDelete) => {
        notas_select = document.querySelectorAll('input[name=item_checkbox]')
        if (willDelete) {

            itens_selected = []
            for (i = 0; i < notas_select.length; i++) {
                if (notas_select[i].checked) {
                    $.ajax({
                        url: '../php/main.php',
                        type: 'POST',
                        dataType: 'json',
                        data: 'option=edit-nota&nota='+nota.value+'&cod_nota='+notas_select[i].value,
                        success: function(response) {
                            if (response['cod'] == 500 ) {
                                swal("Não foi possível adicionar a nota!");
                            } else {
                                swal({
                                    title: "Editado!",
                                    text: "Está nota foi editada a sua lista de notas.",
                                    icon: "success",
                                });
                                nota.value = ''
                            }
                        },
                        error: function() {
                            console.log('error');
                        }
                    }) 
                }
            }   
        } else {
            swal("Está nota não foi editada!");
        }
    });
}

btn_addnota.onclick = function () {
    addAnnotation()
}

btn_editnota.onclick = function () {
    editNota()
}