Para instalar a Roleta de Desconto, seguir os seguintes passos a partir do terminal:

1) Mover para a pasta onde deseja instalar o sistema

2) Realizar o download do sistema no git: 
   git clone https://github.com/fmp-ba/roleta.git

3) Instalar o Composer (gerenciador de dependência do PHP):
   composer install

4) Criar o arquivo de configuração do ambiente .env:
   cp .env.example .env

5) Gerar a "encryption key" da aplicação:
   php artisan key:generate

6) Executar o servidor Web:
   php artisan serve

7) Abrir a aplicação no servidor:
   http://localhost:8000/
