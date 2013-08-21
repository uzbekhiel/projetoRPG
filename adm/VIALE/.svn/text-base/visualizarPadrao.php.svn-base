<? session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<?
		/*
		===============================================================================
		 EJCM - Empresa Júnior de Consultoria em Microinformática - UFRJ
		 Nome do Projeto:	  Data:   Autor:
		 		
		===============================================================================*/
		
		//Arquivos de Inclusão
			require("../engine/definicoes.php");
		
		//Inicialização de Variáveis
		 
			$intId = 0;
			$pagina = "vizualizar_padrao";
			
			//Variavel que recebe o nome das colunas do banco.
			//Quanto mais colunas, mas variaveis dessas e modificações no while do mysql_fetch_array deverão ser feitas
			
			//Nome da coluna no banco
			$strColuna = "strNome";
			
			//Nome visualizado na tela que veio do Banco
			$strNomeVisu = "";
			
			//Nome, que é estático, visualizado na tela
			$strNome = "Nome";
			
			//Nome da coluna no banco
			$strColuna2 = "strTel";
			
			//Nome visualizado na tela que veio do Banco
			$strNomeVisu2 = "";
			
			//Nome, que é estático, visualizado na tela
			$strNome2 = "Telefone";
			
			//Nome da tabela no banco
			$strTabela = "usuario";
			
			//Variavel de identificação no banco
			$id = "idUsuario";
	
	
		//Funções (Funções Javascript e PHP)
			estaLogado($strBanco);	
		
		?>
		<title><?=$strTitulo?> | <?=$NOME?> <?=$pagina?></title>
	</head>
	<?
	if($_GET)
	{
		$strNomeVisu = get($id,$_GET['id'],$strColuna,$strBanco,$strTabela);
		$strNomeVisu2 = get($id,$_GET['id'],$strColuna2,$strBanco,$strTabela);
	}
	?>
	<body>
	<?require("../layoutUp.php");?>
		<h2>Visualizar Padrao</h2>
		<div>
			<label for="$strNome"><big><?=$strNome?>:</big></label>
			<?=$strNomeVisu?>
		</div>
		<div>
			<label for="$strNome"><big><?=$strNome2?>:</big></label>
			<?=$strNomeVisu2?>
		</div>
		<div >
			<input type="button" value="Alterar" onclick="javascript: window.location = 'alterarPadrao.php?id=<?=$intId?>'" />
			<input type="button" value="Excluir" onclick="javascript: window.location = 'excluir_padrao.php?id=<?=$intId?>'" />
			<input type="button" value="Voltar" onclick="javascript: window.location = 'index.php'" />
		</div>
		<?require("../layoutDown.php");?>
	</body>
</html>