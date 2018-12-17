Installation : 

1 - Create database using the sql script (`leboncoin.sql`) <br>
2 - install assets using `npm install` <br>
3 - install vendor using `composer install` <br>
4 - put the repository content inside a folder named `LEBONCOIN` and place it in the `WWWW` folder of wamp or create a `vhost`



TODO : <br>
1 - use of `gulp` to create tasks for the `node_modules` assets <br>
2 - create a system to manage the `Actions` responses, for example when we create a new contact show a succes message, another example when the lastName is a palindrome show an `error message`<br>
3 - manage in a better way the file paths of actions, assets in twig files <br>
4 - use an `.htaccess` file to create rewrite rules