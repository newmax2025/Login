<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Membros</title>
    <link rel="stylesheet" href="../assets/css/aM.css?v=<?php echo md5_file('../assets/css/aM.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            background-color: #111;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            text-align: center;
            padding: 20px;
            font-size: 24px;
            background: black;
        }

        header h1 {
            text-align: center;
            padding: 20px;
            font-size: 24px;
            background: black;
        }
            /* Banner grande ajustado para 100% da largura e altura da tela */
            .banner-grande {
            width: 100%;
            height: 40vh; /* Altura adaptável ao tamanho da tela */
            background-image: url('../assets/img/assine o plano premium .jpg'); /* Imagem inicial */
            background-size: contain; /* Ajusta a imagem sem cortar, mantendo a proporção */
            background-position: center;
            transition: background-image 0.5s ease;
            background-repeat: no-repeat; /* Evita que a imagem se repita */
            align-self: center;
            padding: auto;
        }

        .carousel h2 {
            margin-left: 10px;
        }
        .carousel-container {
            display: flex;
            overflow-x: auto;
            gap: 10px;
            padding: 10px;
            scroll-behavior: smooth;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* Internet Explorer 10+ */
        }
        .carousel-container::-webkit-scrollbar { 
            display: none;  /* Chrome, Safari, Opera */
        }
        .card {
            flex: 0 0 auto;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }
        .grande {
            width: 500px;
            height: 170px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px; /* Cantos arredondados */
            overflow: hidden; /* Garante que a borda não afete a imagem */
        }

        .pequeno {
            width: 130px;
            height: 110px;
            text-align: center;
            position:relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px; /* Cantos arredondados */
            overflow: hidden; /* Garante que a borda não afete a imagem */
        }
        
        .Gratuitos {
            width: 130px;
            height: 110px;
            text-align: center;
            position:relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px; /* Cantos arredondados */
            overflow: hidden; /* Garante que a borda não afete a imagem */
        }

        .Gratuitos:hover {
            transform: translateY(-5px) scale(1.05); /* Leve movimento para cima e ampliação */
            box-shadow: 0 0 15px rgba(9, 255, 0, 0.7); /* Borda iluminada verde */
        }

        .adicionando {
            width: 130px;
            height: 110px;
            text-align: center;
            position:relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px; /* Cantos arredondados */
            overflow: hidden; /* Garante que a borda não afete a imagem */
        }

        .adicionando:hover {
            transform: translateY(-5px) scale(1.05); /* Leve movimento para cima e ampliação */
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.7); /* Borda iluminada verde */
        }

        .pequeno:hover {
            transform: translateY(-5px) scale(1.05); /* Leve movimento para cima e ampliação */
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.7); /* Borda iluminada verde */
        }

        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .titulo-card {
            font-size: 8px;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        .btn-assinatura {
            width: 90%;
            height: 30%;
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #26ff00;
            color: white;
            border: none;
            padding: 10px 10px;
            font-size: 8px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-assinatura:hover {
            background-color: #0b03ff;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        fetch("../backend/get_user_data.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Erro ao carregar os dados do usuário");
            }
            return response.json();
        })
        .then(data => {
            console.log("Dados recebidos:", data); // Para depuração

            if (!data || !data.autenticado) {
                console.warn("Usuário não autenticado, redirecionando...");
                window.location.href = "login.php"; 
                return;
            }

            // Atualiza os elementos da página com os dados do usuário
            document.getElementById("revendedor").innerHTML = `Revendedor: ${data.nome}`;
            document.getElementById("whatsapp").setAttribute("href", data.whatsapp);
            document.getElementById("plano").innerHTML = `Plano: ${data.plano}`;
        })
        .catch(error => {
            console.error("Erro ao carregar os dados do usuário:", error);
            window.location.href = "login.php"; 
        });
        });

    </script>
        
</head>
<body>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header>Menu</header>
    <ul>
        <li><a href="#"><i class=""></i>Perfil 🔐</a></li>
        <li><a href="#" id="revendedor"><i class=""></i>Revendedor: Carregando...</a></li>
        <li><a href="https://wa.me/" id="whatsapp"><i class="fa-brands fa-whatsapp"></i>Whatsapp</a></li>
        <li><a href="#" id="plano"><i class=""></i>Plano: Carregando...</a></li>
        <a href="../backend/logout.php">Sair</a>
    </ul>
    </div>
    <header>
        <h1></h1>
    </header>
    
    <!-- Banner grande acima da seção de favoritos -->
    <div class="banner-grande" id="banner-grande"></div>

    <section class="carousel" id="favoritos">
        <h2>Favoritos</h2>
        <div class="carousel-container">
            <div class="card grande"> <img src="../assets/img/CRLV DIGITAL Horizontal.jpg" alt="CRLV DIGITAL Horizontal"> </div>
            <div class="card grande"> <img src="../assets/img/Impressão CNH Horizontal.jpg" alt="Impressão CNH Horizontal"> </div>
            <div class="card grande"> <img src="../assets/img/Consulta SERASA Horizontal.jpg" alt="Consulta SERASA Horizontal"> </div>
            <div class="card grande"> <img src="../assets/img/SCPC Horizontal.jpg" alt="SCPC Horizontal"> </div>
            <div class="card grande"> <img src="../assets/img/CNH Completa com Foto Horizontal.jpg" alt="CNH Completa com Foto Horizontal"> </div>
            <div class="card grande"> <img src="../assets/img/CONSULTA RADAR DE VEÍCULOS Horizontal.jpg" alt="CONSULTA RADAR DE VEÍCULOS Horizontal"> </div>
            <div class="card grande"> <img src="../assets/img/CONSULTA Detran Pro Horizontal.jpg" alt="CONSULTA Detran Pro Horizontal"> </div>
            <div class="card grande"> <img src="../assets/img/Placa Plus Plano Premium Horinzontal.jpg" alt="Placa Plus Plano Premium Horinzontal"> </div>
            <div class="card grande"> <img src="../assets/img/Consulta  CREDI LINK Horizontal.jpg" alt="Consulta  CREDI LINK Horizontal"> </div>
            <!-- Adicione mais cards conforme necessário -->
        </div>
    </section>
    <section>
        <section class="carousel" id="favoritos">
            <h2> Modulos Gratuitos</h2>
            <div class="carousel-container">
                <div class="card Gratuitos">  
                   <a href="consultaCPF.php"> <img src="../assets/img/CONSULTA CPF MAX.jpg" alt="CRLV (Todos os Estados)"></a> 
                   </div>
                  <div class="card adicionando" onclick="mostrarBotao(this)">  
        <img src="../assets/img/Consulta Email (adicionando).jpg" alt="CRLV (Todos os Estados)">
        <button class="botao">Sendo Adicionado</button>
    </div>
    <div class="card adicionando" onclick="mostrarBotao(this)">  
        <img src="../assets/img/Consulta CNPJ (adicionando).jpg" alt="CRLV (Todos os Estados)">
        <button class="botao">Sendo Adicionado</button>
    </div>
    <div class="card adicionando" onclick="mostrarBotao(this)">  
        <img src="../assets/img/Consulta Funcionário (adicionando).jpg" alt="CRLV (Todos os Estados)">
        <button class="botao">Sendo Adicionado</button>
    </div>
    <div class="card adicionando" onclick="mostrarBotao(this)">  
        <img src="../assets/img/Consulta Placa (adicionando).jpg" alt="CRLV (Todos os Estados)">
        <button class="botao">Sendo Adicionado</button>
    </div>
    <div class="card adicionando" onclick="mostrarBotao(this)">  
        <img src="../assets/img/desmascarar Pix (adicionando).jpg" alt="CRLV (Todos os Estados)">
        <button class="botao">Sendo Adicionado</button>
    </div>

    </section>
    <section class="carousel" id="treinos">
        <section><div id="modal" class="modal">
            <div class="modal-content">
                <p>Contrate o Plano</p>
            </div></section>
        <h2>Modulos Avançados</h2>
        <div class="carousel-container">
            <div class="card pequeno"> 
                
                <img src="../assets/img/CRLV (Todos os Estados).jpg" alt="CRLV (Todos os Estados)">
                <p>Anel de Sole em Ouro e Diamante 50 pontos</p>
               
            </div>
            <div class="card pequeno"> 
               
                <img src="../assets/img/Impressão CNH (Original).jpg" alt="img/Impressão CNH (Original)a">
                
            </div>
            <div class="card pequeno"> 
                
                <img src="../assets/img/Consulta SERASA.jpg" alt="Consulta SERASA">
                
            </div>
            <div class="card pequeno"> 
               
                <img src="../assets/img/SCPC.jpg" alt="SCPC">
                
            </div>
            <div class="card pequeno"> 
                
                <img src="../assets/img/CNH Completa com Foto.jpg" alt="CNH Completa com Foto">
                
            </div>
            <div class="card pequeno"> 
                
                <img src="../assets/img/CONSULTA RADAR DE VEÍCULOS.jpg" alt="CONSULTA RADAR DE VEÍCULOS">
                
            </div>
            <div class="card pequeno"> 
                
                <img src="../assets/img/cONSULTA Detran Pro.jpg" alt="cONSULTA Detran Pro">
               
            </div>
            <div class="card pequeno"> 
               
                <img src="../assets/img/Consulta  CREDI LINK.jpg" alt="Consulta  CREDI LINK">
               
            </div>
            <div class="card pequeno"> 
                
                <img src="../assets/img/CNH Simples.jpg" alt="CNH Simples">
                
            </div>
            <div class="card pequeno"> 
                
                <img src="../assets/img/Consulta Veicular Max.jpg" alt="Consulta Veicular Max">
            </div>
            <div class="card pequeno"> 
              
                <img src="../assets/img/CONSULTA CPF MAX.jpg" alt="CONSULTA CPF MAX">
               
            </div>
            <!-- Adicione mais cards conforme necessário -->
        </div>
        <section class="carousel" id="treinos">
        <div class="carousel-container">

               <div class="card pequeno"> 
               
                        <img src="../assets/img/Consulta Frota Veicular.jpg" alt="Treino Academia">
                      
                    </div>
                    <div class="card pequeno"> 
                        
                        <img src="../assets/img/CONSULTA RECEITA FEDERAL.jpg" alt="Treino Academia">
                       
                    </div>

            <div class="card pequeno"> 
               
                <img src="../assets/img/CONSULTA  CADSUS.jpg" alt="CONSULTA  CADSUS">
            </div>
            <div class="card pequeno"> 
                
                <img src="../assets/img/Consulta Tracker.jpg" alt="Consulta Tracker">
               
            </div>
            <div class="card pequeno"> 
                
                <img src="../assets/img/Consulta Tracker AVANÇADO.jpg" alt="Consulta Tracker AVANÇADO">
                
            </div>
            <div class="card pequeno"> 
                
                <img src="../assets/img/Consulta Score.jpg" alt="Consulta Score">
                
            </div>
            <div class="card pequeno"> 
                
                <img src="../assets/img/Consulta DateCorp.jpg" alt="Consulta DateCorp">
                
            </div>
            <div class="card pequeno"> 
               
                <img src="../assets/img/Consulta Search Data.jpg" alt="Consulta Search Data">
              
            </div>
            <div class="card pequeno"> 
               
                <img src="../assets/img/Consulta Dívida.jpg" alt="Consulta Dívida">
               
            </div>
            <div class="card pequeno"> 
               
                <img src="../assets/img/Consulta  Cadin.jpg" alt="Consulta  Cadin">
                
            </div>
            <div class="card pequeno"> 
              
                <img src="../assets/img/CONSULTA EMPRESARIAL.jpg" alt="CONSULTA EMPRESARIAL">
              
            </div>
            <!-- Adicione mais cards conforme necessário -->
        </div>
        <section class="carousel" id="treinos">
            <div class="carousel-container">

                    <div class="card pequeno"> 
                        
                        <img src="../assets/img/Gerar Score.jpg" alt="Treino Academia">
                       
                    </div>
                    <div class="card pequeno"> 
                       
                        <img src="../assets/img/Buscar Modelo de Veículo.jpg" alt="Treino Academia">
                       
                    </div>
                    <div class="card pequeno"> 
                     
                        <img src="../assets/img/Gerador de Aniversário.jpg" alt="Treino Academia">
                       
                    </div>
                    <div class="card pequeno"> 
                      
                        <img src="../assets/img/CONSULTA INSS.jpg" alt="Treino Casa">
                        
                    </div>
                    <div class="card pequeno"> 
                        
                        <img src="../assets/img/Buscar Servidor Público.jpg" alt="Treino Academia">
                       
                    </div>
                    <div class="card pequeno"> 
                      
                        <img src="../assets/img/Consultar Empréstimo.jpg" alt="Treino Casa">
                       
                    </div>
                        <div class="card pequeno"> 
                       
                            <img src="../assets/img/óbito.jpg" alt="óbito">
                            </div>
                            
                            <div class="card pequeno"> 
                               
                                <img src="../assets/img/Buscar Foto.jpg" alt="Buscar Foto">
                              
                            </div>
                            <div class="card pequeno"> 
                               
                                <img src="../assets/img/Buscar Processo.jpg" alt="Buscar Processo">
                              
                            </div>
                            <div class="card pequeno"> 
                                
                                <img src="../assets/img/Buscar Assinatura.jpg" alt="Consultar FGTS">
                               
                            </div>
                            <div class="card pequeno"> 
                                
                                <img src="../assets/img/Consultar FGTS.jpg" alt="Buscar Processo">
                               
                            </div>
                        </div>
                        <section class="carousel" id="treinos">
                            <div class="carousel-container">

                                    <div class="card pequeno"> 
                                     
                                        <img src="../assets/img/buscar mandato.jpg" alt="buscar mandato">
                                       
                                    </div>
                                    <div class="card pequeno"> 
                                      
                                        <img src="../assets/img/imprimir boletim de ocorrência.jpg" alt="imprimir boletim de ocorrência">
                                        
                                    </div>
                                    <div class="card pequeno"> 
                                        
                                        <img src="../assets/img/listagem novos aposentados.jpg" alt="listagem novos aposentados">
                                       
                                    </div>
                                    <div class="card pequeno"> 
                                      
                                        <img src="../assets/img/CRV + código.jpg" alt="CRV + código">
                                       
                                    </div>
                                    <div class="card pequeno"> 
                                       
                                        <img src="../assets/img/gerador de rendas.jpg" alt="gerador de rendas">
                                        
                                        </div>
                                        <div class="card pequeno"> 
                                       
                                            <img src="../assets/img/condutor pro.jpg" alt="condutor pro">
                                            </div>
                                            
                                            <div class="card pequeno"> 
                                               
                                                <img src="../assets/img/BACEN.jpg" alt="BACEN">
                                              
                                            </div>

                                            <div class="card pequeno"> 
                                       
                                                <img src="../assets/img/buscar cep.jpg" alt="BACEN">
                                              
                                            </div>

                                            <div class="card pequeno"> 
                                       
                                                <img src="../assets/img/faceMatch.jpg" alt="BACEN">
                                              
                                            </div>

                                            <div class="card pequeno"> 
                                       
                                                <img src="../assets/img/consulta pai e mãe.jpg" alt="BACEN">
                                              
                                            </div>

                                            <div class="card pequeno"> 
                                       
                                                <img src="../assets/img/buscar parentes.jpg" alt="BACEN">
                                              
                                            </div>
                                            <!-- Adicione mais cards conforme necessário -->
                                        </div>
                                        <section class="carousel" id="treinos">
                                            <div class="carousel-container">

                                                    <div class="card pequeno"> 
                                               
                                                        <img src="../assets/img/Pesquisa por nome.jpg" alt="BACEN">
                                                      
                                                    </div>

                                                    <div class="card pequeno"> 
                                               
                                                        <img src="../assets/img/motorista  de 99_uber.jpg" alt="BACEN">
                                                      
                                                    </div>

                                                    <div class="card pequeno"> 
                                               
                                                        <img src="../assets/img/motorista  de ifood_uber eats.jpg" alt="BACEN">
                                                      
                                                    </div>
                                                </div>
                        <footer>
                            <div class="copy">
                                <p>Copyright © 2025 New Max Buscas | All Rights Reserved </p>
                            </div>
                        </footer>
    </section>
    <script>
        
        // Função para alterar a imagem do banner grande
        function alterarBanner(imagem) {
            document.getElementById('banner-grande').style.backgroundImage = `url('${imagem}')`;
        }

        document.querySelectorAll('.carousel-container').forEach(container => {
            let isDown = false;
            let startX;
            let scrollLeft;
            container.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - container.offsetLeft;
                scrollLeft = container.scrollLeft;
            });
            container.addEventListener('mouseleave', () => {
                isDown = false;
            });
            container.addEventListener('mouseup', () => {
                isDown = false;
            });
            container.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - container.offsetLeft;
                const walk = (x - startX) * 2;
                container.scrollLeft = scrollLeft - walk;
            });

            container.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - container.offsetLeft;
            const walk = (x - startX) * 2;
            container.scrollLeft = scrollLeft - walk;
        });

        // Adiciona suporte a toque para mobile
        container.addEventListener('touchstart', (e) => {
            isDown = true;
            startX = e.touches[0].pageX - container.offsetLeft;
            scrollLeft = container.scrollLeft;
        });

        container.addEventListener('touchmove', (e) => {
            if (!isDown) return;
            const x = e.touches[0].pageX - container.offsetLeft;
            const walk = (x - startX) * 2;
            container.scrollLeft = scrollLeft - walk;
        });

        container.addEventListener('touchend', () => {
            isDown = false;
        });

         // Função para abrir o modal
         function abrirModal() {
            document.getElementById("modal").style.display = "flex";
        }

        // Função para fechar o modal
        function fecharModal() {
            document.getElementById("modal").style.display = "none";
        }

        // Adiciona o evento de clique aos cards
        document.querySelectorAll('.card.pequeno').forEach(card => {
            card.addEventListener('click', abrirModal);
        });

        // Fecha o modal se o fundo (fora da área modal) for clicado
        document.getElementById("modal").addEventListener('click', function(event) {
            if (event.target === document.getElementById("modal")) {
                fecharModal();
            }
        });
        });
    </script>
</body>
</html>
