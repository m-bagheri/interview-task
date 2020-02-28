# Interview Task

This is an API built on Lumen Framework and compatible with PHP 7.2+

The API will have the functionality to calculate:
	
	number of days between 2 given datetimes
	number of weekdays between 2 given datetimes
	number of weeks between 2 given datetimes

It will accept different datetime format which are listed here:

	Y-m-d
    Y-m-d H:i:s
    Y-m-d H:i:s O
    Y-m-d H:i:sO
    Y-m-d H:i:s P
    Y-m-d H:i:sP
    Y-m-d H:i:s T
    Y-m-d H:i:sT
    Y-m-d H:i
    Y-m-d H:i O
    Y-m-d H:iO
    Y-m-d H:i P
    Y-m-d H:iP
    Y-m-d H:i T
    Y-m-d H:iT
    Y-m-d H
    Y-m-d H O
    Y-m-d HO
    Y-m-d H P
    Y-m-d HP
    Y-m-d H T
    Y-m-d HT
    d-m-Y
    d-m-Y H:i:s
    d-m-Y H:i:s O
    d-m-Y H:i:sO
    d-m-Y H:i:s P
    d-m-Y H:i:sP
    d-m-Y H:i:s T
    d-m-Y H:i:sT
    d-m-Y H:i
    d-m-Y H:i O
    d-m-Y H:iO
    d-m-Y H:i P
    d-m-Y H:iP
    d-m-Y H:i T
    d-m-Y H:iT
    d-m-Y H
    d-m-Y H O
    d-m-Y HO
    d-m-Y H P
    d-m-Y HP
    d-m-Y H T
    d-m-Y HT


# Requirements

PHP >= 7.2
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension

# How to use?

After cloning the repository to your LAMP local device you simply need to cd to the cloned path (like cd /var/www/vhosts/interview-task) and run the following command through command line:

php -S localhost:8000 -t public

keep this command running while you are using the API and on your browser head to localhost:8000

That page will take you to the guide of how to use the API.

On another command line tab you could cd to the cloned path (like cd /var/www/vhosts/interview-task) and run the following command for the phpunit tests:

phpunit



I hope you enjoy.