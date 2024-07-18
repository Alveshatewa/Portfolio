

function validarCampos() {
    // Seleciona todos os campos obrigatórios
    var campos = document.querySelectorAll(".required");
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var isValid = true;

    // Percorre todos os campos para validação
    for (var i = 0; i < campos.length; i++) {
        if (campos[i].value.trim() === "") {
            // Se o campo estiver vazio, coloca o foco nele e exibe um alerta
            campos[i].focus();
            alert("Por favor, preencha todos os campos.");
            isValid = false;
            break;
        }

        // Valida o e-mail
        if (campos[i].type === "email" && !emailRegex.test(campos[i].value)) {
            campos[i].focus();
            alert("Por favor, insira um e-mail válido.");
            isValid = false;
            break;
        }
    }

    // Se todos os campos estão preenchidos e o e-mail é válido, pode prosseguir
    if (isValid) {
        alert("Formulário enviado com sucesso!");
        // Aqui você pode enviar o formulário ou fazer outras ações
        document.getElementById("formulario").submit();
    }
}
