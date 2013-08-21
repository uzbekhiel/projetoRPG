<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<?
		/*
		===============================================================================
		 Arquivos de Inclusão
		-------------------------------------------------------------------------------
		*/
			?>
			<link href="./CSS/estilo.css" rel="stylesheet" type="text/css" />
			<link href="./CSS/conteudo.css" rel="stylesheet" type="text/css" />
			<link href="./CSS/topo.css" rel="stylesheet" type="text/css" />
			<?
		/*
		===============================================================================
		 Verificação de Usuário
		-------------------------------------------------------------------------------
		*/


		/*
		===============================================================================
		 Inicialização de Variáveis
		-------------------------------------------------------------------------------
		*/
	
		/*	
		===============================================================================
		 Funções
		-------------------------------------------------------------------------------


		===============================================================================
		 Código do Script
		-------------------------------------------------------------------------------
		*/
		?>
		<script src="engine/jquery/jquery-1.3.2.js" type="text/javascript"></script>
				
			<!--[if lte IE 6]>
				<script type="text/javascript" src="./engine/pngfix/supersleight-min.js"></script>
			<![endif]-->
			
					<?
		?>
		<title>Rpg de Mesa</title>
		<script type="text/javascript">
		<!--
			$(document).ready(function() {

						
			});
		//-->
		</script>
	</head>
	<body>
		<? 
			require("layoutUp.php");
			//imprimeSESSION();
		?>
		
		<? 
			require("layoutDown.php"); 
		?>
	</body>
</html>