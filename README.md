# Web Attacks Demo Site
ESILV 2023-2024 - OCC2 - OnlyHacks Team

## Introduction

Small Website made to showcase different web vulnerabilites and to help explain how to spot them and prevent these vulnerabilities on real web pages !

Vulnerabilites showcased :
- XSS (Cross-Site Scripting) basic js inclusion
- SQL Injection

## Setup & Requirements

### MySQL Server
Ensure you have a mysql server running locally (defaut port is 3306) with a schema (sqli_data) and a table users (with columns username and password)

### XAMPP
Use XAMPP (or setup the Apache server yourself) and install it with PHP preinstalled.

Drag the website files into htdocs (usually found in C:/XAMPP/htdocs (unless changed))
and change httpd conf to point towards the directory of the website

### How to use
Then connect to localhost:80 to access the page
