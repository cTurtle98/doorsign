## v2 in developement!
[doorpy](https://github.com/cTurtle98/doorpy)
using python flask and dictionaries instead of php and mysql like this one uses
doorpy will be significantly more portable than this version

# doorsign

The code for a Raspbery pi connected to an old laptop monitor mounted to my door, 
hense the name door sign

## Setup

after you install a raspberry pi with raspian you need to install some packages to make it work
to install the programs run this command

$`sudo apt-get install apache2 php5 mysql phpmyadmin`

then you will need to download the files from this repo

$`git clone https://github.com/cTurtle98/doorsign.git`

copy the files from the website folder into the html folder for apache

$`sudo cp ./dorsign/Website/* /var/www/html`

