/* valida-dados.js - 09/08/2016 */

function validaUsuariosCadastro()
{
	var nome_id = document.getElementById('nome');
	var login_id = document.getElementById('login');
	var senha_id = document.getElementById('senha');
	var conf_senha_id = document.getElementById('conf_senha');
	
	var nome = nome_id.value;
	var login = login_id.value;
	var senha = senha_id.value;
	var conf_senha = conf_senha_id.value;
	
	if(nome === "")
	{
		alert("Nome deve ser preenchido !");
		return false;
	}
	
	if(login === "")
	{
		alert("Login deve ser preenchido !");
		return false;
	}
	else if(login.indexOf(" ") !== -1)
	{
		alert("Login não deve conter espaços !");
		return false;
	}
	
	if(senha === "")
	{
		alert("A senha deve ser preenchida !");
		return false;
	}
	else if(senha !== conf_senha)
	{
		alert("A senha está diferente !");
		return false;
	}
	
	return true;
}
function validaVagasCadastro()
{
	var titulo_id = document.getElementById('titulo');
	var descricao_id = document.getElementById('descricao');
	
	var titulo = titulo_id.value;
	var descricao = descricao_id.value;
	
	if(titulo === "")
	{
		alert("Deve preencher o título da Vaga !");
		return false;
	}
	
	if(descricao === "")
	{
		alert("Deve informar a descrição da Vaga !");
		return false;
	}
	
	return true;
}
function validaLogin()
{
	var login_id = document.getElementById('login');
	var senha_id = document.getElementById('senha');
	
	var login = login_id.value;
	var senha = senha_id.value;
	
	if((login === "") || (senha === ""))
	{
		alert("Login e Senha deve ser preenchidos !");
		return false;
	}
	
	return true;
}
function validaFaleConosco()
{
	var nome_id = document.getElementById('nome');
	var assunto_id = document.getElementById('assunto');
	var email_id = document.getElementById('email');
	var mensagem_id = document.getElementById('mensagem');
	
	var nome = nome_id.value;
	var assunto = assunto_id.value;
	var email = email_id.value;
	var mensagem = mensagem_id.value;
	
	if(nome === "")
	{
		alert("Nome deve ser preenchido !");
		return false;
	}
	
	if(assunto === "")
	{
		alert("Assunto deve ser preenchido !");
		return false;
	}
	
	if(!validaEmail(email))
	{
		alert("E-mail inválido !");
		return false;
	}
	
	if(mensagem === "")
	{
		alert("Para o envio do formulario deve incluir a mensagem !");
		return false;
	}
	
	return true;
}
function validaCurriculo()
{
	var nome_id = document.getElementById('nome');
	var cpf_id = document.getElementById('cpf');
	var email_id = document.getElementById('email');
	var curriculo_id = document.getElementById('curriculo');
	
	var nome = nome_id.value;
	var cpf = cpf_id.value;
	var email = email_id.value;
	var curriculo = curriculo_id.value;
	
	if(nome === "")
	{
		alert("Nome deve ser preenchido !");
		return false;
	}
	
	if(!validaCpf(cpf))
	{
		alert("CPF Inválido !");
		return false;
	}
	
	if(!validaEmail(email))
	{
		alert("E-mail Inválido !");
		return false;
	}
	
	/* extrai a extenção do nome do arquivo */
	var nome_arquivo = curriculo.split('.');
	var extencao = nome_arquivo[nome_arquivo.length - 1];
	extencao = extencao.toLowerCase();
	
	if(curriculo === "")
	{
		alert("Arquivo deve ser selecionado !");
		return false;
	}
	else if(((extencao !== "pdf") && (extencao !== "doc")) && ((extencao !== "docx") && (extencao !== "txt")))
	{
		alert("Extenção ou arquivo inválido !");
		return false;
	}
	
	return true;
}

/* Função para Validar Email */
function validaEmail(email){

	var res = email.match(/^([\w\-]+\.)*[\w\- ]+@([\w\- ]+\.)+([\w\-]{2,3})$/g);
	if(res === null){
		return false;
	}
	else{
		return true;
	}

}
/* Função para Validar CPF */
function validaCpf(cpf){

	cpf = cpf.toString();
	cpf = cpf.replace(/[^0-9]/g, '');
	
	if(cpf.length != 11){
		return false;
	}
	
	var rep = 0;
	for(var r = 0; r < 10; r++){
		if(cpf.substr(r,1) === cpf.substr(10,1)){
			rep += 1
		}
		if(rep === 10){
			return false;
		}
	}
	
	var soma = 0;
	var valida = false;
	var peso_mult1 = [10,9,8,7,6,5,4,3,2];
	var peso_mult2 = [11,10,9,8,7,6,5,4,3,2];
	
	for(var i = 0; i < 9; i++){
		soma += peso_mult1[i] * parseInt(cpf.substr(i,1));
	}
	
	var resto = soma % 11;
	if(resto < 2){
		resto = 0;
	}
	else{
		resto = 11 - resto;
	}
	
	var digito = resto.toString();
	var parc_cpf = cpf.substr(0,9) + digito;
	soma = 0;
	
	for(var j = 0; j < 10; j++){
		soma += peso_mult2[j] * parseInt(parc_cpf.substr(j,1));
	}
	
	resto = soma % 11;
	if(resto < 2){
		resto = 0;
	}
	else{
		resto = 11 - resto;
	}
	
	digito += resto.toString();
	if(cpf.substr(9,2) === digito){
		valida = true;
	}

	return valida;

}