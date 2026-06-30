<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Financeiro - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    :root{
        --main-color: #123535;
        --secondary-color: #52807c;
        --facebook-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
    }

    body {
        font-family: "Google Sans", sans-serif;
        background-color: #f0f0f0;
        display: flex;
        background: linear-gradient(135deg, var(--secondary-color), var(--main-color));
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100vw;
    }

    .login-box {
        width: clamp(300px, 80vw, 400px);
        min-height: 26vh;
        background-color: #fff;
        padding: 30px;
        border-radius: 4px;
        box-shadow: var(--facebook-shadow);
        font-size: clamp(1rem, 2.5vw, 1.25rem);
    }

    .field {
        position: relative;
        margin-bottom: 20px;
    }

    .field input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: clamp(1rem, 2.5vw, 1.25rem);
    }

    #icon-senha:hover {
        color: #123535;
        transition: color 0.3s ease-in-out;
        cursor: pointer;
    }

    .field input:focus {
        outline: 1px solid var(--secondary-color);
    }

    input[type="email"],
    [type="password"] {
        font-size: 1rem;
    }

    .field label {
        position: absolute;
        top: -10px;
        left: 10px;
        background-color: #fff;
        padding: 0 5px;
        font-size: 1rem;
        color: #999;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: var(--secondary-color);
        color: #fff;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    h2 {
        color: #123535;
        text-align: center;
        margin-bottom: 40px;
    }

    button:hover {
        background-color: #699e9a;
    }

    i {
        color: #699e9aa4;
        position: absolute;
        right: 12px;
        top: 12px;
    }

    .erros{
        font-size: 1rem;
        padding: 10px 0 0 8px;
        color: var(--main-color);
        opacity: 0.8;
    }
</style>

<body>
    <main>
        <section class="login-box">
            <h2>Acesse sua conta</h2>

            <form id="formulario" action="" method="post">
                <div class="field">
                    <input type="email" name="email" id="email" placeholder=" " required>
                    <label for="email">SEU EMAIL</label>
                    <i class="fa-solid fa-envelope"></i>
                    <span class="erros" id="erroEmail"></span>
                </div>
                <div class="field">
                    <input type="password" name="senha" id="senha" placeholder=" " required>
                    <label for="senha">SUA SENHA</label>
                    <i id="icon-senha" class="fa-solid fa-eye" title="Mostrar senha"></i>
                    <span class="erros" id="erroSenha"></span>
                </div>
                
                <button type="submit" value="login" id="btn-login">Login</button>
            </form>
        </section>
    </main>
    <script>
        const mostrarSenha = document.getElementById("icon-senha");
        const inputSenha = document.getElementById("senha");
        const inputEmail = document.getElementById("email");
        const errors = document.getElementById("errors");

        mostrarSenha.addEventListener("click", () => {
            if (inputSenha.type === "password") {
                inputSenha.type = "text";
                mostrarSenha.style.color = "#123535";
                mostrarSenha.setAttribute("title", "Esconder senha")
            } else {
                inputSenha.type = "password"
                mostrarSenha.style.color = "#699e9aa4";
            }
        })

        function sanitizarEmail(email) {
            //Remove espaços nas bordas
            email = email.trim();

            //Valida formato com RegEx
            const regex = /^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/;

            if (!regex.test(email)) {
                throw new Error("Email inválido");
            }

            return email;
        }

        function validarSenha(senha) {
            if (senha.length < 8) {
                throw new Error("Senha muito curta");
            }

            if (senha.length > 72) {
                throw new Error("Senha muito longa");
            }

            return senha;
        }
        
        function limparErros(){
            erroEmail.textContent = "";
            erroSenha.textContent = "";
        }

        document.getElementById("formulario").addEventListener("submit", function(evento) {
            evento.preventDefault(); //impede o envio antes de validarSenha
            limparErros();

            let valido = true;

            try {
                sanitizarEmail(inputEmail.value);
            } catch (erro) {
                erroEmail.textContent = erro.message;
                valido = false;
            }

            try{
                validarSenha(inputSenha.value);
            }catch (erro){
                erroSenha.textContent = erro.message;
                valido = false;
            }

            if(valido){
                formulario.submit(); //envia form
            }
        })
    </script>
</body>

</html>