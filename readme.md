# Description

### Cash Machine
#### The Problem
Develop a solution that simulate the delivery of notes when a client does a withdraw in a cash machine.
The basic requirements are the follow:
Always deliver the lowest number of possible notes;
It’s possible to get the amount requested with available notes;
The client balance is infinite;
Amount of notes is infinite;
Available notes $ 100,00; $ 50,00; $ 20,00 e $ 10,00
Example:

```
Entry: 30.00
Result: [20.00, 10.00]

Entry: 80.00
Result: [50.00, 20.00, 10.00]

Entry: 125.00
Result: throw NoteUnavailableException

Entry: -130.00
Result: throw InvalidArgumentException

Entry: NULL
Result: [Empty Set]
```

### Config

To check that *mod_rewrite* and PHP are enabled, look at ``` /etc/apache2/httpd.conf ``` and ensure that these lines:
```
LoadModule rewrite_module libexec/apache2/mod_rewrite.so
LoadModule php5_module libexec/apache2/libphp5.so
```
are **uncommented**.
Also ensure that **AllowOverride** is set to All within the ```<Directory "/Library/WebServer/Documents">``` section.
After making these changes, restart Apache with: 
```
sudo apachectl restart
```
Then put the file to the folder, then it should work.

**NOTE:**
Get full permission to the public folder

```
chmod -R 777 public/
```

### How to Run 

In Terminal

```
composer install
```
Then in browser Url or Postman
```
http://localhost/careship/public/withdraw/200
```
