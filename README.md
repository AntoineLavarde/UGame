## UGAME
make sure to put the project in the PATH /var/www/html/

the database is in the directory "documents"
before importing the DB create a DB called Ugame
add the line below in your crontab file:
```
* * * * * sh $(find /var/www/html -name "script.sh")
```
