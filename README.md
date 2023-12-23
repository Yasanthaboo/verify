# Development configuration

- Clone/download the zip file from github
- Change the mysql connection in function.php file

`
function database_run($query, $vars = array())
{
	$string = "mysql:host=localhost;dbname=databasename";
	$con = new PDO($string, 'username', 'password');
}

`

## Adding new pages

- create relevant php file
- default layout is in the header/footer php files just need to include then in the page.

## Email configuration

- create application login to your gmail account with 2A authentication.
- use application login id and password to configure mail server in mail.php

`
$mail->Host = smtp.gmail.com;           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = xxxxxxxxxxxxxxx@gmail.com;       // SMTP username 
$mail->Password = xxxxxxxxxxxxx; // SMTP password
$mail->SMTPSecure = ssl;                  // Enable TLS encryption,ssl also accepted
$mail->Port = 465; // TCP port to connect to
$mail->setFrom(orgemail@gmail.com, organization name,0); 
$mail->addReplyTo(organization@gmail.com, organization name);`

## Deployment to server

- If your using xampp server copy files to the htdocs folder / if cpanel copy files into root folder.
- Create a new database and execute the database scripts(database.sql).
- Update the database connection.
- Update page links on the database and header.php to support new domain
