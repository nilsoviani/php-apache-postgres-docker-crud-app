# php-apache-postgres-docker-crud-app

This is a simple users crud app made with php, apache, postgres and docker.
No PHP, Js and CSS frameworks used.

## Steps to run this project on local enviroment

1. Pull this repository to desired directory.

2. Create an *.env* file at root repo dir, like this:

    ```
    DB_USER=user
    DB_PASS=root
    DB_HOST=postgres
    DB_PORT=5432
    DB_NAME=db
    ```

3. Open terminal in project dir and run this command:

    `docker-compose up -d`

4. At the end of the previous process, go to:
  * http://127.0.0.1:8080/migration.php <-- **This route fires initial migration**

5. Go to login:
  * http://127.0.0.1:8080
	
	**Login with:**
	* email: super@user.com
	* password: admin

## Steps to deploy this project on heroku

1. Fork this repo into your github account.
2. Create heroku account if you don't have it. https://signup.heroku.com/.
3. Login in heroku. https://id.heroku.com/login
4. Create new app.
5. Go to Deploy section.
6. Sincronize your github account if you don't have done it.
7. Look for forked repo in search input.
8. Connect it.
9. Go to Resources section and install Heroku Postgres add-on.
10. Go back to Deploy section and deploy master branch.
11. Post deploy press (View app).
12. Now login would be shown.
13. Go to your_app/migration.php
14. Go back and login with the default credentials mentioned above.
