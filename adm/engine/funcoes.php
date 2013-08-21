<?
	
	//Pega a diretoria e o cargo
	function pegaDiretoriaCargo($tabela,$banco,$colunaTabela,$valorComparavel)
	{
		$arrMembro = array();
	
		$strSQL = "SELECT Diretoria_idDiretoria AS diretoria, Cargo_idCargo AS cargo FROM $strBanco.$strTabela WHERE $colunaTabela = ".$valorComparavel." AND dtIngresso = (SELECT MAX(dtIngresso) FROM $strBanco.$strTabela WHERE $colunaTabela = ".$valorComparavel.");";
	
		$resultSet = mysql_query($strSQL);
		
		if($resultRow = mysql_fetch_array($resultSet))
		{
			$arrMembro['idDiretoria'] = $resultRow['diretoria'];
			$arrMembro['idCargo'] = $resultRow['cargo'];
		}
		return $arrMembro;
	}

	function retornaDiretoria($strTabela,$strBanco,$colunaTabela,$valorComparavel,$termoOrdem,$conn)
	{		
		$strSQL		= "SELECT strNome FROM diretoria WHERE idDiretoria = (SELECT Diretoria_idDiretoria FROM $strBanco.$strTabela WHERE $colunaTabela = $valorComparavel ORDER BY $termoOrdem DESC LIMIT 1);";
		$resultSet	= mysql_query($strSQL, $conn);
		$num		= mysql_num_rows($resultSet);
		$resultRow 	= mysql_fetch_array($resultSet);

		if($num == 1)return $resultRow['strNome'];
		return false;
	}
	
	function retornaDiretoriaPorId($intId, $conn)
	{	
		mysql_select_db("peweknovo" , $conn) or die("Não foi possível selecionar o Banco de Dados.");
		$strSQL		= "SELECT strNome FROM diretoria WHERE idDiretoria = $intId;";
		$resultSet	= mysql_query($strSQL, $conn);
		$resultRow 	= mysql_result($resultSet,0);
		mysql_select_db("softpres" , $conn) or die("Não foi possível selecionar o Banco de Dados.");
		
		if(isset($resultRow))	{return $resultRow;}
		return false;
	}
	
	// Na codificaçao UTF8, o caracter ' é substituido por \'
	// Essa função faz com que a barra seja excluída para o conteúdo não voltar para o input com as barras, com a utilização do AJAX
	function deletaBarra($strString)
	{
		$strString = str_replace("\\","",$strString);
		return $strString;
	}
	
	// Verifica se alguma coisa já existe no Banco
	function checaNoBanco($strTabela,$strBanco,$colunaTabela,$valorComparavel, $conn){
		$strSQL		= "SELECT * FROM $strBanco.$strTabela WHERE $colunaTabela = $valorComparavel;";
		$resultSet	= mysql_query($strSQL, $conn);
		$num		= mysql_num_rows($resultSet);

		if($num > 0)return true;
		return false;		
	}

	//checa  se é para selecionar algo
	function checaOption($num1, $num2){
		if($num1 == $num2){echo "selected=\"selected\"";}
	}
	
	//Ponhe uma data no formato normal de datas
	function dataNormal($dtData){

		$arrayData = explode("-", $dtData);
		$dia = $arrayData[2];
		$mes = $arrayData[1];
		$ano = $arrayData[0];

		return "$dia/$mes/$ano";
	}
	
	//Ponhe uma data no formato de banco de dados
	function dataBD($dtData){

		$arrayData = explode("/", $dtData);
		$dia = $arrayData[0];
		$mes = $arrayData[1];
		$ano = $arrayData[2];

		return "$ano-$mes-$dia";
	}
	
	//Função que retorna a data atual
	function dataAtual()
    {
        require("conexao.php");

        $dtAtual = 0;

        $strSQL   = "SELECT CURDATE() AS dtAtual;";
        $sqlQuery = mysql_query($strSQL,$conn) or die(mysql_error());
        $dtAtual  = mysql_result($sqlQuery,0) or die(mysql_error());

        return $dtAtual;       
    }
	
	//Função para que não se torne possível escrever letras num campo do formulário
	function impedeLetrasNoCampo($campo,$e)
	{
		?>
		<script type="text/javascript">
			var campo = <?=$campo?>;
			var e = <?=$e?>;
			function tiraLetras(campo,e)
			{
			    var keynum;
			    if(window.event) // IE
			    {
			        keynum = e.keyCode
			    }
			    else if(e.which) // Netscape/Firefox/Opera
			    {
			        keynum = e.which
			    }
			    if(keynum>20)
			    {
			        var texto = String.fromCharCode(keynum);
			        if(/([^0-9\.{0,1}]+)/.test(texto)) {
			            return false;
			        }
			        else
			        {
			            return true;
			        }
			    }
			    else
			    {
			        document.getElementById(campo).value = document.getElementById(campo).value.replace(/([^0-9\.]+)/, "");
			        return true;
			    }
			}
		</script>
		<?
	}
	
	//Função  que verifica se a data digitada não ultrapassa a do banco de dados 
	function verificaData($Data)
	{
		$dtData = $Data;
			if(eregi("^(([0][1-9]|[1-2][0-9]|[3][0-1])/([0][1-9]|[1][0-2])/([0-9]{4}))$",$dtData))
			{
				$arrData = explode("/", $dtData);
				
				$dtDataAtual  = dataAtual();
				$arrDataAtual = explode("-", $dtDataAtual);

				if($arrDataAtual[0]>=$arrData[2])
				{
					if($arrDataAtual[0]>$arrData[2])
					{
						$dtData = $Data;
						$dtDataInserida = $Data;
						$dtData = dataBD($dtData);
					}
					else if($arrDataAtual[0]==$arrData[2])
					{
						if($arrDataAtual[1]>=$arrData[1])
						{
							if($arrDataAtual[1]>$arrData[1])
							{
								$dtData = $Data;
								$dtDataInserida = $Data;
								$dtDta = dataBD($dtData);
							}
							else if($arrDataAtual[1]==$arrData[1])
							{
								if($arrDataAtual[2]>=$arrData[0])
								{
									$dtData = $Data;
									$dtDataInserida = $Data;
									$dtData = dataBD($dtData);
								}
								else {$_SESSION['tipo'] = "erro";
									$_SESSION['msg'] = "Data Inválida.<br />";}
							}
							else{$_SESSION['tipo'] = "erro";
								$_SESSION['msg'] = "Data Inválida.<br />";}
						}
						else {$_SESSION['tipo'] = "erro";
							$_SESSION['msg'] = "Data Inválida.<br />";}
					}
					else{$_SESSION['tipo'] = "erro";
						$_SESSION['msg'] = "Data Inválida.<br />";}
				}
				else{$_SESSION['tipo'] = "erro";
					$_SESSION['msg'] = "Data Inválida.<br />";}
			}
			else{$_SESSION['tipo'] = "erro";
				$_SESSION['msg'] = "Data Inválida.<br />";}
	}
	
?>	