# laravel-codeflix

Curso de aperfeiçoamente em laravel, utilizando várias libraries para ajudar no desenvolvimento ágil.
Algumas libraries:

* Bootstrapper
* ide-helper - para autocomplete de métodos das facades
* FormBuilder
* l5-repository - para trabalhar com design patterns de interfaces
* laravel-mix
* Browser Sync
* Dbal
* laravel-user-verification - para a verificação de confirmação de usuário

Para rodar na sua maquina, clone e rode ```composer install``` e logo após ```npm install```.

Configure suas informações de banco de dados em ```.env``` na raíz do projeto.

Rode o comando ```php artisan migrate```, se quiser poplular sua base de dados rode o ```php artisan migrate --seed```.
