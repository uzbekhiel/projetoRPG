<?session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<?
		/*
		===============================================================================
		 EJCM - Empresa J�nior de Consultoria em Microinform�tica - UFRJ
		 Nome do Projeto:	  Data:   Autor:
		 		
		===============================================================================*/
		 //Arquivos de Inclus�o
			require("../engine/definicoes.php");
		
		 //Inicializa��o de Vari�veis
		
			//Nome da tabela onde ser�o inseridos os dados
			$strTabela = "";
			
			//Vari�veis que recebem o post
			$text1 = "";
			$text2 = "";
			
			//Texto exibido de quando der certo a inser��o no banco
			$strSucesso = "";
			
			//Texto exibido de quando der erro na valida��o
			$strErro = "Existem campos n�o preenchidos ou preenchidos incorretamente";
			
			//Nome da p�gina
			$pagina = "inserirPadrao";
			
		// Fun��es
			//Verifica se est� logado
			estaLogado($strBanco);
		?>
			<script type="text/javascript">
			<!--
			var intContagem = 1;
			
			$().ready
			(
				function()
				{
					
					$("img[@class=excluir]:first").hide();
					/*
					$(function()
					{ 
						$('.multi-pt').MultiFile(
						{ 
							accept:'gif|jpg|jpeg|png', max:20, STRING: 
							{	 
								remove:'remover', 
								selected:'Selecionado: $file', 
								denied:'Invalido arquivo de tipo $ext.', 
								duplicate:'Arquivo ja selecionado:\n$file.' 
							} 
						}); 
					});
					*/
					
					$('#add').click
					(
						function()
						{
							intContagem ++;
							$("div[@class=multi]:last").after($("div[@class=multi]:last").clone());
							$("div[@class=multi]:last").hide().fadeIn();
							$("div[@class=multi]:last input:first").attr("id", "textName" + intContagem).val("");
							$("img[@class=excluir]:last").show();
							
							
						}
					);
					$('img[@class=excluir]').livequery('click',function()
					{	
						if($("div[@class=multi]").length > 1)
						{
							$("div[@class=multi]:last").remove();
						}
					}	
					);
					
					$("#date1").mask("99/99/9999");
					$("#textTel").mask("99-9999-9999");
					
					$().ready(function() {  
						$('input#add2').click(function() {  
							return !$('#select1 option:selected').remove().appendTo('#select2');  
						});  
						$('#remove2').click(function() {  
							return !$('#select2 option:selected').remove().appendTo('#select1');  
						});  
					});  
				}
			);
			-->
			</script>
		<?
		/*
		===============================================================================
		 C�digo Gerador de HTML
		-------------------------------------------------------------------------------
		*/
		?>	
		<title>P�gina | <?=$NOME?> <?=$pagina?></title>
</head>
	<?
		if($_POST)
		{	
			//vai retornar um vetor, cujos indices saum numeros, come�ando por 0, e indo at� o n�mero de campos.
			//$text1 = validacaoCampoMultiplo($_POST['textName'],$textName,"",strErro);
			
			//$text2 = validacaoEreg($_POST['textTel'],$strErro,"\([0-9]{2}\)([0-9]{4})-([0-9]{4})");
			//$text2 = validacao($_POST['textTel'],"",$strErro,"text2");
			//$date = validacaoEreg($_POST['date'],$strErro,"^((0[1-9])|([12][0-9])|(3[01]))\/((0[1-9])|(1[0-2]))\/([0-9]{4})$");
			//$date = validacao($_POST['date'],"",$strErro,"date");
			
			if(!isset($_SESSION['tipo']))
			{
				$strSQL = "INSERT INTO $strBanco.$strTabela VALUES(default,'$text1[0]','$text2','$date')";
				$resultSet = mysql_query($strSQL);
				$_SESSION['tipo'] = "sucesso";
				$_SESSION['msg'] = $strSucesso;
				redirectTo("index.php");
			}	
		}
	?>    
<body>
        <? 
			require("../layoutUp.php");
		?>
        	<h2>Inserir Padr�o</h2>

				<? imprimeSESSION(); ?>
				<div class="inseAlt">
					<form method="post" action="">
						<fieldset>
							<legend>Inserir Padr�o</legend>
							<div class="multi">
								<label for="text1">Text:</label>
								<input type="text" id="textName1" name="textName[]"  />
								<img src="../imagens/excluir.png" alt="excluir" class="excluir" />
							</div>
							<div>
							<img src="../imagens/inserir.png" id="add" alt="inserir" class="inserir" />
							</div>
							<div>
								<label for="textTel" <?if($_SESSION["text2"] == 1){echo "style='color:red;'";unset($_SESSION["text2"]);}?>>Text2:</label>
								<input type="text" id="textTel" name="textTel" value="<?=$text2?>" />
							</div>
							<div>
								<label for="pass1">Senha</label>
								<input type="password" id="pass1" name="pass"/>
							</div>
							<div>
								<label for="date1" <?if($_SESSION["date"] == 1){echo "style='color:red;'";unset($_SESSION["date"]);}?>>Data de Nascimento:</label>
								<input type="text" id="date1" name="date" value="<?=$date?>" />
							</div>
							<div>
								<label>Select:</label>
								<select name="intIdSelect">
									<option value="0" >---Selecione uma op��o---</option>
									<option value="1" >Primeira op��o</option>
								</select>
							</div>
							<div>
								<label>Categoria dos RadioButton's:</label>
								<br />
								<label class="checkRadio">
									<label for="radio1">RadioButton 1</label>
									<input type="radio" name="radio" checked='checked' value="1" id="radio1" />					
								</label>
								<br />
								<label class="checkRadio">
									<label for="radio2">RadioButton 2</label>
									<input type="radio" name="radio" value="2" id="radio2" />						
								</label>	
							</div>
							<div>
								<label>Categoria dos CheckBoxes:</label>
								<br />	
								<label for="checkbox1">CheckBox 1</label>
								<input type="checkbox" name="checkbox[]" id="checkbox1"/>
								<br />
								<label for="checkbox2">CheckBox 2</label>
								<input type="checkbox" name="checkbox[]" id="checkbox2"/>
							</div>
							<div>
								<label for="textAr"><strong>Text Area:</strong></label>
								<br />
								<textarea id="textAr" name="textAr" cols="15" rows="5"></textarea>
							</div>
							<div>
								<label for="file1">Arquivo:</label>
								<input type="file" id="file1" class="multi-pt" name="file" />
							</div>
							<div id="dragDrop1">  
							    <select multiple id="select1">  
									<option value="1">Option 1</option>  
									<option value="2">Option 2</option>  
									<option value="3">Option 3</option>  
									<option value="4">Option 4</option>  
							    </select>  
								<input type="button" id="add2" value="add &gt;&gt;" />
						    </div>  
						    <div id="dragDrop2">  
							    <select multiple id="select2"></select>
								<input type="button" id="remove2" value="&lt;&lt; remove" />  
						    </div> 
							<div id="divButtons">
								<input type="submit" class="botao" value="Inserir" />
								<input type="reset" class="botao" value="Restaurar" />
								<input type="button" class="botao" value="Voltar" onclick="javascript: window.location='index.php'" />
							</div>
						</fieldset>
					</form>
				</div>
		<? 
			require("../layoutDown.php"); 
		?>
		
	</body>
</html>