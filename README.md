# example
How to init Server on Local
1. Install php by HomeBrew or yum..
 - brew install php

2. Install Xampp on MacOS. (Go to https://www.apachefriends.org/, then download correct package)

3. Open Xampp then starting mysql,apache.
 
4. Open project folder and run those command:
 - php artisan migrate --seed ( Before this command, plesae check information in file .env about DB connection then create a new database as you like, then change the detail in .env file)
 - php artisan serve ( This command will run server on localhost port 8000) or php artisan serve --port=<PORT NUMBER> if you want to change.

 
 ENV_URI=127.0.0.1:<PORT NUMER> (default 8000)
 
