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

2-26-2020: Austin made it so that all fields are mandatory except for the profile picture.  Then Austin spent way too long trying to auto insert a default picture.  Better idea is to load the default picture in the profile page if the field is empty.  But auto insertion would be better in the long run.

2-27-2020: Austin created the profile page that displays all the users information.  It pulls info straight off of the database.  Still working on displaying the image.

3-11-2020: Austin is creating a project page, but is struggling to create a flexible system.

3-19-2020: Austin has created a second database to store all projects.  new-project.php is a form page used to create new projects under the current users ownership. project.php will probably be deleted soon because I'm not sure what it's for.  Current goals are to work on aesthetic, create a dashboard, and dynamically load projects into the profile page for viewing.  

Potential issue, when creating a new profile, the current system doesn't check for username duplicates

Each user will be stored in login_info, but their data will be stored in personal tables for speed's sake.  Each user will have a table of for the list of people they're following, a table for the people who follow them, and a table for their projects.  So if the site gets big, it can be expanded to a bigger server instead of having huge tables.

Elements are now dynamically added to the projects page to show projects with the newest at the top.  This feature still needs to be added to the profile page.  New format for pages rolling out soon.  It will separate the PHP from the HTML for easier work flow and functionality.  Planning for a virtual team meeting on Saturday to make some major leaps such as beginning website design, adding full functionality to current pages, reformatting, and creating a follower/following system.


3-20-2020: Austin standardized the pages!  The PHP is now separate from the HTML for easier work flow.

The dynamic projects loading into the profile page feature is now complete.  Projects are currently loaded into the projectBar div, but each project has an individual projectBox div.

Lots of HTML and CSS styling to be done.

3-21-2020: In order to sign up you now have to choose a unique username and email.

A color scheme has been chosen, edf0f3-141b41-306bac-86898c-2d3132

3-26-2020: The Home Page has been updated to fit the intended style and color scheme.  The text has a slight shadow glow on it to help it stand out.  An alternative is to add a white box with a low opacity.  The Profile Page is currently under way.  The "create new project" button needs to be a small image instead of text for the sake of size.  Profile picture still won't display.  Other features such as projects in the project bar have been tested using HTML, but not on the actual internet.
