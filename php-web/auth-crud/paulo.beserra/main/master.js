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
const butt_html   = document.getElementById('id-send')

butt_html.onclick = function () {
    
  $.ajax({
    url: './php/login.php',
    type: 'POST',
    dataType: 'json',
    data: 'login='+user_html.value+'&senha='+pass_html.value,
    beforeSend: function() {
      showInfoToast()
    },
    success: function(response) {
      //butt_html.classList.remove('is-loading')
      if (response['cod'] == 500 ) {
        showWarningToast()
      } else {
        window.location.href = './painel'
      }
    },
    error: function() {
      resetToastPosition()
    }
  })
}