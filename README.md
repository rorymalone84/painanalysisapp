<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About this app

I remade my masters project using Laravel and Vue through Inertia JS. It has 3 user roles, each is guarded.

-   [Patients] can journal their condition and medication, then view their progress through a time series chart and request a consultation from a doctor.
-   [Doctors] consult the patients after viewing the patients journal (work in progress).
-   [Admins] act as secretary, and register, edit or delete users.

### Installation

-   Download project folder
-   Place the project folder in the localhost root directory folder
-   Open the project in your IDE
-   Run 'php artisan serve' on the IDE's command line
-   Navigate to localhost:8000 on your browser
-   On your database, create a schema called painAnalysisApp
-   By default i used MYSQL for my database, if you use different, changed DB_CONNECTION within the .env file
-   Run 'php artisan migrate' to migrate the DB schema
-   Run 'php artisan db:seed' to populate the DB with demo users (re install composer and uncomment lines 56-62 on DatabaseSeeders.php if you wish to add faker data)
-   In the command line - 'nmp run dev', then 'nmp run watch' to watch and render the vue components.
-   Login as 'email: admin@demo.com / password: demoAdmin' to add yourself as a patient
-   Create a journal entry as a patient, then check out the updated Journal with chart data and journal entry CRUD functions


## ToDo

-Still have to implement the patient journal views for doctors
-More vue refactoring required for repeated code
