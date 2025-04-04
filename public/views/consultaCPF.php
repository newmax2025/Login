<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Consulta CPF</title>
    <link rel="stylesheet" href="../assets/css/consultaCPF.css?v=<?php echo md5_file('../assets/css/consultaCPF.css'); ?>">
    <script>
        fetch("../backend/verifica_sessao.php")
    .then(response => response.json())
    .then(data => {
        if (!data.autenticado) {
            window.location.href = "login.php"; // Redireciona se não estiver autenticado
        }
    })
    .catch(error => {
        console.error("Erro ao verificar sessão:", error);
        window.location.href = "login.php"; // Opcional: Redireciona em caso de erro
    });

        </script>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img class="logo" src="../assets/img/New Max Buscas.png" alt="Logo do Cliente">
        </div>
        <h2>Consulta CPF Comum</h2>
        <input type="text" id="cpf" placeholder="Digite o CPF" maxlength="14" oninput="formatCPF(this)">
        <button id="consultarBtn" onclick="consultarCPF()" disabled>Consultar</button>

        <!-- Turnstile CAPTCHA -->
        <div class="cf-turnstile" id="captcha" data-sitekey="0x4AAAAAABCUfVi2iZQzzgzx" data-callback="onCaptchaSuccess">
        </div>

        <input type="hidden" id="captcha-response" name="cf-turnstile-response">

        <p id="resultado"></p>

        <div id="dados" class="dados" style="display: none;">
            <p><span>Nome:</span> <span id="nome"></span></p>
            <p><span>CPF:</span> <span id="cpf_resultado"></span></p>
            <p><span>Safra:</span> <span id="safra"></span></p>
            <p><span>Data de Nascimento:</span> <span id="nascimento"></span></p>
            <p><span>Nome da Mãe:</span> <span id="nome_mae"></span></p>
            <p><span>Sexo:</span> <span id="sexo"></span></p>
            <p><span>Email:</span> <span id="email"></span></p>
            <p><span>Óbito:</span> <span id="obito"></span></p>
            <p><span>Status Receita:</span> <span id="status_receita"></span></p>
            <p><span>CBO:</span> <span id="cbo"></span></p>
            <p><span>Faixa de Renda:</span> <span id="faixa_renda"></span></p>
            <p><span>Veículos:</span> <span id="veiculos"></span></p>
            <p><span>Telefones:</span> <span id="telefones"></span></p>
            <p><span>Celulares:</span> <span id="celulares"></span></p>
            <p><span>Empregos:</span> <span id="empregos"></span></p>
            <p><span>Endereços:</span> <span id="enderecos"></span></p>
        </div>
    </div>

    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <script src="../assets/js/consultaCPF.js?v=<?php echo md5_file('../assets/js/consultaCPF.js'); ?>"></script>
</body>

</html>
