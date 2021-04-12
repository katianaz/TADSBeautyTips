<?php
  require('credentials.php');
  $table = "cadastro_grr20205277";

  function verificar_campo($texto) {
    $texto = trim($texto);
    $texto = stripslashes($texto);
    $texto = htmlspecialchars($texto);
    return $texto;
  }

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // define variables and set to empty values
  $nameErr = $emailErr = $dataErr = $sexoErr = $receberErr = $corcabeloErr = $novidadeErr = "";
  $name = $email = $data = $sexo = $telefone = $corcabelo = $tipocabelo = $corpele = $tipopele = $corolhos = $mensagem = $receber = $novidade = "";
  $error = false;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

//validação do  nome
    if (empty($_POST["name"])) {
      $nameErr = "Nome é requirido";
      $error = true;
    } else {
      $name = verificar_campo($_POST["name"]);
      // verificar se o nome contem apenas letras e espaço
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Apenas letras e espaçamento é permitido";
      }
    }

//validação do email
    if (empty($_POST["email"])) {
      $emailErr = "Email é requirido";
      $error = true;
    } else {
// verificar se o formato de email estiver correto
      if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
        $emailErr = "Email inválido";
        $error = true;
      } else {
        $email = verificar_campo($_POST["email"]);
      }
    }

//validação Nascimento
      if (empty($_POST["data"])) {
        $dataErr = "Data de nascimento é requirido";
        $error = true;
      } else {
        if (strtotime($_POST["data"]) > strtotime("now")) {
          $dataErr = "Data de nascimento não pode ser maior que a data atual";
          $error = true;
        }
          $data = verificar_campo($_POST["data"]);
     }

 //validar telefone
      if (empty($_POST["Telefone"])) {
        $telErr = "Telefone é requirido";
        $error = true;
      } else {
        $tel = verificar_campo($_POST["Telefone"]);
     }
    /*verificar se os campos contem apenas números
       if (!eregi("^\([0-9]{3}\) [0-9]{4}-[0-9]{4}$",$tel)) {
         $telErr = "Telefone inválido";
         $error = true;
       }*/
     }

      if (empty($_POST["corcabelo"])) {
        $corcabeloErr = "Selecione um";
        $error = true;
       } else {
        $corcabelo = verificar_campo($_POST["corcabelo"]);
     }

       if (empty($_POST["sexo"])) {
        $sexoErr = "Sexo é requerido";
        $error = true;
      } else {
        $sexo = verificar_campo($_POST["sexo"]);
     }

       if (empty($_POST["novidade"])) {
        $novidadeErr = "Quer receber novidades?";
        $error = true;
       } else {
        $novidade = verificar_campo($_POST["novidade"]);
      }

       if (empty($_POST["receber"])) {
        $receberErr = "Como quer receber as novidades?";
        $error = true;
       } else {
        $receber = verificar_campo($_POST["receber"]);
      }


    $sql = "INSERT INTO $table (Name, Email, Data_nasc, Sexo, Telefone, Cor_Cabelo, Tipo_Cabelo, Cor_Pele, Tipo_Pele, Cor_Olhos,
    Mensagem, Receber_Novidades, Forma_Receber_Novidades) VALUES ('$name', '$email', '$data', '$sexo', '$telefone', '$corcabelo', '$tipocabelo',
      '$corpele', '$tipopele', '$corolhos', '$mensagem', '$receber', '$novidade')";

    if (!mysqli_query($conn, $sql)) {
      echo "Erro ao fazer o cadastro" . mysqli_error($conn);
    } else {
    $name = $email = $data = $sexo = $telefone = $corcabelo = $tipocabelo =
    $corpele = $tipopele = $corolhos = $mensagem = $receber = $novidade = "";
      $msg = "Cadastro feito com sucesso!";
    }

    mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
  <head>
    <title>TADS Maquiagem</title>
    <meta charset="utf-8">

    <script src="script/jquery-3.5.1.js"></script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cadastro.css">
  </head>
  <body onbeforeunload="return leavePage()">
    <div>
      <?php include 'menu.php';?>

      <section id="corpo">
        <?php include 'header.php';?>

        <h3 id="page-title">
          <?php
            echo "CADASTRO"
          ?>
        </h3>

        <div id="area">
          <p>
            <span class="error">* campos obrigatórios</span>
          </p>

          <form id="formulario" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">

            <fieldset>
              <legend>Formulário</legend>

              <label>Nome Completo:
                <input id="campo_nome" type="text" name="name" placeholder="Seu Nome" ></input>
                <span class= "error">*</span>
              </label>

              <label>Email:
                <input id="campo_email" type="texto" name="email" placeholder="tads2021@example.com"></input>
                <span class= "error">*</span>
              </label>

              <label>Data de Nascimento:
                  <input type="date" id="campo_date" name="data"  min="01-01-1900" max="01-01-2014"></input>
              </label>

              <label>Sexo:</label>
              <label>
                <input id="campo_sexo" name="sexo" type="radio" value="Masculino" checked="checked"/> Masculino
                <input id="campo_sexo" name="sexo" type="radio" value="Feminino" checked="checked"/> Feminino
                <input id="campo_sexo" name="sexo" type="radio" value="Outros" checked="checked"/> Outros
                <span class="error">*</span>
              </label>

              <label>Número do WhatsApp:
                  <input id="campo_telNo" name="Telefone" type="tel" placeholder="(000) 9999-9999 "></input>
              </label>
              <br>

              <b>
                <?php
                    echo "SUAS CARACTERISTICAS:"
                ?>
              </b>

              <label>Cor de Cabelo:
                <select name="corcabelo">
                  <option value="Loiro Claro">Loiro Claro</option>
                  <option value="Loiro Médio">Loiro Médio</option>
                  <option value="Loiro Escuro">Loiro Escuro</option>
                  <option value="Castanho Claro">Castanho Claro</option>
                  <option value="Castanho Médio">Castanho Médio</option>
                  <option value="Castanho Escuro">Castanho Escuro</option>
                  <option value="Ruivo">Ruivo</option>
                  <option value="Preto">Preto</option>
                  <option value="Outros">Outros</option>
                </select>
              </label>

              <label>Tipo de Cabelo:
                <select name="Tipo de Cabelo">
                  <option value="Liso Seco">Liso Seco</option>
                  <option value="Liso semi Oleoso">Liso semi Oleoso</option>
                  <option value="Liso Oleoso">Liso Oleoso</option>
                  <option value="Ondulado Seco">Ondulado Seco</option>
                  <option value="Ondulado semi Oleoso">Ondulado semi Oleoso</option>
                  <option value="Ondulado Oleoso">Ondulado Oleoso</option>
                  <option value="Cacheado Seco">Cacheado Seco</option>
                  <option value="Cacheado semi Oleoso">Cacheado semi Oleoso</option>
                  <option value="Cacheado Oleoso">Cacheado Oleoso</option>optio>
                  <option value="Crespo Seco">Crespo Seco</option>
                  <option value="Crepo semi Oleoso">Crespo semi Oleoso</option>
                  <option value="Crespo Oleoso">Crespo Oleoso</option>
                </select>
              </label>

              <label>Cor de Pele:
                <select name="Cor de Pele">
                  <option value="Branca">Branca</option>
                  <option value="Amarela">Amarela</option>
                  <option value="Morena Claro">Morena Claro</option>
                  <option value="Morena Médio">Morena Médio</option>
                  <option value="Morena Escuro">Morena Escuro</option>
                  <option value="Negra">Negra</option>
                </select><br>
              </label>

              <label>Tipo de Pele:
                <select name="Tipo de Pele">
                  <option value="Normal">Normal</option>
                  <option value="Seca">Seca</option>
                  <option value="Mista">Mista</option>
                  <option value="Oleosa">Oleosa</option>
                </select>
              </label>

              <label>Cor dos Olhos:
                <select name="Cor dos Olhos">
                  <option value="Azul">Azul</option>
                  <option value="Verde">Verde</option>
                  <option value="Mel">Mel</option>
                  <option value="Castanho Claro">Castanho Claro</option>
                  <option value="Castanho Médio">Castanho Médio</option>
                  <option value="Castanho Escuro">Castanho Escuro</option>
                </select>
              </label>

              <label>Mensagem:<br>
                <textarea id=msg name="Mensagem" placeholder="Fale um pouco do que busca saber mais..."></textarea>
              </label>

              <label>Gostaria de receber novidades?
                <input type="radio" name="novidade" value="Sim" checked="checked" /> Sim
                <input type="radio" name="novidade" value="Não" checked="checked" /> Não
                <span class="error">*</span>
              </label>

              <label> De que forma gostaria de receber nossas novidades?
                <input type="radio" name="receber" value="WhatsApp" checked="checked" /> WhatsApp
                <input type="radio" name="receber" value="E-mail" checked="checked" /> E-mail
                <input type="radio" name="receber" value="Nenhum" checked="checked" /> Nenhum
                <span class="error">*</span>
              </label>
              <br>
            <label>
              <button id="btnSubmit" type="submit"> Enviar </button>
              <?php
              if ($error) echo "Preencha todos campos obrigatórios"
              ?>
            </label><br>
         </fieldset>
       </form>
     </div>
     </section>

     <?php include 'rodape.php'; ?>

     </div>
     </body>
     <script src="script/login.js"></script>
     </html>
