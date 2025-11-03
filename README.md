🔊 Projeto Sonar - Sistema de Música (Laravel + Inertia.js + Vue)

Este projeto é um sistema de gerenciamento de músicas e playlists desenvolvido com Laravel (Backend), Inertia.js com Vue.js (Frontend SPA) e orquestrado via Laravel Sail (Docker).

🚀 Como Subir o Projeto

Pré-requisitos

Para rodar este projeto, você precisa ter apenas o Docker Desktop (ou Docker Engine) e o Git instalados na sua máquina.

1. Clonar e Configurar o Ambiente

Bash

# 1. Clone o repositório
git clone [URL_DO_SEU_REPOSITORIO] sonar
cd sonar

# 2. Copie o arquivo de ambiente
cp .env.example .env

# 3. Verifique as configurações do Docker no arquivo .env
# IMPORTANTE: O serviço PHP deve ser 'sonar' e o DB deve ser 'db' para o Sail funcionar.
# --------------------
APP_SERVICE=sonar
DB_HOST=db
# --------------------

2. Iniciar os Containers (Sail)

O Laravel Sail construirá e iniciará o ambiente de desenvolvimento.
Bash

# Inicia todos os containers em modo detached (segundo plano)
./vendor/bin/sail up -d

(A primeira execução pode levar alguns minutos.)

3. Instalar Dependências

Todos os comandos de gerenciamento (composer, npm, artisan) devem ser executados através do wrapper sail.
Bash

# 1. Instala as dependências do Composer (PHP)
./vendor/bin/sail composer install

# 2. Instala as dependências do NPM (Node/Inertia/Vue)
./vendor/bin/sail npm install

4. Configurar o Banco de Dados

O comando migrate:fresh limpa qualquer estado anterior e recria o esquema de banco de dados, garantindo que suas Migrations corrigidas sejam aplicadas perfeitamente.
Bash

# 1. Cria a chave de aplicação (se ainda não existir)
./vendor/bin/sail artisan key:generate

# 2. Limpa o banco e recria o esquema (CUIDADO: APAGA TODOS OS DADOS)
./vendor/bin/sail artisan migrate:fresh

5. Iniciar o Servidor de Assets (Vite)

Para o desenvolvimento com Inertia/Vue, você DEVE manter o servidor Vite (que compila e serve o frontend) rodando em uma janela de terminal separada.
Bash

# MANTENHA ESTE COMANDO ATIVO DURANTE O DESENVOLVIMENTO
./vendor/bin/sail npm run dev

6. Acessar o Projeto

Com os containers Docker rodando e o servidor Vite ativo, acesse a aplicação:

http://localhost