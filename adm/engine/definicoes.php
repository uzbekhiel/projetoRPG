<?
/*
===============================================================================
 EJCM - Empresa J�nior de Consultoria em Microinform�tica - UFRJ
Nome do Projeto:
Data:
Autor:
===============================================================================*/
//Defini�o�es Gerais
	$VERSAO = (string) "1.0";		    
	$NOME 	= (string) "Projeto Padrao";
	$strTitulo = "Padrao de Casos de Uso";

	//Inicializa��o de Vari�veis referentes ao banco de dados
	
		// Vari�vel que armazena o handler da conex�o com o banco de dados.
		$conn 			= (string) "";
		
		// Vari�vel que armazena o nome do banco de dados referente ao projeto.
		$strBD			= (string) "";
		
		// Vari�vel que armazena o login do usu�rio da conex�o com o banco de dados.
		$strUsuario 	= (string) "";
		
		// Vari�vel que armazena a senha do usu�rio da conex�o com o banco de dados.
		$strSenha 		= (string) "";
		
		// Vari�vel que armazena o camindo do servidor no banco de dados.
		$strServidor	= (string) "";
		
		//Variaveis de conex�o do banco
		$strBanco		= "padraoviale";
		$strUsuario 	= "root";
		$strSenha 		= "123456";

		$strServidor 	= "localhost";
		//$strServidor 	= "146.164.24.21";
		
		// Estabelecendo conex�o com o banco de dados.
		$conn			= mysql_pconnect($strServidor,$strUsuario,$strSenha) or die ("<br /><br />N&atilde;o foi poss&iacute;vel conectar ao Banco de Dados.<br />Contacte o Administrador do Sistema.");
	
	// Selecionando o banco de dados a ser utilizado pelo sistema.
	mysql_select_db($strBanco, $conn);
	
	//Dados do SMTP
		$endSMTP   = "";
		$userSMTP  = "";
		$senhaSMTP = "";

//N�veis de Acesso
	

//Listagem de Registros

//Includes necess�rios para o sistema
	
	// Inclui o arquivo que cont�m as classes utilizadas pelo sistema.
	require("classes.php");
	
	require("phpMailer/class.phpmailer.php");
?>
	<!-- Inclue o arquivo que corrige a transpar�ncia do PNG nos IE�s da vida -->
	<!--[if lt IE 7.]>
		<script defer type="text/javascript" src="../engine/pngfix.js"></script>
	<![endif]-->
		<script type="text/javascript" src="../engine/jquery/jquery-1.2.6.js"></script>
		<!--<script type="text/javascript" src="/jquery.bgiframe.js"></script>
		<script type="text/javascript" src="js/jquery.dimensions.js"></script>-->
		<script type="text/javascript" src="../engine/jquery/jquery.multifile/jquery.multifile.js"></script>
		<script type="text/javascript" src="../engine/jquery/jMask/jquery.maskedinput.js"></script>
		<script type="text/javascript" src="../engine/jquery/jLiveQuery/jquery.livequery.js"></script>
		<script type="text/javascript" src="../engine/jquery/jquery-ui-personalized-1.5.2.js"></script>
		<script type="text/javascript" src="../engine/jquery/jDatePicker/ui.datepicker-pt-BR.js"></script>
		<!--D� um include no arquivo de CSS-->
		<link href="../CSS/estilo.css" rel="stylesheet" type="text/css" />
		<link href="../CSS/conteudo.css" rel="stylesheet" type="text/css" />
		<link href="../CSS/topo.css" rel="stylesheet" type="text/css" />
<?
//Constantes

	//Essa constante define quantos registros mostrar� por vez
		$intRegistrosPorPagina		= (int) 10;
		
	//Essa constante define a limita��o da quantidade de paginas � ser mostrada embaixo da lista de cursistas.
		$INTRANGE = (int) 5;

	
//Fun��es necess�rias em qualquer projeto

	//Fun�ao que redireciona o usu�rio para outra p�gina
 	function redirectTo($destino)
	{
		?>
		<script type="text/javascript">
		<!--
			document.location = "<?=$destino?>";
		//-->
		</script>
		<p>Java Script desabilitado! Clique <a href="<?=$destino?>">aqui</a> para continuar.</p>
		<?
		exit;
	}
	
	//Fun��o que Verifica se o Usu�rio est� logado
	function estaLogado($strBanco)
	{
		if(!isset($_SESSION["$strBanco"]))
		{
			$_SESSION['msg'] = "Usu&aacute;rio n&atilde;o logado.";
			$_SESSION["tipo"] = "erro";
			redirectTo("../login.php");
		}
	}
	
	//Retorna o total de registros do banco
	function totalRegistros($strTblName)
	{
		$intTotalRegistros			= 0;	
		$strSQL						= "SELECT COUNT(*) FROM ".$strTblName.";";
		$resultSet					= mysql_query($strSQL);
		$intTotalRegistros			= mysql_result($resultSet,0);
		return $intTotalRegistros;
	}
	
	// Fun��o que verifica a session e se tiver imprime
	function imprimeSESSION()
	{
		//testa se tem alguma mensagem, se tiver, printa
		if(isset($_SESSION['msg']) && isset($_SESSION['tipo']))
		{
			$classe = "";
			switch($_SESSION['tipo'])
			{
				case "info":
					$classe = "info";
					break;
				case "sucesso":
					$classe = "sucesso";
					break;
				case "erro":
					$classe = "erro";
					break;
			}
				
			?>
				<div id="<?=$classe?>">
					<p>
					<?
					switch($_SESSION['tipo'])
					{
						case "info":
							echo "<strong>Informa&ccedil;&atilde;o:</strong><br />" . $_SESSION['msg'];
							break;
						case "sucesso":
							echo "<strong>Sucesso:</strong><br />" . $_SESSION['msg'];
							break;
						case "erro":
							echo "<strong>Erro:</strong><br />" . $_SESSION['msg'];
							break;
					}
					?>
					</p>
				</div>
			<?

			unset($_SESSION['msg']);
			unset($_SESSION['tipo']);
		}
	}
	
	//exclui algum dado do banco  
	function excluir($strBanco,$strTabela,$colunaTabela,$valorComparavel,$strErro,$strSucesso)
	{
		if($valorComparavel)
		{
			$strSQL = "SELECT COUNT(*) FROM $strBanco.$strTabela WHERE $colunaTabela=".$valorComparavel.";";
			$resulSet = mysql_query($strSQL);
			$result = mysql_result($resulSet,0);
			if(is_numeric($valorComparavel) && $result == 1)
			{
				$strSQL = "SELECT * FROM $strBanco.$strTabela WHERE $colunaTabela=".$valorComparavel.";";
				$resultSet = mysql_query($strSQL);
				if($resultRow = mysql_fetch_array($resultSet))
				{
					$strSQL = "DELETE FROM $banco.$strTabela WHERE $colunaTabela=".$valorComparavel.";";
					if(mysql_query($strSQL))
					{
						$_SESSION['tipo'] = "sucesso";
						$_SESSION['msg'] = $strSucesso;
					}
				}
			}
			else
			{
				$_SESSION['tipo'] = "erro";
				$_SESSION['msg'] = $strErro;
			}
		}
		else
		{
			$_SESSION['tipo'] = "erro";
			$_SESSION['msg'] = $strErro;
		}
		
	}
	
	//Fun��o que faz o logout
	function logOut($strBanco)
	{
		if(isset($_SESSION["$strBanco"]))unset($_SESSION["$strBanco"]);
		?><script type="text/javascript">
		<!--
			window.location = "../index.php";
		//-->
		</script><?
		exit;
	}
	
	//Fun��o que faz a valida��o para CADA campo, ou seja, use uma fun��o dessa para cada campo que precise de valida��o
	function validacao($post,$erro,$strErro,$campo){
		$_SESSION["$campo"] = 0;
		if(isset($post) && $post != $erro) 
		{
			return $post;
		}
		else
		{
			$_SESSION['tipo'] = "erro";
			$_SESSION['msg'] = $strErro;
			$_SESSION["$campo"] = 1;
		}
	}
	
	//Faz a valida��o do envio de e-mail
	function validacaoEmail($mail,$strErro,$strSucesso){
		if($mail->Send()) 
		{
			$_SESSION['tipo'] = "sucesso";
			$_SESSION['msg'] = $strSucesso;
		}
		else
		{
			$_SESSION['tipo'] = "erro";
			$_SESSION['msg'] = $strErro;
		}
	}
	
	//Verifica se as senhas s�o iguais, para alterar a senha
	function validacaoSenhas($post1,$post2,$strErro){
		if(isset($post1) && isset($post2)&& $post1 == $post2) 
		{
			return $post;
		}
		else
		{
			$_SESSION['tipo'] = "erro";
			$_SESSION['msg'] = $strErro;
		}
	}
	
	//Fun��o que faz a valida��o de campos que precisam de uma mascara, para quando n�o houver javascript permitido. Cada fun��o valida UM campo.
	function validacaoEreg($post,$strErro,$strEr)
	{
		if(isset($post))
		{
			if(ereg($strEr,$post))
			{
				return $post;
			}
			else
			{
				$_SESSION['tipo'] = "erro";
				$_SESSION['msg'] = $strErro;
			}
		}
		else
		{
			$_SESSION['tipo'] = "erro";
			$_SESSION['msg'] = $strErro;
		}
	}
	
	//Fun��o que faz a valida��o de campos multiplos. Cada fun��o valida UM campo multiplo.
	function validacaoCampoMultiplo($arrPosts,$tipoPost,$erro,$strErro){
		$i = 0;
		$arrValor = array();
		
		foreach($arrPosts as $tipoPost => $valor)
		{
			if($valor == $erro)
			{
				$_SESSION['tipo'] = "erro";
				$_SESSION['msg'] = $strErro;
				break;
			}
			else
			{
				$arrValor[$i] = $valor;
			}
			$i++;
		}
		return $arrValor;
	}
	
	//Fun��o que pega o que vem escrito junto com o nome da p�gina. Serve para pegar um de cada vez.
	function get($id,$idGet,$strNomeColuna,$strNomeBanco,$strNomeTabela)
	{
		if(isset($idGet)) 
		{
			$intId = $idGet;
			$strSQL = "SELECT $strNomeColuna FROM $strNomeBanco.$strNomeTabela WHERE $id = $intId";
			$resultSet = mysql_query($strSQL);
			while($resultRow = mysql_fetch_array($resultSet))
			{
				$strValorCampo = $resultRow["$strNomeColuna"];
			}
		}
		return $strValorCampo;
	}
	
	//Fun��o que pega o nome da pagina que esta sendo utilizada
	function pegaPagina()
	{
		if(isset($_SERVER["REQUEST_URI"]))
		{
			$paginaAtual = basename($_SERVER["REQUEST_URI"]);
			if(strpos($paginaAtual,"?") != false) 
			{
				$paginaAtual = reset(explode("?",$paginaAtual));
			}
			$_SESSION['url'] = $paginaAtual;
		}
	}
	
	function envioDeEmail($strEmailFrom,$strNomeFrom,$strEmailTo,$strNomeTo,$strAssunto,$strMensagem,$strErro)
	{
		//Variavel do envio de e-mail
		$mail = new PHPMailer();
		
		$mail->IsSMTP();
		$mail->Host = $endSMTP;
		$mail->SMTPAuth = true;
		$mail->Username = $userSMTP;
		$mail->Password = $senhaSMTP;
		
		$mail->From = $strEmailFrom;
		$mail->FromName = $strNomeFrom;
		
		$mail->AddAddress($strEmailTo,$strNomeTo);
		$mail->AddReplyTo($strEmailFrom,$strNomeFrom);
		
		$mail->Subject = $strAssunto;
		$mail->Body = $strMensagem;
		
		validacaoEmail($mail,$strErro,$strSucesso);
	}
	
	function fazQuery($sql){
      $result = mysql_query($sql,$this->conn);
      return $result;
   }

   function pegaResultado($result){
      $resultado = mysql_result($result,0);
      return $resultado;
   }

  	function erro ($result){
      if (!$result) {
         die('Could not query:' . mysql_error());
      }
   }
?>

