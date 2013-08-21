// Tenta inicializar o AJAX no Browser
function iniciaAjax()
{	
	// Inicializa Variável que irá armazenar o Objeto de Interação com o Servidor
	var xmlHttp;	

	// Tenta Instanciar para o Firefox, Opera 8.0+, Safari
	try
	{
		xmlHttp = new XMLHttpRequest();
	}
	catch (e)
	{
		try
		{
			//Internet Explorer 6.0+
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			try
			{
				//Internet Explorer 5.5+
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e)
			{
				alert("Seu browser não suporta AJAX!");
				return false;
			}
		}
	}
	
	return xmlHttp;
}

	function createXMLHTTP() 
	{
		var ajax;
		try 
		{
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		} 
		catch(e) 
		{
			try 
			{
				ajax = new ActiveXObject("Msxml2.XMLHTTP");
				alert(ajax);
			}
			catch(ex) 
			{
				try 
				{
					ajax = new XMLHttpRequest();
				}
				catch(exc) 
				{
					 alert("Esse browser não tem recursos para uso do Ajax");
					 ajax = null;
				}
			}
			return ajax;
		}
	
	
		   var arrSignatures = ["MSXML2.XMLHTTP.5.0", "MSXML2.XMLHTTP.4.0",
							    "MSXML2.XMLHTTP.3.0", "MSXML2.XMLHTTP",
							    "Microsoft.XMLHTTP"];
		   for (var i=0; i < arrSignatures.length; i++) 
		   {
				try 
				{
					var oRequest = new ActiveXObject(arrSignatures[i]);
					return oRequest;
				} 
				catch (oError) 
				{
			    }
		   }
		
			   throw new Error("MSXML is not installed on your system.");
	}



// Requisita do Servidor por GET a página Assíncrona
function enviaGET(pagina)
{
	xmlHttp.open("GET" , pagina , true);
	xmlHttp.send(null);
}

function enviaPOST(pagina,variaveis)
{
	xmlHttp.open("POST" , pagina , true);
	xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=iso-8859-1');
    xmlHttp.setRequestHeader('Content-length', variaveis.length ); 
	xmlHttp.send(variaveis);
}

function ajaxPronto(xmlHttp)
{
	if(xmlHttp.readyState == 4) return true;
}

function ajaxResult(xmlHttp)
{
	result = xmlHttp.responseText;
	return result;
}