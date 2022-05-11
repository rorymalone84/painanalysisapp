<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About this app

I remade my masters project using Laravel and Vue through Inertia JS. It has 3 user roles.

-   [Patients] can journal their condition and medication, then view their progress through a time series chart.
-   [Doctors] consult the patients after viewing the patients journal (work in progress).
-   [Admins] act as secretary, and register, edit or delete users.

### Installation

-   Download project folder
-   Place the project folder in the localhost root directory folder
-   Open the project in your IDE
-   Run 'php artisan serve' on the IDE's command line
-   Navigate to localhost:8000 on your browser
-   On your database, create a scheme called painAnalysisApp
-   By default i used MYSQL for my database, if you use different, changed DB_CONNECTION within the .env file
-   Run 'php artisan migrate' to migrate the DB schema
-   Run 'php artisan db:seed' to populate the DB with users and journal posts from the users via the factories
-   Login as 'email: admin@demo.com / password: demoAdmin' to add yourself as a patient
-   Or Alternatively, Login as 'email: patient@demo.com / password: demoPatient' if you dont wish to add yourself, but wish to demo as a patient.
-   Create a journal entry as a patient, then check out the updated Journal with chart data and journal entry CRUD functions

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## ToDo

I plan on adding some kind of doctor consultancy or appointment system
