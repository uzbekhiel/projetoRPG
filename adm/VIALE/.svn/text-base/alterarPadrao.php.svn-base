<?session_start();?>
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
		
		// Inicialização de Variáveis
		
			$pagina = "alterarPadrao";
			$erro = 0;
			
			//Nome da tabela no banco
			$strTabela = "usuario";
			
			//Variavel de identificação no banco
			$id = "idUsuario";
			
			//Nome da coluna no banco
			$strNomeColuna = "strNome";
			
			//Nome do campo onde será exibido os dados do banco
			$strValorCampo = "";
			
			//Mensagem de erro padrao
			$strErro = "Existem dados faltando no formulário";
			
			//Texto exibido de quando der certo a alteração no banco
			$strSucesso = "";
			
			//Variáveis que recebem o post
			$text1 = "";
			$text2 = "";

		//Verifica se está logado
			estaLogado($strBanco);
			

		 //Funções e scripts
		 
		 
		 ?>
		<script type="text/javascript">		
		<!--
		$().ready(function (){
			
			$("#date1").mask("99/99/9999");
			$().ready(function() {  
				$('input#add2').click(function() {  
					return !$('#select1 option:selected').remove().appendTo('#select2');  
				});  
				$('#remove2').click(function() {  
					return !$('#select2 option:selected').remove().appendTo('#select1');  
				});  
			});  


			/*$(function()
			{ 
				$('#file1').MultiFile(
				{ 
					accept:'gif|jpg|jpeg|png', max:20, STRING: 
					{ 
						remove:'remover', 
						selected:'Selecionado: $file', 
						denied:'Invalido arquivo de tipo $ext.', 
						duplicate:'Arquivo ja selecionado:\n$file.' 
					} 
				}); 
			});*/
			
		});
		
		//-->
		</script>
		<?
		/*
		===============================================================================
		 Código Gerador de HTML
		-------------------------------------------------------------------------------
		*/
		?>
		<title>Página | <?=$NOME?> <?=$pagina?></title>
	</head>
	<?
		//Pega o id da variávela ser alterada e pega todos os dados desta
		if($_GET)
		{
			$strValorCampo = get($id,$_GET['id'],$strNomeColuna,$strBanco,$strTabela);
		}
		
		//Validação do formulário de alteração
		if($_POST)
		{
			$text1 = validacao($_POST['textName'],"",$strErro,"text1");
			$pass1 = validacao($_POST['pass1'],"",$strErro,"pass1");
			$pass2 = validacao($_POST['pass2'],"",$strErro,"pass2");
			$pass2 = validacaoSenhas($_POST['pass1'],$_POST['pass2'],$strErro);
			
			if(!isset($_SESSION['tipo']))
			{
				$strSQL = "UPDATE $strBanco.$strTabela SET ";
				$resultSet = mysql_query($strSQL);
				$_SESSION['tipo'] = "sucesso";
				$_SESSION['msg'] = $strSucesso;
				redirectTo("gerenciarPadrao.php");
			}	
		}
	?>
	<body>
        <? 
			require("../layoutUp.php");
		?>
        		<h2>Alterar Padrão</h2>

				<? imprimeSESSION(); ?>	
				<div class="inseAlt">
				<form method="post" action="">
					<fieldset>
						<legend>Alterar Padrão</legend>
						<div>
							<label for="text1" <?if($_SESSION["text1"] == 1){echo "style='color:red;'";unset($_SESSION["text1"]);}?>>Text:</label>
							<input type="text" id="text1" name="textName" value="<?=$strValorCampo?>" />
						</div>
						<div>
							<label for="pass1" <?if($_SESSION["pass1"] == 1){echo "style='color:red;'";unset($_SESSION["pass1"]);}?>>Senha</label>
							<input type="password" id="pass1" name="pass"/>
						</div>
						<div>
							<label for="pass2" <?if($_SESSION["pass2"] == 1){echo "style='color:red;'";unset($_SESSION["pass2"]);}?>>Nova Senha</label>
							<input type="password" id="pass2" name="newPass"/>
						</div>
						<div>
							<label for="date1">Data de Nascimento:</label>
							<input type="text" id="date1" name="date" value="" />
						</div>
						<div>
						<label>Select:</label>
							<select name="intIdSelect">
								<option value="0" >---Selecione uma opção---</option>
								<option value="1" >Primeira opção</option>
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
							<input type="file" id="file1" class="file" name="file" />
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
							<input type="submit" class="botao" value="Alterar" />
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
