# README #

Getting started 
1. download and setup offical Kasa App(iOS or android) an account. 
2. note your email and password you used
3. Set devices to allow remote access.
4. Clone or download this GIT repo.
5. Modify userData.php
    a: change value of $userName to email you used in Kasa App.
    b: change value of $userPassword to password used in Kasa App.
6. Upload files to server.
7. Visit folder in webbrowser. (index.php which loads list_devices_with_on_off_buttons.php)

You should have a list of TP-link devices with 3 buttons
A. ON
B. OFF
C. STATUS (this one outputs the status of the device into the Logs div on the webpage.)



### What is this repository for? ###

* Using http calls to turn TP-Link Smart plugs and switches on.
* the backend auto signs in and gets new tokens when needed and talks to tp-link servers.
* Version 1.1

### How do I get set up? ###

* Summary of set up
This is a simple PHP project not using any libraries
* Configuration
in the userData.php file enter your email and password used in Kasa App: see(Getting started)
* Dependencies
Web server that supports PHP (can be run local)
* Database configuration
none
* Deployment instructions
Just upload the files to webserver

### Who do I talk to? ###

* mike@boski.com