# basic-blog-posts
A basic blog that allow a user to manage a posts, using PHP.
# Synopsis:
The blog display all the posts for all users registered. Once logged, he cans add new post, edit an existing one or delete a post created by himself. Only users that are logged-in can edit and post. Anonymous users can view the posts. Each post contains a title, a description that including a HTML data and a timestamp indicating the date/time of each post created.
# Pre-requisites
- Apache Server, online host or local (XAMPP / WAMP / MAMP / LAMP)
- PHP Version 5.2.X or greater
- MySQL Database Driver
- URL Rewrite mode must be enabled.
- 
# Details of Process
The user must be logged in order to manage a posts. He cans view any view as an anonymous user if it's not logged.
The anonymous user cans registered for a new account or login with an existing one. Each post must have a unique title, not duplicated. A dialog confirmation is enabled when the user try to delete a post, so he cans confirm or cancel the operation. Each page has a specific link to access the related template. The user cans logout any time during the process of the blog. 

**Anonymous user:** 
- View any post
**Registered user :** 
- View any post
- Create a new post
- Update an existing post
- Delete a post that created by himself
*** URL Pages function:***
- http://example.com/ -> display list of all blog posts, this is the home page.
- http://example.com/post/1 -> display blog post with id "1".
- http://example.com/post/1/edit -> display form to allow editing of a blog post.
- http://example.com/post/create -> display form to create post.
- http://example.com/login -> display login form.
- http://example.com/logout -> log user out and redirect to home page.

#Installation
Download the source package as a zip format, extract the web files and put all into the server root, change the configuration of the database (host credentials and database name) from the configuration script (application/callback/connect.php), use the sql file included (basicblog.sql) to create the database using MySQL command tools or phpmyadmin interface  and set the server root to be pointed to the app main page (application/).
The Medoo Library is used for this project, to handle the queries and access to the database. 
Documentation is here  (http://medoo.in/doc).

#Copyright
Copyright (c) 2010 - 2015 Mouhamad Ounayssi.<br>
Blog: https://www.mouhamadounayssi.wordpress.com.

