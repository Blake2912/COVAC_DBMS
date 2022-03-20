Project Title - COVAC_DBMS

Setup Guide
 
The setup Instrucions are as follows

Pre requistes to run this application

1)XAMPP
2)XAMPP Control panel with MySQL configured

To install XAMPP use this link https://www.apachefriends.org/download.html

After that, Navigate to the htdocs folder inside your XAMPP directory

Then run the following command to clone the repository

git clone https://github.com/Blake2912/COVAC_DBMS.git

You can also visit this link to download the zip file and extract it to htdocs  https://github.com/Blake2912/COVAC_DBMS

After clonning the repository, then enable networking in your XAMPP Control Panel

You will also have to create the database entities and triggers for the application to function properly.

These are the commands to create Tables

1)USER -- create table USER(user_id int primary key,first_name varchar(100),last_name varchar(100),phone int,email varchar(100),password varchar(100),aadhar_number int,dob date);

2)HOSPITAL -- create table HOSPITAL(hospital_id  int primary key,hospital_name varchar(100),hospital_loc varchar(100),hospital_pin int);

3)VACCINE -- create table VACCINE(vaccine_id int primary key,vaccine_name varchar(100),dev_company varchar(100),time_for_sec_dose int);

4)VACCINATOR_DETAIL -- create table VACCINATOR_DETAIL(emp_id int primary key,first_name varchar(100),last_name varchar(100),phone_number int,password varchar(100),email varchar(100),
hospital_id int,foreign key(hospital_id) references HOSPITAL (hospital_id));

5)VACCINE_INVENTORY-- create table VACCINE_INVENTORY(vaccine_id int,hospital_id int,check_date date,doses_available int,primary_key(vaccine_id,hospital_id),foreign key(vaccine_id) references VACCINE (vaccine_id),foreign key(hospital_id) references HOSPITAL (hospital_id));

6)USER_VACCINATION_FIRST -- create table USER_VACCINATION_FIRST(user_id int primary key,dose_date date,vaccinator_id int,hospital_id int,foreign key(user_id) references USER(user_id),foreign key(vaccinator_id) references VACCINATOR_DETAIL(vaccinator_id),foreign key(hospital_id) references HOSPITAL (hospital_id));

7)USER_VACCINATION_SECOND -- create table USER_VACCINATION_SECOND(user_id int primary key,dose_date date,vaccinator_id int,hospital_id int,foreign key(user_id) references USER(user_id),foreign key(vaccinator_id) references VACCINATOR_DETAILS(vaccinator_id),foreign key(hospital_id) references HOSPITAL (hospital_id));

8)ADMIN -- create table ADMIN(admin_id int primary key,admin_name varchar(100),admin_password varchar(100));

To implement triggers run the following command in your MySQL database command line/terminal prompt

Trigger1)-- CREATE TRIGGER updateVaccineDoseFirst AFTER UPDATE ON USER_VACCINATION_FIRST FOR EACH ROW UPDATE VACCINE_INVENTORY SET doses_available=doses_available-1, check_date = CURDATE() WHERE VACCINE_INVENTORY.hospital_id IN (SELECT hospital_id FROM USER_VACCINATION_FIRST WHERE VACCINE_INVENTORY.vaccine_id IN (SELECT vaccine_id FROM USER_VACCINATION_FIRST WHERE USER_VACCINATION_FIRST.vaccinator_id IS NOT NULL));

Trigger2)-- CREATE TRIGGER updateVaccineDoseSecond AFTER UPDATE ON USER_VACCINATION_SECOND FOR EACH ROW UPDATE VACCINE_INVENTORY SET doses_available=doses_available-1, check_date = CURDATE() WHERE VACCINE_INVENTORY.hospital_id IN (SELECT hospital_id FROM USER_VACCINATION_SECOND WHERE VACCINE_INVENTORY.vaccine_id IN (SELECT vaccine_id FROM USER_VACCINATION_SECOND WHERE USER_VACCINATION_SECOND.vaccinator_id IS NOT NULL));

These commands will create the required triggers for your database.

To connect with the database you must also change the username and the password for the mysqli connect to the database for the appliction to function properly.

And Then Do the changes whererver required

After creation of Databases and Triggers your basic setup of the application is complete!

Now visit to the below mentioned website link with your favorite web browser

http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_welcome.php

If the above link doesn't work then try this link

http://localhost/COVAC/COVAC_DBMS/Pages/covac_welcome.php

After visiting the link in your browser the application is up and running locally in your system.
