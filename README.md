Installation
============

Unix Based
----------
Navigate into the directory of your choice and use the git clone command with the read only http address.

I put mine in a utilities directory so I use the following commands in sequence.

`cd /var/www/utilities/`

`git clone git://github.com/kcalmes/Drupal-Site-Clone.git`

`mv Drupal-Site-Clone/ drupal_site_clone/`

Note: The biggest benefit of installing it with git is that you can execute `git pull` to update the script from the repo.

The script must be configured before using

//MYSQL_USER is of course the mysql username that will be used for backups.  Should be read only for security.    
define("MYSQL_USER", "user");    
//MYSQL_PASSWORD is the password that goes with the username from above.    
define("MYSQL_PASSWORD", "*******");    
//MYSQL_HOST is the host of the database.  For the most part this will be localhost.    
define("MYSQL_HOST", "localhost");    
//MYSQL_DB_ is the database where the drupal tables are located.    
define("MYSQL_DB", "drupal");    

Windows Based
-------------
Download the zip of the content from [the project home page](https://github.com/kcalmes/Drupal-Site-Clone).

Unzip and place in the directory of your choice.

Usage
=====
Unix Based
----------
Whenever you need to use this script just call it from the command line with the following command:

`cd /var/www/utilities/drupal_site_clone/`

`php clone_tables.php current_prefix new_prefix remove_old_tables_after_copy_bool`

Example:

`php clone_tables.php current_ new_ true`

Windows Based
-------------
Support is not available for windows.

Security Concerns
=================

Known Issues
============

To Do
=====
