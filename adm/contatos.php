<?session_start();?>
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
			
			//Nome e e-mail da pessoa que enviou o email
			$strEmailFrom = "";
			$strNomeFrom = "";
			
			//Nome e e-mail da pessoa que recebe o email
			$strEmailTo = "";
			$strNomeTo = "";
			
			//Mensagem de erro padrao e para e-mail
			$strErro = "Alguns campos não foram preenchidos.";
			$strErro2 = "Ocorreu um erro no Sistema e não foi possível enviar o e-mail.";
		
			//Texto exibido de quando der certo a alteração no banco
			$strSucesso = "O e-mail foi enviado com sucesso";

		//Verificação de Usuário		
			estaLogado($strBanco);
		
		//Funções
			
		?>
		
				<!-- TinyMCE -->
		
		<script language="javascript" type="text/javascript" src="./engine/jquery/tiny_mce/tiny_mce.js"></script>
		<script language="javascript" type="text/javascript">
			tinyMCE.init({
				mode : "textareas",
				theme : "advanced",
				theme_advanced_toolbar_location : "top",
				theme_advanced_statusbar_location : "bottom",
				content_css : "example_word.css",
				paste_use_dialog : false,
				theme_advanced_resizing : true,
				theme_advanced_resize_horizontal : true,
				theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
				paste_auto_cleanup_on_paste : true,
				paste_convert_headers_to_strong : false,
				paste_strip_class_attributes : "all",
				paste_remove_spans : false,
				paste_remove_styles : false			
			});
		</script>
		
		<!-- /TinyMCE -->
		
		<title>Página | <?=$NOME?> <?=$pagina?></title>
		<link rel="stylesheet" type="text/css" href="../estilo/import.css" />
	</head>
	<?
			if($_POST)
			{
				$strEmailFrom = validacao($_POST['strEmail1'],"",$strErro,"");
				$strNomeFrom = validacao($_POST['strNome1'],"",$strErro,"");
				$strAssunto = validacao($_POST['strAssunto'],"",$strErro,"");
				$strMensagem = validacao($_POST['strMensagem'],"",$strErro,"");
				
				if(!isset($_SESSION['tipo']))
				{
					envioDeEmail($strEmailFrom,$strNomeFrom,$strEmailTo,$strNomeTo,$strAssunto,$strMensagem,$strErro2);
				}
			}
	?>
	<body>
        <? 
			require("./layoutUp.php"); 
		?>
        		<h2>Contatos</h2>

				<? imprimeSession(); ?>
			<div id="contatosForm">
				<form method="post" action="">
					<fieldset>
						<div>
							<label>de:</label>
							<label for="strNome1">Nome:</label>
							<input type="text" name="strNome1" id="strNome1"  />
							<label for="strEmail1">E-mail:</label>
							<input type="text" name="strEmail1" id="strEmail1"  />
						</div>
						<div>
							<label for="strAssunto">Assunto:</label>
							<input type="text" name="strAssunto" id="strAssunto" />
						</div>
						<div>
							<label for="strMensagem" class="mensagem">Mensagem:</label>
							<br />
							<textarea cols="90" rows="20" name="strMensagem" id="strMensagem"></textarea>
						</div>
						<div>
							<input type="submit" class="botao" value="Enviar" />
							<input type="button" class="botao" value="Voltar" onclick="javascript: window.location='./VIALE/gerenciarPadrao.php'" />
						</div>
					</fieldset>
				</form>
			</div>
		<? 
			require("./layoutDown.php"); 
		?>
		
	</body>
</html>