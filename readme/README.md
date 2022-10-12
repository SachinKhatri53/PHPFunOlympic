Project Title:- FunOlympicPHP

System Features:

User:
 - Registration with email verification
 - Login
 - Watch live videos, videos, fixtures, news, gallery
 - like, comment, share video
 - request password reset
 - remember me and forget password options
 
 Admin:
  - Add / view / update / delete live video, video, images, news, fixtures, categories
  - activate / deactivate users
  - respond to password change request
  
  
  URL of Homepage:  http://localhost:8080/FunOlympicPHP/
  (Here '8080' refers to Apache server port, please replace it with you Apache server port)
  
  Installation Process
  
Step 1: Download the system from the given link
Step 2: Download and install XAMPP
Step 3: Unzip the system and place the folder in ‘htdocs’ of the XAMPP
Step 4: Run XAMPP and start Apache Server as well as MySQL
Step 5: Import the database file in php myadmin (database) by opening http://localhost:8080/phpmyadmin/  (replace 8080 with your port number)
Step 6: Enter the URL of home page in browser
  
  
Note:- Since, the project is tested in localhost,few changes have been made in php.ini(inside php folder) and sendmail.ini(inside sendmail folder) files to send mail.
-------------------
inside php.ini file
-------------------
SMTP = smtp.gmail.com
smtp_port=465
sendmail_from = your email address from which mail can be sent
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"

------------------------
inside sendmail.ini file
------------------------
smtp_server=smtp.gmail.com
smtp_port=465
error_logfile=error.log
debug_logfile=debug.log
auth_username= your email address from which mail can be sent
auth_password= can be obtained from google account setting
force_sender= your email address from which mail can be sent


If you face any problem while running this project please contact at sachinkhatri53@gmail.com