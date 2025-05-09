# CodeDash - Teste Técnico

Olá, meu nome é Daniel Victor Nunes e sou desenvolvedor back-end PHP há 4 anos. Este projeto tem como objetivo a implementação de uma **REST API** para utilizar dados do projeto **Open Food Facts**. A API foi projetada para dar suporte à equipe de nutricionistas da empresa **Fitness Foods LC**, permitindo que eles revisem rapidamente as informações nutricionais dos alimentos que os usuários publicam por meio da aplicação móvel.

Este projeto faz parte do teste técnico da **CodeDash**, onde foi exigido o uso de **Laravel/PHP** para a construção da aplicação.

---

## Linguagem e Ferramentas

A linguagem utilizada neste projeto é **PHP**, com o framework **Laravel**. Para o banco de dados, escolhi o **MySQL**, pois é a tecnologia com a qual tenho mais experiência. Utilizei o **Postman** para realizar os testes das rotas, e as coleções geradas foram armazenadas dentro do projeto no diretório `laravel/collections`.

Além disso, para facilitar o **deploy**, criei um arquivo **Dockerfile**, que contém toda a configuração necessária para executar a aplicação em um ambiente Docker.

---

## Estrutura do Projeto

A estrutura do projeto segue o padrão básico do **Laravel**, e os arquivos estão organizados da seguinte forma:

* **Rotas**: Localizadas no arquivo `laravel/routes/api.php`.
* **Controllers**: Encontrados em `laravel/app/Http/Controllers`, sendo o arquivo principal o `ProductController.php`.
* **Modelos**: Localizados em `laravel/app/Models`, com o arquivo `ProductModel.php` responsável pela gestão da tabela `products`, e o arquivo `ImportHistory.php`, que gerencia a tabela `import_histories`, responsável por armazenar os logs das importações do CRON.
* **CRON**: O cronjob é configurado no arquivo `laravel/app/Console/Commands/ImportOpenFood.php`. Ele é executado diariamente, às 23:00 (horário do servidor), conforme configurado no arquivo `Kernel.php`, localizado em `laravel/app/Console`. O cronjob limita a importação a no máximo 100 registros por vez e atualiza ou insere dados na tabela `products`.

---

## Funcionamento do Cronjob

O cronjob é responsável por realizar a atualização diária dos dados provenientes do **Open Food Facts**. Ele roda sempre no final do dia, com a configuração para ser executado às 23:00 (horário do servidor), e se encarrega de:

* **Importar até 100 produtos por vez** para garantir que a operação seja eficiente.
* **Atualizar ou inserir dados** na tabela `products`, mantendo o banco de dados sincronizado com a fonte de dados.
* **Registrar logs** das importações, utilizando a tabela `import_histories`, para controlar as importações realizadas.

---

## Conclusão

Este projeto não só foi um desafio técnico muito válido, como também demonstrou uma aplicação real de conceitos importantes, como **arquitetura limpa**, **criação e gestão de bancos de dados**, **uso de CronJobs** e a preparação para rodar a aplicação em servidores.

Sou muito grato pela oportunidade de desenvolver este projeto, e com certeza continuarei melhorando o código e aplicando novos conhecimentos sempre que possível.

---

## Contato

* **E-mail**: [danielvictor1408@gmail.com](mailto:danielvictor1408@gmail.com)
* **GitHub**: [https://github.com/danielvictoorr](https://github.com/danielvictoorr)
* **Telefone**: (38) 99126-4373

---


