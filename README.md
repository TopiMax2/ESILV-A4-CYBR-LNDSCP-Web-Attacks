# Web Attacks Demo Site
ESILV 2023-2024 - OCC2 - OnlyHacks Team

## :information_source: Introduction

Small Website made to showcase different web vulnerabilites and to help explain how to spot them and prevent these vulnerabilities on real web pages !

Vulnerabilites showcased :
- XSS (Cross-Site Scripting) basic js inclusion
- SQL Injection
- LFI
- IDOR
- CSRF
- more ?

## :wrench: Setup

Ensure you have Docker Desktop if you are on windows or that Docker is installed on your Linux machine.

Then simply go at the root of the directory and run :

```sh
docker compose build
docker compose up -d
```
Then simply go to http://localhost:80 !

## :green_book: Guide or How to reproduce the attacks

### XSS

The XSS payload for testing is given on the page, you can use this to trigger a javascript alert that outputs '1' : <img src="/" onerror = "alert(1);"

### SQL Injection

For the SQL injection you can use : ' # to stop the command and trigger a commentary
for the rest of the SQL Command. So if you input "admin' #" in the user field, the SQL will not check the password and only connect you to the user "admin".

### CSRF

For the CSRF you can use these accounts/passwords :
- alice:password123
- jack:securepass
- daniel:pass1234

To see the balance of the malicious user that steals the money, his account is :
- evil_user:evilpass

### LFI

You are presented with a field to search for files, you can access "cool.txt" which is intended but you can also open "../secret_files/passwords.txt" to find a secret file that was not intended. You can also go back all the way to the root of the host and access /etc/passwd with "../../../../../../etc/passwd".

### IDOR

You can connect as user1:user1 then if you click on the URL you will see it is presentend as urlsite/profile.php?memberid=2
If you change the memberid to 1 you can access the admin account page by using an IDOR.

## :camera: Screenshots

Homepage of the website :
![Homepage of our website](img/index.jpg)

SQLI Demo :
![SQLI Demo Login Page](img/sqli.png)
