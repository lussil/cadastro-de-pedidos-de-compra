
## Cadastro de pedido de compras

## Requisitos

Para executar o projeto você precisa do xampp com mysql e composer instalados

### Como instalar

Clone o repositório ou baixe o zip no seu localhost.

Crie um banco de dados chamado 'db_laravel_teste'.

No terminal, dentro do diretório do projeto instale as dependencia usando o comonado 'composer install'.

Ainda no terminal execute as migrates com o comando 'php artisan migrate' e as seeders com comando 'php artisan db:seed'

Em alguns casos é nescessario executar as migrates individualmente, nesses casos utilize o comando php artisan db:seed --class=UserSeeder 
faça isso para cada seeder.

--class=UserSeeder 
--class=ProdutoSeeder
--class=ClienteSeeder

Agora você pode dar um start no apache ou no terminal utilizar o comando 'php artisan serve' 

## Para acessar o sistema

E-mail : admin@admin.com.br
Senha : password

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
