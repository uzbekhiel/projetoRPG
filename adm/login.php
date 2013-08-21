<? session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="./CSS/estilo.css" rel="stylesheet" type="text/css" />
		<link href="./CSS/conteudo.css" rel="stylesheet" type="text/css" />
		<link href="./CSS/topo.css" rel="stylesheet" type="text/css" />
		<?
		/*
		===============================================================================
		 EJCM - Empresa Júnior de Consultoria em Microinformática - UFRJ
		 Nome do Projeto:	  Data:   Autor:
		 		
		===============================================================================*/
		
		//Arquivos de Inclusão
			require("./engine/definicoes.php");
		
		//Inicialização de Variáveis
		
			$pagina = "login";
			
			//Nome da Tabela a ser utilizada como referencia para os dados do login
			$strTabela = "usuarios";
			
			//Pagina a ser redirecionada
			$nomeDaPagina = "./VIALE/index.php";
			
			//Indica se há erro
			$erro = 0;
			
			//Mensagem de erro a ser exibida
			$strErro = "Senha ou Login incorretos";
			
			//Mensagem de sucesso padrão
			$strSucesso = "Usuário logado com sucesso";
			
			//Variaveis que guardam o valor do POST
			$strLogin = "";
			$strSenha = "";
	
	
		//Funções (Funções Javascript e PHP)
		
		?>
		<title><?=$strTitulo?> | <?=$NOME?> <?=$pagina?></title>
	</head>
	<?
	
	if($_POST){
		
		$strLogin = validacao($_POST['strLogin'],"",$strErro,"login");
		$strSenha = validacao($_POST['strSenha'],"",$strErro,"senha");
	
		if($_SESSION['tipo'] != "erro"){
			$strSQL = "SELECT COUNT(*) FROM $strBanco.$strTabela WHERE login = '$strLogin' AND senha = MD5('$strSenha')";
			//echo $strSQL;
			$resultSet = mysql_query($strSQL);
			$result = mysql_result($resultSet,0);
			
			if($result == 1)
			{
				$_SESSION["$strBanco"] = true;
				$_SESSION['tipo'] = "sucesso";
				$_SESSION['msg'] = $strSucesso;
				redirectTo($nomeDaPagina);
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
	?>
	<body>
		<?require("layoutUp.php");?>
		<h2>Login</h2>
		<?
			imprimeSESSION();
		?>
		<div id="login">
			<form method="post" action="">
				<fieldset>
					<legend>Autentica&ccedil;&atilde;o</legend>
					<div>
						<label for="strLogin" <?if($_SESSION["login"] == 1){echo "style='color:red;'";unset($_SESSION["login"]);}?>>Login:</label><br />
						<input type="text" id="strLogin" name="strLogin" value="<?=$strLogin?>"/><br />
					</div>
					<div>
						<label for="strSenha" <?if($_SESSION["senha"] == 1){echo "style='color:red;'";unset($_SESSION["senha"]);}?>>Senha:</label><br />
						<input type="password" id="strSenha" name="strSenha"/><br />
					</div>
					<div>
						<input type="submit" value="Login" />
					</div>
				</fieldset>
			</form>
		</div>
		<?require("layoutDown.php");?>
	</body>
</html>