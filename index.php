<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>

  Coloque o conteudo do seu site aqui!!

  <!-- COPIE APARTIR DAQUI -->
    <!-- Bibliotecas -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <style type="text/css"> #toast-msg-aic, .toast-title { font-family: "Arial", sans-serif; text-decoration: none; outline: none; } #toast-msg-aic:hover {color: white;} </style>
    <!-- Exibe a notificação -->
    <?php
      // Coloca o site em PT-BR
      header("Content-type: text/html; charset=utf-8");

      // Consulta o IP do acessante
      @ $details = json_decode(file_get_contents("http://ipinfo.io/{$_SERVER['REMOTE_ADDR']}/json"));
      @ $hostname=gethostbyaddr($_SERVER['REMOTE_ADDR']);

      // Pega a query string da URL.
      $QUERY_STRING = preg_replace("%[^/a-zA-Z0-9@,_=]%", '', $_SERVER['QUERY_STRING']);

      // Organiza os dados recebidos
      $_SERVER['HTTP_REFERER'] = 0;
      if ($fileHandle) {
        $string ='"'.$QUERY_STRING.'","' // Pega tudo apos "?" na URL
          .$details->city.'","'  // Cidade
          .$details->region.'","' // Estado
          .$details->country.'","' // Pais
          .date("D dS M,Y h:i a").'"' // Data
          ."\n"
          ;
        @ fclose($fileHandle);
      }

      // Define as variaveis finais
      $Logcity = $details->city; // Cidade
      $Logregion = $details->region; // Estado
      $Logcountry = $details->country; // Pais

      // Define o UF
          if ($Logregion == "Rondônia") { $uf = "ro"; }
      elseif ($Logregion == "Acre") { $uf = "ac"; }
      elseif ($Logregion == "Amazonas") { $uf = "am"; }
      elseif ($Logregion == "Roraima") { $uf = "rr"; }
      elseif ($Logregion == "Pará") { $uf = "pa"; }
      elseif ($Logregion == "Roraima") { $uf = "rr"; }
      elseif ($Logregion == "Amapá") { $uf = "ap"; }
      elseif ($Logregion == "Tocantins") { $uf = "to"; }
      elseif ($Logregion == "Maranhão") { $uf = "ma"; }
      elseif ($Logregion == "Roraima") { $uf = "rr"; }
      elseif ($Logregion == "Piauí") { $uf = "pi"; }
      elseif ($Logregion == "Ceará") { $uf = "ce"; }
      elseif ($Logregion == "Rio Grande do Norte") { $uf = "rn"; }
      elseif ($Logregion == "Paraíba") { $uf = "pb"; }
      elseif ($Logregion == "Pernambuco") { $uf = "pe"; }
      elseif ($Logregion == "Alagoas") { $uf = "al"; }
      elseif ($Logregion == "Sergipe") { $uf = "se"; }
      elseif ($Logregion == "Bahia") { $uf = "ba"; }
      elseif ($Logregion == "Minas Gerais") { $uf = "mg"; }
      elseif ($Logregion == "Espírito Santo") { $uf = "es"; }
      elseif ($Logregion == "Rio de Janeiro") { $uf = "rj"; }
      elseif ($Logregion == "São Paulo") { $uf = "sp"; }
      elseif ($Logregion == "Paraná") { $uf = "pr"; }
      elseif ($Logregion == "Santa Catarina") { $uf = "sc"; }
      elseif ($Logregion == "Rio Grande do Sul") { $uf = "rs"; }
      elseif ($Logregion == "Mato Grosso do Sul") { $uf = "ms"; }
      elseif ($Logregion == "Mato Grosso") { $uf = "mt"; }
      elseif ($Logregion == "Goiás") { $uf = "go"; }
      elseif ($Logregion == "Distrito Federal") { $uf = "df"; }
        else { $uf = ""; }

      // Verifica se existe UF
      if (!empty($uf)) {
        //Se existir UF valido então busca o numero de casos no UF e exibe
        $json_file = file_get_contents("https://covid19-brazil-api.now.sh/api/report/v1/brazil/uf/".$uf);
        $json_str = json_decode($json_file, true);

        ?>
          <script type='text/javascript'>
            toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "13000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }

            toastr['warning']('<a id="toast-msg-aic" href="https://www.alissonoportifolio.com">Existem <?php echo $json_str['cases']; ?> casos confirmados de Corona Virus na região de <?php echo $Logcity; ?>, evite aglomerações!</a>', 'Corona Virus:');
          </script>
        <?php 
      }
      else {}

      // Desenvolvido por ALISSON CUSTODIO, www.alissonoportifolio.com
      // Codigo de uso livre, disponivel para download em: 
      // Cuide-se e não vire estatistica do COVID-19.
    ?>  
  <!-- PARA DE COPIAR AQUI -->

</body>
</html>