# Rularea site-ului într-un container

# Scopul lucrării

Dupa executarea acestei lucrări, studentul va fi capabil să pregătească un container pentru a rula un site web bazat pe Apache HTTP Server + PHP (mod_php) + MariaDB.

# Sarcina

Creați un fișier Dockerfile pentru a construi o imagine a containerului care va conține un site web bazat pe Apache HTTP Server + PHP (mod_php) + MariaDB. Baza de date MariaDB trebuie să fie stocată într-un volum montat. Serverul trebuie să fie disponibil pe portul 8000.

Instalați site-ul WordPress. Verificați funcționarea site-ului.

# Executare 

Am creat un depozit de cod sursă containers04 și l-am clonat pe computer cu ajutorul comenzii git clone URL

Am creat în directorul containers04 un director files, precum și

directorul files/apache2 - pentru fișierele de configurare apache2;
directorul files/php - pentru fișierele de configurare php;
directorul files/mariadb - pentru fișierele de configurare mariadb.

![image](https://github.com/user-attachments/assets/7fd54660-cb1a-486d-b206-b8a511b0756a)

Cream în directorul containers04 fișierul Dockerfile cu următorul conținut:

FROM debian:latest

RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql mariadb-server && \
    apt-get clean

Construim o imagine a containerului cu numele apache2-php-mariadb

![image](https://github.com/user-attachments/assets/8933d630-4a38-468d-8783-7df838c73060)

Cream un container apache2-php-mariadb din imaginea apache2-php-mariadb și porniți-l în modul de fundal cu comanda bash.

![image](https://github.com/user-attachments/assets/3896f78f-2553-4dd8-8af8-db2364779c7a)

Copiați din container fișierele de configurare apache2, php, mariadb în directorul files/ de pe computer. Pentru a face acest lucru, în contextul proiectului, executați comenzile:

![image](https://github.com/user-attachments/assets/5310f98e-6808-40ce-a300-9c7eec169885)

Verificam dacă acestea există fișierele de configurare apache2, php, mariadb. Oprim și ștergeți containerul apache2-php-mariadb.

![image](https://github.com/user-attachments/assets/708be1cc-969e-423b-8208-069201dd9fcb)

![image](https://github.com/user-attachments/assets/b5a8dc23-6561-4662-b8b1-191a01257684)

![image](https://github.com/user-attachments/assets/9c5a3940-9021-4770-87ac-66eba564b81e)

![image](https://github.com/user-attachments/assets/4578383a-c779-41e7-9fc0-40de6a322216)

configuram fisierele 

000-default.conf :

![image](https://github.com/user-attachments/assets/81980e61-c569-4b82-8fe7-61e40097f20a)

![image](https://github.com/user-attachments/assets/221099c9-ffc3-4cb1-a9ff-e140b36447ed)

php.ini:

![image](https://github.com/user-attachments/assets/3c55c76c-fe78-49c2-8f0c-6e2c18990c3f)

Setam parametrii memory_limit, upload_max_filesize, post_max_size și max_execution_time astfel:

memory_limit = 128M
upload_max_filesize = 128M
post_max_size = 128M
max_execution_time = 120

In directorul files cream directorul supervisor si fisierul supervisord.conf cu urmatorul continut:

[supervisord]
nodaemon=true
logfile=/dev/null
user=root

# apache2
[program:apache2]
command=/usr/sbin/apache2ctl -D FOREGROUND
autostart=true
autorestart=true
startretries=3
stderr_logfile=/proc/self/fd/2
user=root

# mariadb
[program:mariadb]
command=/usr/sbin/mariadbd --user=mysql
autostart=true
autorestart=true
startretries=3
stderr_logfile=/proc/self/fd/2
user=mysql

![image](https://github.com/user-attachments/assets/a0a4a3a7-1f9e-4754-807a-f662d7e90da1)

crearea Dockerfile 

![image](https://github.com/user-attachments/assets/048f0cf9-8913-445c-a53b-26f20a446b89)

Cream imaginea containerului cu numele apache2-php-mariadb și pornim containerul apache2-php-mariadb din imaginea apache2-php-mariadb. Verificam dacă site-ul WordPress este disponibil la adresa http://localhost:8080/. Verificam dacă in directorul /var/www/html/ există fișierele site-ului WordPress. Verificam dacă fișierele de configurare apache2, php, mariadb sunt modificate.

![image](https://github.com/user-attachments/assets/1a5c6f97-0264-4f20-bfb9-4278c2953954)

![image](https://github.com/user-attachments/assets/7380b805-c84b-4db9-8d59-731652780cf5)

![image](https://github.com/user-attachments/assets/4af104a9-d557-48f8-be03-a185c787b810)

![image](https://github.com/user-attachments/assets/8c5064c5-90aa-4a6b-9bd2-85dbe651e19e

Verificam schimbarile in fisiere 

![image](https://github.com/user-attachments/assets/1a14263d-5faf-4e11-abb4-10c11557ea98)

![image](https://github.com/user-attachments/assets/7a410365-4654-4e68-b02a-d6e2f541cfd7)

![image](https://github.com/user-attachments/assets/b23bda77-3d2a-4bd8-94ca-3f54c4831a8a)

![image](https://github.com/user-attachments/assets/51cacbe6-8935-445d-9b58-dfc1fcabfc43)

Crearea bazelor de date și a utilizatorului pentru WordPress 

![image](https://github.com/user-attachments/assets/5b745449-39ac-4d4b-9b0f-14328f7dd604)

Deschidem în browser site-ul WordPress la adresa http://localhost:8080/ și urmam instrucțiunile pentru instalarea site-ului WordPress. 

La pasul 2, specificați următoarele date:

![image](https://github.com/user-attachments/assets/e5bd65b7-d035-4cc6-aeda-8c9f43a89d53)

Din urmatorul pas copiem conținutul fișierului wp-config.php și salvam în fișierul files/wp-config.php.

![image](https://github.com/user-attachments/assets/6fee24fc-4be1-43da-8e6a-5ef96cda5cda)


Adăugam în fișierul Dockerfile următoarea linie:

COPY files/wp-config.php /var/www/html/wordpress/wp-config.php

Recreem imaginea containerului cu numele apache2-php-mariadb și pornim containerul apache2-php-mariadb din imaginea apache2-php-mariadb. 

Verificam funcționarea site-ului WordPress.

pentru functionarea completa a WordPress este nevoie de crearea din nou a bazei de date in noul container ca si la pasul cu crearea lui 

instalam site-ul cu datele noastre 

![image](https://github.com/user-attachments/assets/869c0ad3-5cf9-4e37-8eb5-fe244616ae57)

Dupa logare:

![image](https://github.com/user-attachments/assets/6f06808f-9e16-4635-9c91-2b881fba309a)

Go to mysite :

![image](https://github.com/user-attachments/assets/c5e6ac40-1641-4a94-833c-1d1410f1abda)

Raspunsurile la intrebari:

1.În configurația data, următoarele fișiere de configurare au fost modificate pentru a permite configurarea corectă a mediului WordPress:

Apache2:

/etc/apache2/sites-available/000-default.conf: Acesta este fișierul principal pentru configurarea site-ului implicit în Apache. Modificările în acest fișier sunt necesare pentru a indica directorul corect pentru WordPress și pentru a personaliza setările Apache pentru a servi site-ul WordPress.

/etc/apache2/apache2.conf: Este fișierul principal de configurare Apache, care poate include setări globale pentru serverul web, cum ar fi securitatea, accesul la fișiere și modulele active.

PHP:

/etc/php/8.2/apache2/php.ini: Fișierul de configurare PHP care reglează diverse setări ale PHP-ului, cum ar fi limitările de dimensiune a fișierelor uploadate și comportamentele generale ale PHP-ului pe server.

MariaDB:

/etc/mysql/mariadb.conf.d/50-server.cnf: Fișierul de configurare al serverului MariaDB, care definește parametrii pentru conectivitatea și performanța bazei de date.

Supervisor:

/etc/supervisor/supervisord.conf: Fișierul de configurare pentru Supervisor, care este folosit pentru a gestiona procesele, în acest caz Apache și MariaDB.

2.Instrucția DirectoryIndex este utilizată pentru a specifica fișierele care vor fi servite ca pagină implicită atunci când se accesează un director pe serverul web.

3.Fișierul wp-config.php este un fișier esențial în instalarea WordPress, deoarece:

Configurarea bazei de date: Conține informațiile necesare pentru a conecta WordPress la baza de date. Aceste informații includ:

Numele bazei de date (DB_NAME),

Utilizatorul bazei de date (DB_USER),

Parola bazei de date (DB_PASSWORD),

Gazda bazei de date (DB_HOST).

4.Parametrul post_max_size din fișierul de configurare php.ini definește dimensiunea maximă a datelor(in cazul nostru 128MB) care pot fi trimise printr-o cerere HTTP POST.

Acesta controlează dimensiunea totală a datelor trimise într-o formulă, inclusiv fișierele uploadate și câmpurile de formular. 

5.În opinia mea, câteva dintre posibilele deficiențe ale imaginii containerului creat pot include:

Securitate: Deși supervisorul este folosit pentru a controla procesele, nu există configurări specifice pentru a proteja serverul de atacuri comune, cum ar fi vulnerabilitățile de tipul SQL injection, XSS, etc. Nu există setări suplimentare pentru protecția bazei de date sau pentru a izola mai bine aplicațiile.

Backup pentru MariaDB: Imaginea nu include opțiuni sau configurații pentru backup-ul automat al bazei de date MariaDB. Ar fi util să implementam un mecanism de backup pentru a proteja datele importante.
