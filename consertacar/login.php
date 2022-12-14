<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Acesso ao Sistema</title>

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>
            #erro{
                display: none;
            }
        </style>
    </head>
    <body onresize="tamanho()">
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading titulo_login">Acesse sua conta</div>
                        <div class="panel-body">
                            <div class="iconmelon">
                                <img src="img/logo.png" alt="Lexpo" width="180">
                            </div>                            
                            <form role="form" method="POST">
                                <div id="erro" class="alert alert-danger">
                                </div>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Informe seu e-mail" name="email" id="email" type="email" autofocus="" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Informe sua senha" name="senha" id="senha" type="password" value="" required="required" />
                                    </div>
                                    <div class="form-group">                                                                                
                                        <button id="logar" class="btn btn-block btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Entrar</button>                                                                  
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            /*!function tamanho($) {
                $("body").css("padding-top", ($(window).height() - $(".login-panel").height()) / 2);
            }(window.jQuery);*/
    
            !function tamanho() {
                $("body").css("padding-top", ($(window).height() - $(".login-panel").height()) / 2);
            }(window.jQuery);

            $("#logar").click(function () {
                var email = $("#email").val();
                var senha = $("#senha").val();

                $.ajax({
                    url: 'ajax/login.php',
                    dataType: 'text',
                    data: {email: email, senha: senha},
                    type: 'POST',
                    success: function (resposta) {
                        if (resposta) {
                            $("#erro").html(resposta);
                            $("#erro").css("display", "block");
                            $("body").css("padding-top", ($(window).height() - $(".login-panel").height()) / 2);
                        } else {
                            $(location).attr("href", "painel.php");
                        }
                    }
                });
                return false;
            });
        </script>	
    </body>

</html>

