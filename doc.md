#  Interview

Below are 3 tasks we would like you to attempt.

There is *CHANGEME* time limit for the test. Please make sure that, wherever you get to on Task 3, what you have done is committed and pushed to Bitbucket at the end of the test.


## Setup

The following instructions are based off using the Ubuntu OS so you might have to adapt them depending on your environment. You will need at least: Apache, MySQL/MariaDB, PHP (5.6 or higher), Git and Composer installed on your machine.

Clone the following git repository: *CHANGEME*

Your log in details for Bitbucket:

* email: *CHANGEME*
* password: *CHANGEME*

When in the project folder, you should then checkout the develop branch, for example by running the following in terminal:

```
$ git checkout develop
```

Make sure you are in the folder you cloned the repository in terminal and run:

```
$ composer update
```

to install all vendor dependencies.

To set up the database, connect to MySQL and run the contents of the script found in /sql/database.sql. This will create the database, tables and records used in this project.

You will need to look at the file /app/settings.php and update the credentials to connect to the database on your machine. You may also need to make sure the /logs/ folder is writeable.

Once finished, if you run from terminal:

```
$ composer start
```

you should then be able to access the project by opening a web browser and navigating to http://localhost:8080.

The project used in this test is based off the Slim 3 Framework (https://www.slimframework.com/docs/), however, it probably won't be necessary to consult the documentation. The code in these tasks should largely be framework agnostic.

You are more than welcome to use the internet to help you with these tasks.


## Task 1 - Code Review

We would like you to code review the pull request at *CHANGEME*

Please comment on the pull request page (*CHANGEME*) on Bitbucket directly with any issues you see or improvements that can be made. You do not have to fix/write/push any code yourself in this task but you can offer code suggestions in your comments if you wish.

There is no specific format you need to reply in, the focus here is on clearly identifying issues/improvements.

The purpose of the code review is to:

* find any defects, errors or security flaws in the code
* improve code quality (readability, consistency, avoiding duplication etc)
* share knowledge

Whilst there might be issues in other files not in the code review, they should not be reviewed as part of this task. The only files which should be reviewed are those in the pull request:

* app/controllers/ContactsController.php
* app/models/ContactsModel.php
* app/views/contacts/edit.php
* app/views/contacts/search.php

If you have no experience with code reviews and don't know what is being required of you: imagine that this code is about to go live to the public and you are doing a check that everything is working as intended, that there are no security issues, and that the code is as optimised as it can be. If you spot anything, comment so that someone else can read it and understand what and where the issue is so they can change it.

Suggested time: 40 minutes


## Task 2 - SQL Queries

We would like you to write 3 SQL queries based on the data used in this project.

Please save your queries in the respective file in the /sql/ folder of this project. So, for example, the exact **query** needed to return the data for query number 1 should be saved in /sql/query-1.sql. We are not asking for the data outputted but the query used to get there.

The queries are:

1. id, first_name and last_name of all contacts who are active and have an "a", "e" or "i" in their last_name
2. all fields of all contacts and an additional column saying whether they have ever had a membership_renewals record with a numeric "club_id" value (ie "have they ever been a member of a club?"), sorted by first name, going in reverse alphabetical order
3. id, first_name, last_name, club_id and end_date of all contacts, with their most recent membership renewal end_date and their most recent club_id

__If using a British Triathlon issued device for the test:__
If you would like to test your queries and want to use the command line, connect to MySQL using:
```
$ mysql -u root -ptriathlon
```
MySQL Workbench has been installed if you would prefer a GUI to the command line. It can be accessed by the left hand menu.

Suggested time: 15 minutes


## Task 3 - Writing Code

Using git, create a new feature branch based off the **develop** branch (which you probably already have checked out) where all your work should be committed. It doesn't matter what you call your branch.

On the [Contacts Search page](http://localhost:8080):

1. Add the ability to filter the table to show active or inactive contacts. You should still be able to search by name at the same time.
2. Change the background of every other row in the table body to the colour "#dddddd"
3. Put rounded corners on the submit button - but only on the contacts search page, the edit contact page should be unaffected.
4. In whatever way you wish, create a button which:
	1. when clicked for the first time, will underline the text in every <td> of every male contact
	2. when clicked for the second time, will remove the underline under their email address
	3. when clicked for the third time, will remove the entire row of every male in the table so only female contacts are visible until you re-load the page
	4. when clicked any further times, does nothing
5. Commit your changes (including the SQL queries in task 2) and push your branch to Bitbucket. Once in the project folder, you should be able to push using: `$ git push origin [your-branch]` and using the same password as you used above to log in to Bitbucket
6. [Create a new pull request](*CHANGEME*) on Bitbucket, looking to merge your branch into the develop branch.
7. Include a time estimate of how long you think it will take to code review your pull request in the description. No other information is needed in the description in this instance.

Suggested time: 45 minutes

## End

Please make sure:

* your comments for Task 1 have been saved on Bitbucket so they can be viewed
* your SQL queries from Task 2 are included along with your new code for Task 3 in the pull request you have created on Bitbucket

If you have any difficulties, please ask before closing things down and losing any work.