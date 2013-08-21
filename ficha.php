<link href="./CSS/estilo.css" rel="stylesheet" type="text/css" />
<script src="adm/engine/jquery/jquery-1.3.2.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
$(document).ready(function(){
	$('span').click(function(){
        var pai = $(this).parent().attr('class');
        var id = $(this).attr('id');
        var idNivel = id.split('_');
        var nivel = idNivel[1];
        $('.'+pai+' span').css('background-image', 'url(CSS/imagens/vazia.png)');
        $('.'+pai+' span:lt('+nivel+')').css('background-image', 'url(CSS/imagens/cheia.png)');
    });
});
-->
</script>
<div class="part1" >
	<label for="nome">Nome</label>
	<input type="text" name="nome" id="nome">
	<h3>Características</h3>
	<div class="força" >
		<label class="caracteristica">Força</label>
		<span class="spv" id="spf_1"></span>
		<span class="spv" id="spf_2"></span>
		<span class="spv" id="spf_3"></span>
		<span class="spv" id="spf_4"></span>
		<span class="spv" id="spf_5"></span>
	</div>
	</br></br>
	<div class="habilidade" >	
		<label class="caracteristica">Habilidade</label>
		<span class="spv" id="sph_1"></span>
		<span class="spv" id="sph_2"></span>
		<span class="spv" id="sph_3"></span>
		<span class="spv" id="sph_4"></span>
		<span class="spv" id="sph_5"></span>
	</div>
	</br></br>
	<div class="resistencia" >	
		<label class="caracteristica">Resistência</label>
		<span class="spv" id="spr_1"></span>
		<span class="spv" id="spr_2"></span>
		<span class="spv" id="spr_3"></span>
		<span class="spv" id="spr_4"></span>
		<span class="spv" id="spr_5"></span>
	</div>
	</br></br>
	<div class="armadura" >
		<label class="caracteristica">Armadura</label>
		<span class="spv" id="spa_1"></span>
		<span class="spv" id="spa_2"></span>
		<span class="spv" id="spa_3"></span>
		<span class="spv" id="spa_4"></span>
		<span class="spv" id="spa_5"></span>
	</div>
	</br></br>
	<div class="poderdefogo" >
		<label class="caracteristica">Poder de Fogo</label>
		<span class="spv" id="sppdf_1"></span>
		<span class="spv" id="sppdf_2"></span>
		<span class="spv" id="sppdf_3"></span>
		<span class="spv" id="sppdf_4"></span>
		<span class="spv" id="sppdf_5"></span>
	</div>
	</br></br>
	<div class="pvs" >
		<label class="caracteristica">Pontos de vida</label>
		<span class="spv" id="sppvs_1"></span>
		<span class="spv" id="sppvs_2"></span>
		<span class="spv" id="sppvs_3"></span>
		<span class="spv" id="sppvs_4"></span>
		<span class="spv" id="sppvs_5"></span>
		<span class="spv" id="sppvs_6"></span>
		<span class="spv" id="sppvs_7"></span>
		<span class="spv" id="sppvs_8"></span>
		<span class="spv" id="sppvs_9"></span>
		<span class="spv" id="sppvs_10"></span>
		<span class="spv" id="sppvs_11"></span>
		<span class="spv" id="sppvs_12"></span>
		<span class="spv" id="sppvs_13"></span>
		<span class="spv" id="sppvs_14"></span>
		<span class="spv" id="sppvs_15"></span>
		<span class="spv" id="sppvs_16"></span>
		<span class="spv" id="sppvs_17"></span>
		<span class="spv" id="sppvs_18"></span>
		<span class="spv" id="sppvs_19"></span>
		<span class="spv" id="sppvs_20"></span>
	</div>
	</br></br>
	<div class="pms">
		<label class="caracteristica">Pontos de Magia</label>
		<span class="spv" id="sppms_1"></span>
		<span class="spv" id="sppms_2"></span>
		<span class="spv" id="sppms_3"></span>
		<span class="spv" id="sppms_4"></span>
		<span class="spv" id="sppms_5"></span>
		<span class="spv" id="sppms_6"></span>
		<span class="spv" id="sppms_7"></span>
		<span class="spv" id="sppms_8"></span>
		<span class="spv" id="sppms_9"></span>
		<span class="spv" id="sppms_10"></span>
		<span class="spv" id="sppms_11"></span>
		<span class="spv" id="sppms_12"></span>
		<span class="spv" id="sppms_13"></span>
		<span class="spv" id="sppms_14"></span>
		<span class="spv" id="sppms_15"></span>
		<span class="spv" id="sppms_16"></span>
		<span class="spv" id="sppms_17"></span>
		<span class="spv" id="sppms_18"></span>
		<span class="spv" id="sppms_19"></span>
		<span class="spv" id="sppms_20"></span>
	</div>
	</br></br></br>
	<h3>Vantagens</h3>
	<textarea cols="50" rows="5"></textarea>
	<h3>Desvantagens</h3>
	<textarea cols="50" rows="5"></textarea>
	<h3>História</h3>
	<textarea cols="50" rows="5"></textarea>
</div>

<div class="part2">
	<h3>Tipos de Dano</h3>
	<label for="nome">Força</label>
	<input type="text" name="nome" id="nome">
	</br>
	<label for="nome">Poder de Fogo</label>
	<input type="text" name="nome" id="nome">
	<h3>Caminhos da Magia</h3>
	<div class="agua">
		<label class="caracteristica">Água</label>
		<span class="spv" id="spfa_1"></span>
		<span class="spv" id="spfa_2"></span>
		<span class="spv" id="spfa_3"></span>
		<span class="spv" id="spfa_4"></span>
		<span class="spv" id="spfa_5"></span>
	</div>
	</br></br>
	<div class="ar">
		<label class="caracteristica">Ar</label>
		<span class="spv" id="spfar_1"></span>
		<span class="spv" id="spfar_2"></span>
		<span class="spv" id="spfar_3"></span>
		<span class="spv" id="spfar_4"></span>
		<span class="spv" id="spfar_5"></span>
	</div>
	</br></br>
	<div class="fogo">
		<label class="caracteristica">Fogo</label>
		<span class="spv" id="spff_1"></span>
		<span class="spv" id="spff_2"></span>
		<span class="spv" id="spff_3"></span>
		<span class="spv" id="spff_4"></span>
		<span class="spv" id="spff_5"></span>
	</div>
	</br></br>
	<div class="luz">
		<label class="caracteristica">Luz</label>
		<span class="spv" id="spfl_1"></span>
		<span class="spv" id="spfl_2"></span>
		<span class="spv" id="spfl_3"></span>
		<span class="spv" id="spfl_4"></span>
		<span class="spv" id="spfl_5"></span>
	</div>
	</br></br>
	<div class="terra">
		<label class="caracteristica">Terra</label>
		<span class="spv" id="spft_1"></span>
		<span class="spv" id="spft_2"></span>
		<span class="spv" id="spft_3"></span>
		<span class="spv" id="spft_4"></span>
		<span class="spv" id="spft_5"></span>
	</div>
	</br></br>
	<div class="trevas">
		<label class="caracteristica">trevas</label>
		<span class="spv" id="spftr_1"></span>
		<span class="spv" id="spftr_2"></span>
		<span class="spv" id="spftr_3"></span>
		<span class="spv" id="spftr_4"></span>
		<span class="spv" id="spftr_5"></span>
	</div>
	</br></br>
	<h3>Magias Conhecidas</h3>
	<textarea cols="50" rows="5"></textarea>
	<h3>Dinheiro e Itens</h3>
	<textarea cols="50" rows="5"></textarea>
	<div>
		<h3>Experiência</h3>
		<span class="spv"></span><span class="spv" ></span><span class="spv" ></span><span class="spv" ></span><span class="spv" ></span>
		<span class="spv"></span><span class="spv" ></span><span class="spv" ></span><span class="spv" ></span><span class="spv" ></span>
		<span class="spv"></span><span class="spv" ></span><span class="spv" ></span><span class="spv" ></span><span class="spv" ></span>
	</div>
</div>