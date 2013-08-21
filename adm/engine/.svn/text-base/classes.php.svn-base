<?
/*
===============================================================================
 E J C M - Empresa Júnior de Consultoria em Microinformática - UFRJ
-------------------------------------------------------------------------------
 Nome do Projeto:	Casas Brasileiras
 
===============================================================================
 Nome da Classe:	classes.php
 Histórico de Atualizações:
 Data				Autor
 07/06/2008			Marcus Vinicius
 -------------------------------------------------------------------------------
 Descrição:		
 Observações:		

===============================================================================

								

*/
// Classe responsavel pelo upload de arquivos.
class upload {
	
	// Para usar essa funcao, no form deve ter algo no sentido:
	//
	// <form name = "form1" method = "post" action = "upload.php" enctype = "multipart/form-data">
	//		<input type = "file" name = "arquivo">
	//		<input type = "submit" name = "Submit" value = "Enviar">
	// </form>
	//
	function saveFile($strCampo, $strPath)
	{
		// Checa se o campo passado como parametro realmente existe
		if(isset($_FILES[$strCampo]))
		{
			// Pega o arquivo e armazena numa variavel
			$arquivo = $_FILES[$strCampo];

			// Checa se a pasta passada como parametro existe, senao cria ela
			if(!file_exists($strPath))
			{
				mkdir($strPath);
			}

			// Faz o Upload de fato do arquivo
			move_uploaded_file($arquivo['tmp_name'], $strPath . $arquivo['name']);

			// Testa se o arquivo foi de fato uppado, se nao da erro
			if(!file_exists($strPath . $arquivo['name']))
			{
				return false;
			}
			else
			{
				return $_FILES[$strCampo]['name'];
			}
		}
		// Se o campo nao existir de fato, retorna false (erro)
		else
		{
			return false;
		}
	}
}
?>