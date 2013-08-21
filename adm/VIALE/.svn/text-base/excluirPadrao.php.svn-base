<? session_start();
	
		/*
		===============================================================================
		 EJCM - Empresa Júnior de Consultoria em Microinformática - UFRJ
		 Nome do Projeto:	  Data:   Autor:
		 		
		===============================================================================*/
		
		//Arquivos de Inclusão
			require("../engine/definicoes.php");
		
		// Inicialização de Variáveis		
		
			//Nome da Tabela da qual deseja  fazer a exclusão
			$strTabela = "usuario";
			
			//Nome da coluna que serve de identificação para excluir
			$colunaIdentificacaoTabela = "idUsuario";
			
			//valor da coluna que serve de identificação para excluir
			$valorParaBusca = $_GET['id'];
			
			//Mensagem de erro 
			$strErro = "O usuario nao existe no sistema";
			
			//Mensagem de  Sucesso
			$strSucesso = "Usuario excluido com sucesso";
			
			//pagina a ser redirecionada 
			$strPagina = "gerenciarPadrao.php";
		
	
		//Funções (Funções Javascript e PHP)
			estaLogado($strBanco);
		
	
		excluir($strBanco,$strTabela,$colunaIdentificacaoTabela,$valorParaBusca,$strErro,$strSucesso);
		redirectTo($strPagina);
	?>
	