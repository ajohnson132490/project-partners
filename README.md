# project-partners
Project Partners is a website designed to help people find like-minded individuals to work on projects with.


config.php: Establishes connection with mySQL server.
session.php: Begins a connection session.
logout.php: Logs the user out and takes them to the home page.
new-project.php: Form page used to create a new project.
profile.php: Displays all user info and projects.
signup.php: Form page used to create a new user account.
index.php: Landing page with log in form.


2-24-2020: PHP Login form is up and running, the mySQL Database now works.  The PHP files took forever to get functional, but all tested features work.  Session expiring feature hasn't  been tested.

2-25-2020: Added a sign up page that inserts data into the mySQL server.  It takes in first and last name, username, password, email and profile picture.  Still need to figure out how to make it mandatory because currently, all information in the form is optional.  Not a hard fix, but it's 2am.

2-26-2020: I made it so that all fields are mandatory except for the profile picture.  Then I spent way too long trying to auto insert a default picture.  Better idea is to load the default picture in the profile page if the field is empty.  But auto insertion would be better in the long run.

2-27-2020: I created the profile page that displays all the users information.  It pulls info straight off of the database.  Still working on displaying the image.

3-11-2020: I is creating a project page, but is struggling to create a flexible system.

3-19-2020: I has created a second database to store all projects.  new-project.php is a form page used to create new projects under the current users ownership. project.php will probably be deleted soon because I'm not sure what it's for.  Current goals are to work on aesthetic, create a dashboard, and dynamically load projects into the profile page for viewing.  

Potential issue, when creating a new profile, the current system doesn't check for username duplicates

Each user will be stored in login_info, but their data will be stored in personal tables for speed's sake.  Each user will have a table of for the list of people they're following, a table for the people who follow them, and a table for their projects.  So if the site gets big, it can be expanded to a bigger server instead of having huge tables.

Elements are now dynamically added to the projects page to show projects with the newest at the top.  This feature still needs to be added to the profile page.  New format for pages rolling out soon.  It will separate the PHP from the HTML for easier work flow and functionality.  Planning for a virtual team meeting on Saturday to make some major leaps such as beginning website design, adding full functionality to current pages, reformatting, and creating a follower/following system.


3-20-2020: I standardized the pages!  The PHP is now separate from the HTML for easier work flow.

The dynamic projects loading into the profile page feature is now complete.  Projects are currently loaded into the projectBar div, but each project has an individual projectBox div.

Lots of HTML and CSS styling to be done.

3-21-2020: In order to sign up you now have to choose a unique username and email.

A color scheme has been chosen, edf0f3-141b41-306bac-86898c-2d3132

3-26-2020: The Home Page has been updated to fit the intended style and color scheme.  The text has a slight shadow glow on it to help it stand out.  An alternative is to add a white box with a low opacity.  The Profile Page is currently under way.  The "create new project" button needs to be a small image instead of text for the sake of size.  Profile picture still won't display.  Other features such as projects in the project bar have been tested using HTML, but not on the actual internet.

3-27-2020: Project Page is kind of in the style.  Maddie will be consulted on colors and other things of that nature.  Added a feature to only display the most recent 6 projects, but the feature remains untested.

3-28-2020: Oddly enough the only display the most recent 6 projects feature works.  Right off the bat too.  The profile picture is still proving to be a hassle.  Database reconfiguration might be required and signup.php will have to be redone.

The menu has been updated on all pages to make the profile and create a project button float left.  Create a project is the only link that currently works.  Temp logo picture added.

Now every page has it's own style sheet to keep everything easier to access.

Features to be implemented: Messages, followers, dashboard, global dashboard, editing user information, editing project information, page to display all projects, viewing others profiles, and the search bar.

4-1-2020:1.032: I started on a search results page.  The search bar itself has yet to be made.

4-9-2020: 1.034: All README.md updates will now include what version the code is on just in case a reload from a previous version is necessary.
The search bar has been created and partially implemented.  The next step is to gather search results from login_info, and all existing projects then put that data into stylized boxes similar to the project box.

4-11-2020 1.036: The search bar now partially works.  It can locate users, but getting it to find projects is proving to be more difficult.

Passwords need to be stored in a more secure way than plain text, a hash system is more standard.

7-3-2021: Created a new branch to develop the instant messaging feature, which I believe will be the hardest part. Currently following some tutorials to learn AJAX, which is a lot of fun. Once messaging is figured out, I will revamp profiles in such a way that increases password security, allows users to friend one another, and shows your friends list. New databases will also need to be created, as I have stopped paying for the project partners domain, and cancelled my subscription for the database and hosting. I was unaware that I could develop the site locally, with a local server and database, then launch it when I'm done. How foolish. Also, IM work branch won't have any version numbers until I've gone beyone just learning how IM works, and have moved into implementation.
