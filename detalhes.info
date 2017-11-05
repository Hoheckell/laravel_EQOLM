///////////////////////////////////// EXPLICAÇÂO DO SISTEMA

É simples, no link Home enviamos uma CSV separado por ponto e virugula onde constam contatos, ao enviarmos é cadastrada uma importação e
ao mesmo tempo colocamos na fila o processamento do arquivo CSV e também colocamos na fila o envio de email para comunicar o cadastro de uma nova importação
a cada contato cadastrado também é colocado na fila o envio de um email com as informações dete contato.

O observer envia o email pra comunicar a importação
O event listener envia os emails dos contatos
O mailable gerou os email enviados
O job processa o CSV cadastrando os contatos
Tudo é enfileirado na QUEUE Work

OBS.:
É preciso observar os padrões de configurações básicas de Fila,Events, Mailables e Observers do Laravel 5.5

////////////////////////////////////////////////////// DETALHES DE CONFIGURAÇÃO

após configurado o banco de dados é necessário rodar

php artisan migrate

após configurado o banco de dados é necessário rodar  

php artisan migrate
"Para registrar as taelas do projeto"

//CASO NÂO CRIE A TABELA failed_jobs
php artisan queue:failed-table
"Para registrar as falhas dos Jobs e criar a tabela e a migration"


Existe arquivos CSV de exemplo na pasta /public/files/

///// 05/11/2017

[Adicionado agendados de Tarefas (SEM SUPORTE A SISTEMAS WINDOWS)]

Adicionamos antes de tudo uma CRON no sistema
através dos comandos peculiares a cada distro de sistema unix/based

esta é a linha que é preciso adicionar a cron, claro que alterando para URL do projeto
* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1

Após isso no arquivo app/console/Kernel.php no método chamado schedule adicionamos a tarefa (vide documentação do laravel)
https://laravel.com/docs/5.5/scheduling

