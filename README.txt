USING THE NEW MODULE TEMPLATE
-----------------------------

1. Unzip the archive and read this file  ;-)

2. Change the name of the directory to your new module name.
   This name should be a single english word, if possible, 
   all lowercase and with only a-z characters. eg widget

3. Edit all the files in this directory and change all the 
   instances of NEWMODULE to your new module name (eg widget).

4. Edit db/mysql.sql and put in the SQL database definitions 
   for your module.  The names of any table definitions you create 
   there should use the prefix 'prefix_' instead of 'mdl_' 
   (or whatever you've configured your moodle installation to use 
   as a table prefix) (optional)

5. Edit db/mysql.php and change all the instances of NEWMODULE
   to your new module name.  (optional)

6. Do the same for db/postgres7.sql and db/postgres7.php as you 
   did for db/mysql.sql and db/mysql.php (optional)

7. Create one or more language files for your module in 
   lang/LANG/NEWMODULE.php where LANG is the language or 
   languages you are creating the module for use with.  (usually
   this will be 'en') Use one of the language files for another
   module as a template for the file.

8. Visit the admin page and your module should be noticed and
   registered as a new entry in the table "modules".

Now you can start adding code to the .php and .html files in 
this directory to make it do what you want!

Note about database changes:

  Every time you update the database schema in the db directory, 
  remember to 
  
    - edit version.php with a higher version number
    - edit db/mysql.php with an execute_sql() call that 
      upgrades the databases to the new format (see core 
      modules for examples)
  
  and then visit the admin page to actually upgrade your databases.


If you have problems, questions, suggestions etc then visit 
the "Activity modules" developers forum in the online 
course called "Using Moodle" at http:/* moodle.org */

Or email me:  martin@moodle.com

Cheers!
Martin Dougiamas
