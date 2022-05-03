<h1>CMS Project</h1>
<p>Work with Symfony 5.2</p>

<h2>Install</h2>
In order :<br/>
1 - Modify DATABASE_URL in .env<br/>
2 - Command : **php bin/console doctrine:database:create**<br/>
3 - Command : **php bin/console doctrine:schema:update --force**<br/>
4 - Command : **composer install**<br/>
5 - Command : **npm install**<br/>
6 - For create first and new admin use this for create command : **php bin/console make:command**<br/>
or use CreateAdminCommand Class in Carfit project<br/>

<h2>Start servers</h2>
1 - Command : **php bin/console server start**<br/>
2 - Command : **npm run watch**<br/>


<h2>Access</h2>
<h3>Admin</h3>
<p>/admin</p>
<h3>BO</h3>
<p>/bo/dashboard</p>
<h3>Home</h3>
<p>Home redirect in default page if Page table in database is empty.</p>