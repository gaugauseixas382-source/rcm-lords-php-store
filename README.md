# Loja Online RCM Lords (PHP)

Projeto académico de uma loja online desenvolvido em **PHP e MySQL**, com sistema de autenticação de utilizadores e funcionalidades básicas de e-commerce.

## 📌 Descrição do Projeto

Este projeto implementa uma aplicação web com backend em PHP, permitindo o registo e login de utilizadores, gestão de sessões, carrinho de compras, checkout e área administrativa.  
Foi desenvolvido em ambiente local como parte do processo de aprendizagem de programação backend.

## ⚙️ Funcionalidades

- Registo de utilizadores
- Login e logout com sessões
- Área de perfil protegida
- Loja com listagem de produtos
- Carrinho de compras
- Processo de checkout
- Área administrativa
- Ligação a base de dados MySQL

## 🛠️ Tecnologias Utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- XAMPP (ambiente local)

## 📂 Estrutura do Projeto

# RCM Lords – PHP Store

Projeto de uma loja online desenvolvido em *PHP* com ligação a *MySQL*, criado em ambiente local como parte do processo de aprendizagem de desenvolvimento backend.

---

## ⚙️ Funcionalidades

- Registo de utilizadores  
- Login e logout com sessões  
- Área de perfil protegida  
- Loja com listagem de produtos  
- Carrinho de compras  
- Processo de checkout  
- Área administrativa  
- Ligação à base de dados MySQL  

---

## 🛠️ Tecnologias Utilizadas

- PHP  
- MySQL  
- HTML5  
- CSS3  
- XAMPP (ambiente local)
-   
## ▶️ Como Executar o Projeto

1. Instalar o XAMPP  
2. Colocar o projeto dentro da pasta `htdocs`  
3. Iniciar os serviços **Apache** e **MySQL**  
4. Importar o ficheiro `database/rcm_lords.sql` no **phpMyAdmin**  
5. Ajustar as credenciais da base de dados no ficheiro `includes/config.php`  
6. Aceder ao projeto no browser:  
   `http://localhost/rcm-lords-php-store/`
---

## 📁 Estrutura do Projeto

```text
rcm-lords-php-store/
├── index.php            # Página inicial
├── login.php            # Login de utilizador
├── register.php         # Registo de utilizador
├── logout.php           # Logout (destrói sessão)
├── profile.php          # Área protegida do utilizador
├── shop.php             # Página da loja
├── cart.php             # Carrinho de compras
├── checkout.php         # Processo de checkout
├── admin.php            # Área administrativa
│
├── includes/
│   ├── config.php       # Configuração da BD e sessões
│   ├── header.php       # Cabeçalho comum
│   └── footer.php       # Rodapé comum
│
├── css/
│   └── styles.css       # Estilos do projeto
│
├── images/              # Imagens do site/produtos
│
├── database/
│   └── rcm_lords.sql    # Base de dados MySQL
│
└── README.md            # Documentação do projeto




