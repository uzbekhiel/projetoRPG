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
		
		//Arquivos de inclusão
			require("../engine/definicoes.php");
			require("../engine/funcoes.php");
			
		//Inicialização de Variáveis
		
		$intTotalRegistros = 0;
		$intPaginas = 0;
		$intPaginaAtual = 1;
		
		
		$intRange = 3;
		$intRangeInicial = 0;
		$intRangeFinal = 0;
		
		
		$intAnteriorPagina = 0;
		$intProximaPagina = 0;
		
		$intOffSet = 0;
		
		$intOrder = 1;
		$strOrder = 'strNome';
		
		$intOrdem = 0;
		$strOrdem = "ASC";
		
		$intOrdemAtual = $_GET['ordenacao'];
		
		$strTabela = "usuario";
		
		$strColunasTabela = "idUsuario,strNome,strLogin,strSenha,strTel";
		
		$strSQL = "";
		
		//Funções (Funções Javascript e PHP)
			
			//Verificação de Usuário
			estaLogado($strBanco);
?>
			<script type="text/javascript" src="./engine/jquery/jquery-1.1.2.js.js"></script>
			
			<script type="text/javascript">
			<!--
			//Inclui um confim box  antes de redirecionar para exclusão  do registro.
			
			function excluir(intId)
			{
				if(window.confirm("Deseja realmente excluir esse usuário ?"))
				{
					document.location= "excluirPadrao.php?id=" + intId;
				}
			}
			
			/*
			insere a classe even  en todas as linhas pares da tabela para colocar o gerenciar 
			com  cor sim, cor não
			*/
			$(document).ready( function() {
				  $("#tbGerenciar").find("tr:nth-child(even)").each(
					function(i) {
					  if( 0 == $(this).find("tr").length ) {
						$(this).addClass("even");
					  }
					}
				  );
				}
			);  
			</script>
			
		<?
		/*
		===============================================================================
		 Código do Script
		-------------------------------------------------------------------------------
		*/
		$pagina = "gerenciarPadrao";
		?>
		<title><?=$strTitulo?> | <?=$NOME?> <?=$pagina?></title>
	</head>
	<?
		//Atribuindo variaveis de paginaçao
		$intTotalRegistros = totalRegistros("usuario");
		
		$intPaginas = ceil($intTotalRegistros/$intRegistrosPorPagina);
		
		if(isset($_GET['pagina'])) $intPaginaAtual = $_GET['pagina'];
		
		$intRangeInicial = $intPaginaAtual - $intRange;
		
		$intRangeFinal = $intPaginaAtual + $intRange;
		
		if($intRangeInicial < 1) $intRangeInicial = 1;
		
		if($intRangeFinal > $intPaginas) $intRangeFinal = $intPaginas;
		
		if($intPaginaAtual >= 1) $intProximaPagina = $intPaginaAtual+1;
		
		if($intPaginaAtual <= $intPaginas) $intAnteriorPagina = $intPaginaAtual-1;
		
		//pegando o OFFSET
		$intOffSet = ($intPaginaAtual-1)*$intRegistrosPorPagina;
		
		//pegando a Ordenacao
		if(isset($_GET['ordenacao'])) $intOrder = $_GET['ordenacao'];
		
		switch($intOrder){
				case 0:
					$strOrder = "idUsuario";
					break;
				case 1:
					$strOrder = "strNome";
					break;
				case 2:
					$strOrder = "strTel";
					break;
				default:
					$strOrder = "idUsuario";
		}
		
		//Pegando a ordem da ordenacao
		if(isset($_GET['ordem'])) $intOrdem = $_GET['ordem'];
		switch($intOrdem){
			case 0:
				$strOrdem = "ASC";
				$intOrdem = 1;
				break;
			case 1:
				$strOrdem = "DESC";
				$intOrdem = 0;
				break;
			default:
				$strOrdem = "ASC";
				$intOrdem = 1;
		}
		
	?>
	<body>
		<?require("../layoutUp.php");?>
		<div class="mensagem"> 
			 <?imprimeSession();?>
		</div>
		<div>
			<h2><?=$pagina?></h2>
			
			<?
			
				if(isset($_SESSION['strMensagem'])){ 
					echo "<p>".$_SESSION['strMensagem']."</p>";
					unset($_SESSION['strMensagem']);
				}
			
			?>
			<div class="tdGerenciar">
				<table id="tbGerenciar">
					<tr>
						<th><a href="gerenciarPadrao.php?pagina=<?=$intPaginaAtual?>&amp;ordenacao=0&amp;ordem=<?=$intOrdem?>">ID</a></th>
						<th><a href="gerenciarPadrao.php?pagina=<?=$intPaginaAtual?>&amp;ordenacao=1&amp;ordem=<?=$intOrdem?>">Nome</a></th>
						<th><a href="gerenciarPadrao.php?pagina=<?=$intPaginaAtual?>&amp;ordenacao=2&amp;ordem=<?=$intOrdem?>">Telefone</a></th>
						<th colspan="2">Opções</th>
					</tr>
					<?
					$strSQL = "SELECT $strColunasTabela FROM $strBanco.$strTabela ORDER BY $strOrder $strOrdem LIMIT $intRegistrosPorPagina OFFSET $intOffSet";
					$resultSet = mysql_query($strSQL);
					
					while($resultRow = mysql_fetch_array($resultSet))
					{
					?>
					<tr>
						<td><?=$resultRow['idUsuario']?></td>
						<td><a href="visualizarPadrao.php?id=<?=$resultRow['idUsuario']?>"><?=$resultRow['strNome']?></a></td>
						<td><?=$resultRow['strTel']?></td>
						<td ><a class="alterarGerenciar" href="alterarPadrao.php?id=<?=$resultRow['idUsuario']?>"><span class="fig">alterar</span></a></td>
						<td ><a class="excluirGerenciar" href="excluirPadrao.php?id=<?=$resultRow['idUsuario']?>" onclick="javascript: return confirm('Deseja realmente excluir esse usuario??')"><span class="fig">excluir</span></a></td>
					</tr>
					<?
					}?>
				</table>
			</div>
			<div class="Paginacao">
				<span>
					<?if($intPaginaAtual > 1){
					?>
						<big><a class="um" href="gerenciarPadrao.php?pagina=1&amp;ordenacao=<?=$intOrdemAtual?>&amp;tipo=<?=$intTipoAtual?>&amp;ordem=<?=abs($intOrdem-1)?>">Primeira</a></big>
						||
						<big><a class="dois" href="gerenciarPadrao.php?pagina=<?=$intAnteriorPagina?>&amp;ordenacao=<?=$intOrdemAtual?>&amp;tipo=<?=$intTipoAtual?>&amp;ordem=<?=abs($intOrdem-1)?>"><<</a></big>
						||
					<?}
						for($i=$intRangeInicial;$i <= $intRangeFinal ; $i++){
							if($i == $intPaginaAtual) echo $i;
							else{
							?>
								<a href="gerenciarPadrao.php?pagina=<?=$i?>&amp;ordenacao=<?=$intOrdemAtual?>&amp;ordem=<?=abs($intOrdem-1)?>"><?=$i?></a>
							<?
							}
						}
					
					if($intPaginaAtual < $intPaginas){
					?>
						||
						<big><a class="tres" href="gerenciarPadrao.php?pagina=<?=$intProximaPagina?>&amp;ordenacao=<?=$intOrdemAtual?>&amp;tipo=<?=$intTipoAtual?>&amp;ordem=<?=abs($intOrdem-1)?>">>>	</a></big>
						||
						<big><a class="quatro" href="gerenciarPadrao.php?pagina=<?=$intPaginas?>&amp;ordenacao=<?=$intOrdemAtual?>&amp;tipo=<?=$intTipoAtual?>&amp;ordem=<?=abs($intOrdem-1)?>">Ultima</a></big>
					<?
					}?>
					
				</span>
			</div>
			<div class="linkGerenciar">
				<a href="./inserirPadrao.php">Inserir</a>
				<a href="../contatos.php">Contatos</a>
			</div>
		</div>
		<?require("../layoutDown.php");?>
	</body>
</html>