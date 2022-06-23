function validarClienteSide() {
  var cnpj = document.getElementById("CNPJ");
  var telefone = document.getElementById("Celular");
  var senha = document.getElementById("Senha");
  var senha2 = document.getElementById("Senha2");

  var validadorCNPJ = document.getElementById("CNPJValidador");
  var validadorCelular = document.getElementById("CelularValidador");
  var validadorSenha = document.getElementById("SenhaValidador");

    if(cnpj.value.length === 14){
        cnpj.classList.add('is-valid');
        cnpj.classList.remove('is-invalid');
        validadorCNPJ.className = 'valid-feedback';
        validadorCNPJ.innerHTML = "OK"
    }else{
        cnpj.classList.add('is-invalid');
        validadorCNPJ.className = 'invalid-feedback';
        validadorCNPJ.innerHTML = "CNPJ INVÁLIDO!"
        return false;
    }

    if(telefone.value.length === 15){
        telefone.classList.add('is-valid');
        telefone.classList.remove('is-invalid');
        validadorCelular.className ='valid-feedback';
        validadorCelular.innerHTML = "OK"
    }else{
        telefone.classList.add('is-invalid');
        validadorCelular.className = 'invalid-feedback';
        validadorCelular.innerHTML = "Digite o telefone corretamente!";
        return false;
    }

    if((senha.value.length === senha2.value.length) && (senha.value === senha2.value)){
        senha.classList.add('is-valid');
        senha.classList.remove('is-invalid');
        validadorSenha.className = 'valid-feedback'
        validadorSenha.innerHTML = 'As senhas conferem!'
    }else{
        senha.classList.add('is-invalid');
        validadorSenha.className = 'invalid-feedback';
        validadorSenha.innerHTML = "As senhas não são iguais!";
        return false;
    }

}

function validarServerSide(){
  var query = location.search;
  var erro = query.split("?erro=");

    console.log(query);
    console.log('partes',erro);

    if(erro[1] == 2){
        var cpf = document.getElementById("CNPJ");
        var validadorCPF = document.getElementById("CNPJValidador");
        cpf.classList.add('is-invalid');
        validadorCPF.className = 'invalid-feedback';
        validadorCPF.innerHTML = "JÁ EXISTE UM CLIENTE COM ESSE CNPJ ASSOCIADO!";
    }

    if(erro[1] == 3){
      var cnpj = document.getElementById("CNPJ");
      var validadorCNPJ = document.getElementById("CNPJValidador");
      cnpj.classList.add('is-invalid');
      validadorCNPJ.className = 'invalid-feedback';
      validadorCNPJ.innerHTML = "JÁ EXISTE UM CLIENTE COM ESSE CNPJ ASSOCIADO!";
  }

  if(erro[1] == 4){
    var email = document.getElementById("Email");
    var validadorEmail = document.getElementById("EmailValidador");
    email.classList.add('is-invalid');
    validadorEmail.className = 'invalid-feedback';
    validadorEmail.innerHTML = "JÁ EXISTE UM CLIENTE COM ESSE EMAIL ASSOCIADO!";
}
}
