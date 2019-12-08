<?php

/* Required for loggin session */
session_start();

if (isset($_SESSION["user"]))
    unset($_SESSION["user"]);

?>

<!doctype html>
<html class="no-js" lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="./favicon.svg" type="image/svg" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="./plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="./plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="./plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="./plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="./plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
        <link rel="stylesheet" href="./dist/css/theme.min.css">
        <script src="./src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('./img/auth/trees_green_fog_forest_shroud_top_view.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href="./"><img src="./favicon.svg" width="100px" height="100px;" alt=""></a>
                            </div>
                            <h3>Sign In</h3>
                            <p>Faça login para prosseguir!</p>
                            
                                <div class="form-group">
                                    <input type="text" class="form-control" autocomplete=off name="user" placeholder="Email ou Nickname" autofocus required="" value="admin" id="id-user">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" autocomplete=off name="passwd" placeholder="Senha" required="" value="password" id="id-pass">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;Lembre de mim</span>
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a href="./forgot-password.html">Esqueceu a senha ?</a>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme" id="id-send">Sign In</button>
                                </div>
                            
                            <div class="register">
                                <p>Não possui uma conta? <a href="./register.html">Criar uma conta</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script>window.jQuery || document.write('<script src="./src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="./plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="./plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="./plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="./plugins/screenfull/dist/screenfull.js"></script>
        <script src="./plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <script src="./dist/js/theme.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        <script src="./master.js"></script>
        <script>
        (function($) {
          showSuccessToast = function() {
            'use strict';
            resetToastPosition();
            $.toast({
              heading: 'Success',
              text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
              showHideTransition: 'slide',
              icon: 'success',
              loaderBg: '#f96868',
              position: 'top-right'
            })
          };
          showInfoToast = function() {
            'use strict';
            resetToastPosition();
            $.toast({
              heading: 'Info',
              text: 'Submetendo formulário...',
              showHideTransition: 'slide',
              icon: 'info',
              loaderBg: '#46c35f',
              position: 'top-right'
            })
          };
          showWarningToast = function() {
            'use strict';
            resetToastPosition();
            $.toast({
              heading: 'Atenção',
              text: 'Usuário ou senha são inválidos.',
              showHideTransition: 'slide',
              icon: 'warning',
              loaderBg: '#57c7d4',
              position: 'top-right'
            })
          };
          showDangerToast = function() {
            'use strict';
            resetToastPosition();
            $.toast({
              heading: 'Error',
              text: 'Servidor temporariamente indisponível.',
              showHideTransition: 'slide',
              icon: 'error',
              loaderBg: '#f2a654',
              position: 'top-right'
            })
          };
          showToastPosition = function(position) {
            'use strict';
            resetToastPosition();
            $.toast({
              heading: 'Positioning',
              text: 'Specify the custom position object or use one of the predefined ones',
              position: String(position),
              icon: 'success',
              stack: false,
              loaderBg: '#f96868'
            })
          }
          showToastInCustomPosition = function() {
            'use strict';
            resetToastPosition();
            $.toast({
              heading: 'Custom positioning',
              text: 'Specify the custom position object or use one of the predefined ones',
              icon: 'success',
              position: {
                left: 120,
                top: 120
              },
              stack: false,
              loaderBg: '#f96868'
            })
          }
          resetToastPosition = function() {
            $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
            $(".jq-toast-wrap").css({
              "top": "",
              "left": "",
              "bottom": "",
              "right": ""
            }); //to remove previous position style
          }
        })(jQuery);
        </script>
    </body>
</html>
