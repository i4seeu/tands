# tands
This is a web application for a transport and requisition
How to set up on Linux

    Open the terminal, and navigate to the directory where you want to set up the application.

    Clone the application by running:
    git clone https://github.com/i4seeu/tands.git

    Get into the root directory of the cloned up by running the following command:
    cd tands

    Update composer by running:
    composer update

    Set application key by running:
    php artisan key:generate

    Log in into your local DBMS and create a database for the application, say "tands".

    In the root directory of the application, open the ".env" and update the following:
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret

    Get into the root directory and run the following:
    php artisan migrate

    Run the app:
    php artisan serve
