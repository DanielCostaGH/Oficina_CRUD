# Oficina 2.0

![Laravel](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

> Projeto Oficina 2.0 - Prova de Conceito

# Índice/Sumário

* [Introdução](#introdução)
* [Tecnologias Usadas](#tecnologias-usadas)
* [Como Rodar o Projeto](#como-rodar-o-projeto)

## Introdução

Desafio: O dono de uma oficina mecânica precisa de uma solução para gerenciar orçamentos. Atualmente, muitos orçamentos são perdidos devido ao uso de papel. Para resolver esse problema, criamos o projeto Oficina 2.0, uma prova de conceito para facilitar o acompanhamento de pedidos de orçamento.

O projeto consiste em um CRUD simples para criar, editar, visualizar e pesquisar orçamentos. Ele foi desenvolvido em PHP com o framework Laravel e foi usado Vue.js para o front-end.

## Tecnologias Usadas

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)
- [Node.js](https://nodejs.org/en/)
- [Vue.js](https://vuejs.org/)
- [MySql](https://www.mysql.com/)
- [Tailwind](https://tailwindcss.com/)


## Como Rodar o Projeto

Este projeto utiliza o Docker com Laravel Sail para simplificar a configuração do ambiente. Siga as etapas abaixo para executá-lo:

1. Clone este repositório no seu ambiente de desenvolvimento.

2. Certifique-se de que você tenha o Docker instalado. Você pode obter o Docker [aqui](https://www.docker.com/get-started).

3. Execute os seguintes comandos na raiz do projeto para iniciar os contêineres Docker:

  <code> sail up -d </code> ou <code> vendor/bin/sail up -d </code>

4. Em alguns casos, pode ser necessário parar os serviços Apache e Redis em execução no sistema local para liberar as portas necessárias para o Docker. Você pode fazer isso com os seguintes comandos:

Parar o Apache: <code>sudo service apache2 stop</code> 
Parar o Redis: <code>sudo systemctl stop redis</code> 

5. Instale todas as dependências com o comando: <code>npm install</code> 

6. Execute as migrações do banco de dados: <code> sail artisan migrate</code> 

7. Inicie a aplicação pelo vite: <code>npm run dev</code> 

O projeto deve estar disponível em http://localhost

Agora, você está pronto para usar o Oficina 2.0!

