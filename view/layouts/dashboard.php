<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Financeiro - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Google Sans", sans-serif;
            background-color: #f0f0f0;
            display: flex;
            background: linear-gradient(135deg, #52807c, #123535);
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            width: 60vw;
            background-color: #fff;
            border-radius: 4px;
            padding: 30px;

        }

        #lancamentos {
            display: flex;
            flex-direction: row;
            gap: 2rem;
        }

        #sessao-lancamentos {
            display: flex;
            justify-content: space-between;
            width: 60vw;
        }

        #ultimas-entradas,
        #ultimas-saidas {
            width: 29vw;
            background-color: #fff;
            padding: 30px;
            border-radius: 4px;
        }

        main {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        #icone-clima {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #123535;
        }

        #user-icon {
            display: flex;
            flex-direction: row;
            margin-bottom: 8px;
        }

        #usuario {
            font-size: 1.5rem;
            font-weight: 600;
            padding: 4px 8px 4px 0px;
        }

        .valores {
            font-size: 1.2rem;
            font-weight: 600;
        }

        #modalAdicionar {
            padding: 20px;

        }

        button {
            padding: 8px 16px;
            border-radius: 4px;
            border: 1px solid #52807c4e;
            cursor: pointer;
            z-index: 11;
        }

        form {
            background-color: rgba(191, 191, 191, 0.2);
            padding: 15px;
            border-radius: 10px;
        }

        form label {
            display: block;
            width: fit-content;
            font-size: 0.8em;
            font-weight: 100;
            padding: 3px 7px;
            margin-top: 10px;
            margin-bottom: 0px;
            border-radius: 5px;
        }

        .fundo-dialog {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .fundo-dialog dialog {
            pointer-events: all;
        }

        .close-modal {
            background: #fff;
            padding: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <main>
        <section class="header">
            <div id="header-esquerda">
                <div>
                    <p id="saudacao"></p>
                    <div id="user-icon">
                        <p id="usuario"></p>
                        <i id="icone-clima"></i>
                    </div>
                </div>
                <div id="lancamentos">
                    <div id="entradas">
                        <p>Receita Mensal</p>
                        <p id="valor-receita" class="valores">R$00,00</p>
                    </div>
                    <div id="saidas">
                        <p>Despesa Mensal</p>
                        <p id="valor-despesa" class="valores">R$00,00</p>
                    </div>
                </div>
            </div>
            <div id="header-direita">
                <button type="button" id="btn-adicionar">Lançamentos</button>
                <div class="fundo-dialog">
                    <dialog id="modalAdicionar">
                        <div>
                            <p>Lançar valores</p>
                            <button class="btn-fechar close-modal">
                                &times;
                            </button>
                        </div>

                        <form action="" method="dialog">
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text" name="descricao" id="descricao">
                            </div>
                            <div class="form-group">
                                <label for="data">Data</label>
                                <input type="date" name="data" id="data">
                            </div>
                            <div class="form-group">
                                <label for="valor">Valor</label>
                                <input type="number" name="valor" id="valor">
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select name="categoria" id="categoria">
                                    <option value="alimentacao">Alimentação</option>
                                    <option value="lazer">Lazer</option>
                                    <option value="saude">Saúde</option>
                                    <option value="moradia">Moradia</option>
                                    <option value="transporte">Transporte</option>
                                    <option value="educacao">Educação</option>
                                    <option value="vestuario">Vestuário</option>
                                    <option value="cuidados">Cuidados pessoais</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <select name="tipo" id="tipo">
                                    <option value="entrada">Entrada</option>
                                    <option value="saida">Saída</option>

                                </select>
                            </div>
                        </form>
                        <button type="submit" class="btn-fechar">Fechar</button>
                    </dialog>
                </div>
            </div>
        </section>

        <section id="sessao-lancamentos">
            <div id="ultimas-entradas">
                <i class="fa-solid fa-plus"></i>
                <h3>Últimas entradas</h3>
                <p>R$2000,00</p>
            </div>
            <div id="ultimas-saidas">
                <i class="fa-solid fa-minus"></i>
                <h3>Últimas saídas</h3>
                <p>R$2000,00</p>
            </div>
        </section>
    </main>
    <script>
        //SAUDAÇÃO DA HEADER
        let saudacao = document.getElementById("saudacao");
        const horaAtual = new Date();
        const horas = horaAtual.getHours();
        const minutos = horaAtual.getMinutes();

        let hora = (horas * 100) + minutos;

        let saudacaoInicial = hora > 0 && hora <= 559 ? "Boa madrugada" :
            hora >= 600 && hora <= 1159 ? "Bom dia" :
            hora >= 1200 && hora <= 1759 ? "Boa tarde" :
            "Boa noite";

        saudacao.textContent = `${saudacaoInicial},`;

        const nomeUsuario = document.getElementById("usuario");
        const nomeTeste = "Batman"; // ALTERAR DINAMICAMENTE DE ACORDO COM NOME DO USUÁRIO

        nomeUsuario.textContent = nomeTeste;

        const iconeClima = document.getElementById("icone-clima");

        window.addEventListener("DOMContentLoaded", () => {
            if (saudacaoInicial === "Boa madrugada") {
                iconeClima.classList.add("fa-solid", "fa-bed");
            } else if (saudacaoInicial === "Bom dia") {
                iconeClima.classList.add("fa-regular", "fa-sun");
            } else if (saudacaoInicial === "Boa tarde") {
                iconeClima.classList.add("fa-solid", "fa-cloud");
            } else {
                iconeClima.classList.add("fa-regular", "fa-moon");
            }
        })

        const botaoAdicionar = document.getElementById("btn-adicionar");
        const botaoFechar = document.querySelectorAll(".btn-fechar");
        const modalAdicionar = document.getElementById("modalAdicionar");


        botaoAdicionar.addEventListener("click", function() {
            modalAdicionar.showModal();
        })

        botaoFechar.forEach(btn => btn.addEventListener("click", () => modalAdicionar.close())); // USAR VÁRIOS BOTÕES PARA FECHAR O MODAL
    </script>
</body>

</html>