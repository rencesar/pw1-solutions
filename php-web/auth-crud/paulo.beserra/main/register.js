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

const user_html   = document.getElementById('id-user')
const pass_html   = document.getElementById('id-pass')
const pass_html_2   = document.getElementById('id-pass-2')
const butt_html   = document.getElementById('id-send')

butt_html.onclick = function () {
    if (pass_html.value != pass_html_2.value) {
        showWarningToast()
    } else {
        $.ajax({
            url: './php/register.php',
            type: 'POST',
            dataType: 'json',
            data: 'nick='+user_html.value+'&passwd='+pass_html.value,
            beforeSend: function() {
              showInfoToast()
            },
            success: function(response) {
              if (response['cod'] == 500) {
                showDangerToast()
              } else {
                if (response['cod'] == 401) {
                    showWarningToastUser()
                } else {
                    showSuccessToast()
                    user_html.value = ""
                    pass_html.value = ""
                    pass_html_2.value = ""
                }
              }
            },
            error: function() {
              resetToastPosition()
            }
        })   
    }
}
