<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<?
		/*
		 EJCM - Empresa Júnior de Consultoria em Microinformática - UFRJ
		 Nome do Projeto:	Site EJCM 08
		 		
		===============================================================================
		 Arquivos de Inclusão
		-------------------------------------------------------------------------------
		*/
		require("./engine/include.php");
		/*
		===============================================================================
		 Inicialização de Variáveis
		-------------------------------------------------------------------------------		
		*/


		/*
		===============================================================================
		 Verificação de Usuário
		-------------------------------------------------------------------------------
		*/		
			estaLogado($strBanco);
		/*
		===============================================================================
		 Funções
		-------------------------------------------------------------------------------


		===============================================================================
		 Código Gerador de HTML
		-------------------------------------------------------------------------------
		*/
		?>
		<title>Página | <?=$NOME?> <?=$pagina?></title>
		<link rel="stylesheet" type="text/css" href="../estilo/import.css" />
	</head>
	<body>
        <? 
			//require("layoutUp.php"); 
		?>
        		<h2>NOME DA FUNCIONALIDADE</h2>

				<? imprimeSession(); ?>
                               
                <p>
                Estilo do Par&aacute;grafo. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam urna. Vestibulum elementum elit nec nibh vehicula tincidunt. Integer nulla nisi, dapibus vel, ultricies at, auctor quis, ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam blandit, nisl nec ullamcorper sollicitudin, neque turpis convallis metus, ut rhoncus risus massa id leo. Proin eget metus non purus imperdiet porttitor. Nulla ac ligula sit amet velit aliquet eleifend. Praesent eu leo. Curabitur luctus, massa nec hendrerit posuere, nunc sapien porttitor dui, sit amet consequat odio nisi vel nisi. Suspendisse porta dui consectetuer risus. Pellentesque in risus ac mauris tristique cursus.
                </p>                
				
                <ul>
                	<li>list-item 1</li>
                	<li>list-item 2</li>
                	<li>list-item 3</li>
                	<li>list-item 4</li>
                </ul>
								
				<form method="post" action="">
					<fieldset>
						<legend>NOME DA FUNCIONALIDADE</legend>
						
						<label>Nome do Campo:<input type="text" name="" /></label>
												
						<label>
							Nome do Select:
							<select>
								<optgroup label="OptionGroup 1">
									<option>option 1</option>
									<option>option 2</option>
									<option>option 3</option>
									<option>option 4</option>
								</optgroup>
							</select>
						</label>
												
						<span class="checkRadio">
							Categoria dos RadioButton's:
							<label class="checkRadio">
								RadioButton 1
								<input type="radio" name="" />						
							</label>
							<br />
							<label class="checkRadio">
								RadioButton 2
								<input type="radio" name="" />						
							</label>	
						</span>
												
						<span class="checkRadio">
							Categoria dos CheckBoxes:
							<label class="checkRadio">
								CheckBox 1
								<input type="checkbox" name="" />						
							</label>
							<br />
							<label class="checkRadio">
								CheckBox 2
								<input type="checkbox" name="" />
							</label>	
						</span>
						     
						<label class="mensagem">Mensagem:<textarea cols="20" rows="5"></textarea></label>
												
						<input type="button" class="botao" value="Entrar" />
					</fieldset>
				</form>
		<? 
			//require("layoutDown.php"); 
		?>
		
	</body>
</html>