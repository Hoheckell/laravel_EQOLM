///////////////////////////////////// EXPLICAÇÂO DO SISTEMA

É simples, na Rota Home enviamos uma CSV separado por ponto e virugula onde constam contatos, ao enviarmos é cadastrada uma importação e
ao mesmo tempo colocamos na fila o processamento do arquivo CSV e também colocamos na fila o envio de email para comunicar o cadastro de uma nova importação.
A cada contato cadastrado também é colocado na fila o envio de um email com as informações dete contato.

O observer envia o email pra comunicar a importação.<br>
O event listener envia os emails dos contatos.<br>
O mailable gerencia os email enviados.<br>
O job processa o CSV cadastrando os contatos.<br>
Tudo é enfileirado na QUEUE Work<br>
<p>
<strong>OBS.:</strong>
É preciso observar os padrões de configurações básicas de Fila,Events, Mailables e Observers do Laravel 5.5
</p>
////////////////////////////////////////////////////// DETALHES DE CONFIGURAÇÃO
<p>
após configurado o banco de dados é necessário rodar

<code>php artisan migrate</code>
</p>
<p>
após configurado o banco de dados é necessário rodar  

<code>php artisan migrate</code><br>
<em>"Para registrar as tabelas do projeto"</em>
<p>
<em><strong>//CASO NÂO CRIE A TABELA failed_jobs</strong></em><br>
<code>php artisan queue:failed-table</code><br>
<em>"Para registrar as falhas dos Jobs e criar a tabela e a migration"</em>
</p>

<em>Existe arquivos CSV de exemplo na pasta /public/files/</em>

///// 05/11/2017

[Adicionado agendador de Tarefas (SEM SUPORTE A SISTEMAS WINDOWS)]
<br>
<p>
Adicionamos antes de tudo uma CRON no sistema através dos comandos peculiares a cada distro de sistema unix/based<br>

<em>esta é a linha que é preciso adicionar a cron, claro que alterando para URL do projeto</em><br>
<code>* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1</code><br>
</p>
<br>
<p>
Após isso no arquivo app/console/Kernel.php no método chamado schedule adicionamos a tarefa (vide documentação do laravel)
https://laravel.com/docs/5.5/scheduling
</p>
<br>
<p>
<em>
O Agendador neste projeto esta sendo usado para fins educativos, coloquei apenas pra rodar um seeder.<br>
<em>
se por acaso exibir a mensagem de que a classe do seeder não foi encontrada execute:</em><br>
<code>composer dump-autoload</code><br>
</em>
</p>
  ///////////07/11/2017
  
  [Adicionada funcionalidade de Notifications]
  <br>
<p>
  Ao completar a importação é gerada uma Database notification enviada do Job
  </p>
