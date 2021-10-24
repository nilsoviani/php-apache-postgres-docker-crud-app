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
