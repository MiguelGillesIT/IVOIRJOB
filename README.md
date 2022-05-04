
# IVOIRJOB

## DESCRIPTION
IVOIRJOB will help entreprise to manage their recrutment process by editing and publishing job offers to candidates. IVOIRJOB can also  provide quizzes to candidate to evaluate them and then participate to online interviews to end recrutment process.
Technologies used are :
* HTML
* CSS
* JAVASCRIPT
* LARAVEL

## INSTALLATION
1. Install Composer on your computer by following this [link](https://getcomposer.org/download/).

2. Clone the repository.
```
git clone  https://github.com/MiguelGillesIT/IVOIRJOB.git
```

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

### For first login in admin space:
* Go on /Admin/Login URL and type fakeAdmin@gmail.com and fakeAdminPassword as credentials to log yourself.
* Create a new admin account.
* Disconnect yourself.
* Log yourself with your new account.
* Delete the previous one for security purposes.

You're now ready to fully use IVOIRJOB. I hope you will have fun while using it 👍.

## AUTHORS

* [KOUEVIDJIN MIGUEL](https://github.com/MiguelGillesIT)
If you find any errors you can contact me. I'm open to any suggestions. 😉
