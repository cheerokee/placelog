$(document).ready(function(){
	if($("#inputIcon").val() != ''){
		var icon = $("#inputIcon").val();
        $(".selectable").each(function(){
			if($(this).attr('src') == icon)
			{
				$(this).attr('class','img-responsive img-thumbnail selectable active');
			}
		});
	}

	$(".selectable").click(function(){
        $(".selectable").attr('class','img-responsive img-thumbnail selectable');
        $(this).attr('class','img-responsive img-thumbnail selectable active');
		var icon = $(this).attr('src');
		$("#inputIcon").val(icon);
	});

	$(".rich-text").each(function(){
		$(this).summernote({
			onpaste: function(e) {
				var thisNote = $(this);
				var updatePastedText = function(someNote){
					var original = someNote.code();
					var cleaned = CleanPastedHTML(original); //this is where to call whatever clean function you want. I have mine in a different file, called CleanPastedHTML.
					someNote.code('').html(cleaned); //this sets the displayed content editor to the cleaned pasted code.
				};
				setTimeout(function () {
					//this kinda sucks, but if you don't do a setTimeout,
					//the function is called before the text is really pasted.
					updatePastedText(thisNote);
				}, 10);
			}
		});
	});

	//$("#Inputcnpj").mask("99.999.999/9999-99");

	if($("#Inputtipo_pessoa").val()==1){
		$("#Inputcnpj").parent().show();
		$("#Inputcnpj").attr('required','required');
	}else{
		$("#Inputcnpj").val('');
		$("#Inputcnpj").removeAttr('required');
		$("#Inputcnpj").parent().hide();
	}

	if($("#Inputcnpj").val() != ''){
		$("#Inputtipo_pessoa").val(1);
	}

	$("#Inputtipo_pessoa").change(function(){
		if($(this).val() == 1){
			$("#Inputcnpj").parent().show();
			$("#Inputcnpj").attr('required','required');
		}else{
			$("#Inputcnpj").val('');
			$("#Inputcnpj").removeAttr('required');
			$("#Inputcnpj").parent().hide();
		}
	});

	$(".telefone").keyup(function () {
		mascara( this, mtel );
	});

	$(".phone").keyup(function () {
		mascara( this, mtel );
	});

	$(".cpf").blur(function(){
		ValidarCPF(this);
	});

	setTimeout(function(){
		$( ".moeda" ).each(function() {
			var valor = floatToMoeda($(this).val()*1);
			$(this).val(valor);
		});
	},200);

	$(".decision").click(function(){
		var link = $(this).attr('href');
		bootbox.confirm({
			message: "Você deseja realmente excluir esse registro?",
			buttons: {
				cancel: {
					label: 'Não',
					className: 'btn-danger'
				},
				confirm: {
					label: 'Sim',
					className: 'btn-success btnConfirm',
				}
			},
			callback: function (result) {
				if(!result){
					this.modal('hide');
				}else{
					window.location.href = link;
				}
			}
		});

		$( ".btnConfirm" ).each(function() {
			var element = this;
			$(document).keypress(function(e) {
				if(e.which == 13) {
					$(element).trigger('click');
				}
			});
		});
		return false;
	});
	//Página de registro
	var erro=0;
	$("input[name=confirmation]").blur(function(){		
		erro = verifySenha(erro);
	});

	setTimeout(function(){
		$("input[name='password']").trigger('blur');
	},300);

	$(".password").blur(function(){
		if($(this).val() != ''){
			$(this).attr('required','required');
			$("#password-cad").after('<div class="alert alert-danger alert-dismissable confirmation-alert">Redigite sua senha ou então deixe o campo em branco!</div>');
			setTimeout(function(){
				$(".confirmation-alert").fadeOut('fast');
			},3000);
			$("button[name=submit]").hide();
			return false;
		}else{
			$(this).removeAttr('required');
			$("button[name=submit]").show();
		}
	});

	function verifySenha(erro){
		if(($("input[name=confirmation]").val() == $("#password-cad").val()) || ($("input[name=confirmation]").val() == $("#Inputpassword").val())){
			$("button[name=submit]").show();
		}else{
			$("input[name=confirmation]").val('');
			$("input[name=confirmation]").after('<div class="alert alert-danger alert-dismissable confirmation-alert">As senhas não batem!</div>');
			setTimeout(function(){
				$(".confirmation-alert").fadeOut('fast');
			},3000);
			erro++;
			$("button[name=submit]").hide();
		}
		return erro;
	}

	$(".limit-number").each(function(){
        var id = this.id.replace('limit-number-','');
        var limit = Number($(this).html());
        var ntxt = Number($("#input-"+id).val().length);
		console.log(id,limit,$("#input-"+id).val());
        $(this).html(limit - ntxt);
	});

    $(".limit-text").keypress(function(){
        var text = $(this).val();
        var limit = $(this).attr('limit-text');

        var id = this.id.replace('input-','');
		$("#limit-number-"+id).html(limit - text.length);
        if(!(text.length <= limit))
        	return false;
    });

    $(".limit-text").on('keydown',function(){
        var key = event.keyCode || event.charCode;
        if( key == 8 || key == 46 ){
            var id = this.id.replace('input-','');
            var text = $(this).val();
            var limit_tot = text.length;
            var limit = Number($(this).attr('limit-text'));
			$("#limit-number-"+id).html(limit - limit_tot);
		}
	});
});

function setToday(input){
	var d = new Date();
	$("#"+input).val(d.getFullYear()+"-"+("00" + d.getMonth()).slice(-2)+"-"+("00" + d.getDate()).slice(-2));
}

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}

function mascara(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}
function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}

function moeda(v){
	v=v.replace(/\D/g,"") // permite digitar apenas numero
	v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
	v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 13 digitos
	v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 10 digitos
	v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 7 digitos
	v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 4 digitos

	return v;
}

function mtel(v){
	v = v.replace(/\D/g, "");
	v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
	v = v.replace(/(\d)(\d{4})$/, "$1-$2");
	return v;
}

function moedaToFloat(v){
	v = v.replace(".","");
	v = v.replace(",",".");
	return v;
}

function floatToMoeda(valor){
	var inteiro = null, decimal = null, c = null, j = null;
	var aux = new Array();
	valor = ""+valor;
	c = valor.indexOf(".",0);
	//encontrou o ponto na string
	if(c > 0){
		//separa as partes em inteiro e decimal
		inteiro = valor.substring(0,c);
		decimal = valor.substring(c+1,valor.length);

		if(decimal.length === 1) {
			decimal += "0";
		}
	}else{
		inteiro = valor;
	}

	//pega a parte inteiro de 3 em 3 partes
	for (j = inteiro.length, c = 0; j > 0; j-=3, c++){
		aux[c]=inteiro.substring(j-3,j);
	}

	//percorre a string acrescentando os pontos
	inteiro = "";
	for(c = aux.length-1; c >= 0; c--){
		inteiro += aux[c]+'.';
	}
	//retirando o ultimo ponto e finalizando a parte inteiro

	inteiro = inteiro.substring(0,inteiro.length-1);

	decimal = parseInt(decimal);
	if(isNaN(decimal)){
		decimal = "00";
	}else{
		decimal = ""+decimal;
		if(decimal.length === 1){
			decimal = "0"+decimal;
		}
	}
	valor = inteiro+","+decimal;
	return valor;
}

function roundNumber(num, scale) {
	if(!("" + num).includes("e")) {
		return +(Math.round(num + "e+" + scale)  + "e-" + scale);
	} else {
		var arr = ("" + num).split("e");
		var sig = ""
		if(+arr[1] + scale > 0) {
			sig = "+";
		}
		return +(Math.round(+arr[0] + "e" + sig + (+arr[1] + scale)) + "e-" + scale);
	}
}

function ValidarCPF(Objcpf){
	var cpf = Objcpf.value;
	exp = /\.|\-/g
	cpf = cpf.toString().replace( exp, "" );
	var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
	var soma1=0, soma2=0;
	var vlr =11;

	for(i=0;i<9;i++){
		soma1+=eval(cpf.charAt(i)*(vlr-1));
		soma2+=eval(cpf.charAt(i)*vlr);
		vlr--;
	}
	soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
	soma2=(((soma2+(2*soma1))*10)%11);

	var digitoGerado=(soma1*10)+soma2;
	if(digitoGerado!=digitoDigitado)
		alert('CPF Invalido!');
}


