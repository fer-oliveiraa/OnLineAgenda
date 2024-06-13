<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="agenda.css"> 
    <script>
        // Função para atualizar o relógio
        var dayarray = new Array("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado");
        var montharray = new Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");

        function getthedate() {
            var mydate = new Date();
            var year = mydate.getFullYear();
            var day = mydate.getDay();
            var month = mydate.getMonth();
            var daym = mydate.getDate();
            if (daym < 10)
                daym = "0" + daym;
            var hours = mydate.getHours();
            var minutes = mydate.getMinutes();
            var seconds = mydate.getSeconds();
            if (minutes <= 9)
                minutes = "0" + minutes;
            if (seconds <= 9)
                seconds = "0" + seconds;
            var cdate = "<u><b><h4><small><font color='#175b9c' face=''>" + dayarray[day] + " - " + daym + " " + montharray[month] + " " + year + " | " + hours + ":" + minutes + ":" + seconds + " " + "</font></small></h4></b></u>";
            if (document.getElementById)
                document.getElementById("clock").innerHTML = cdate;
            else
                document.write(cdate);
        }

        function goforit() {
            setInterval(getthedate, 1000);
        }
    </script>
</head>

<body onLoad="goforit()">

    <!-- Bloco esquerdo do layout -->
    <div style="float:left; width: 70%; height:100px; background-image: url(Oxxnline_centro_inferior.jpg);">
        <h2><span id="clock"></span></h2>
        <div class="quadrado"> 
            
            
                <?php
                // Função para ler e formatar o conteúdo do arquivo agenda.txt
                function _ler_txt_agenda($filename) {
                    $dir_arquivo_parametro = $filename;
                    $data = file($dir_arquivo_parametro);

                    // Iterar por cada linha e aplicar a formatação desejada
                    foreach ($data as $line) {
                        $line = trim($line); // Remove espaços em branco do início e do fim da linha
                        if (empty($line)) {
                            continue; // Pular linhas vazias
                        }
                        if (strpos($line, '*') === 0) {
                            // Linhas que começam com '*' são formatadas em amarelo usadas para observações
                            echo '<h5><font color="yellow">' . htmlspecialchars($line) . '</font></h5>';
                        } elseif (strpos($line, '-') === 0) {
                            // Linhas que começam com '-' são formatadas em azul
                            echo '<h5><font color="blue">' . htmlspecialchars($line) . '</font></h5>';
                        } else {
                            // Outras linhas são formatadas em vermelho
                            echo '<h5><font color="red">' . htmlspecialchars($line) . '</font></h5>';
                        }
                    }
                }

                // Chama a função para ler e exibir o conteúdo do arquivo agenda.txt
                _ler_txt_agenda('agenda.txt');
                ?>
            
        </div>
    </div>

    <!-- Bloco direito do layout -->
    <div style="float:left; width: 40%; height:100px;">
        <h1>
            <p>
                <h3><font color="#175b9c">"Entre as dificuldades se esconde a oportunidade. (Albert Einstein)"</font></h3>
                <h3>
                    <marquee>
                        <font color="blue">Versão</font>
                        <font color="red">3.0.20230612 = [ EM PRODUÇÃO ]</font>
                    </marquee>
                </h3>
                <i>
                    <h3><font color="#175b9c">Link download http://onlineitba.ddns.com.br/online.html</font></h3>
                </i>
            </p>
        </h1>
        <div style="clear: both;"></div>
        <div id="natal" style="height: 400px; width: 500px; padding-top: 100px; border-radius: 10px; font-weight: bold;">
            <img src="OnLine-logo-60.jpg" alt="Descrição da Imagem" class="custom-image" style="display: block; margin: auto;">
        </div>
    </div>

</body>

</html>
