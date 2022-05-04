
# IVOIRJOB

## DESCRIPTION
IVOIRJOB will help entreprise to manage their recrutment process by editing and publishing job offers to candidates. IVOIRJOB can also  provide quizzes to candidate to evaluate them and then participate to online interviews to end recrutment process.
Technologies used are :
* HTML
* CSS
* JAVASCRIPT
* LARAVEL

## INSTALLATION
1. Install Composer on your computer.

2. Clone the repository

3. In command line go to the project directory and type.

```
composer update
```
4. Create a .env file, copy entirely the .env.example file and update DB_DATABASE,DB_USERNAME,DB_PASSWORD and password parameters to fit to your application 

6.  Create database **IVOIRJOB**.

6. Then run the following command to create tables.

```
php artisan migrate
```

7. Fill the database by uploading IVOIRJOB.sql  in **IVOIRJOB** database. The file is available in root directory of the project.

## USAGE
* Log yourself after filling  **userbiblio** table specifically e-mail,password and created time fields. The password must be hashed with bcrypt algorithm. Use the following link to hash the password [Bcrypt.online](https://bcrypt.online/).

## AUTHORS

* [KOUEVIDJIN MIGUEL](https://github.com/MiguelGillesIT)
