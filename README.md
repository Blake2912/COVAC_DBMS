# COVAC_DBMS

<strong>The setup Instrucions are as follows</strong>

Pre requistes to run this application
 - XAMPP
 - XAMPP Control panel with MySQL configured

 To install XAMPP use this link <a href="https://www.apachefriends.org/download.html">given here</a>!

Navigate to the `htdocs` folder inside your XAMPP directory

Then run the following command to clone the repository

```
git clone https://github.com/Blake2912/COVAC_DBMS.git
```

After clonning the repository, then enable networking in your XAMPP Control Panel

Inside your control panel the networking panel should look something like this:

<center><img src="Pages/assets/network_demo_img.png" height=400px width=500px></center>

<center>This is the illustration shown how it looks in MacOS</center>

You will also have to create the database entities and triggers for the application to function properly.

To implement the Database use the schema diagram shown below

<img src="Pages/assets/schema_diagram.jpg">

To implement tirggers run the following command in your MySQL database command line/terminal prompt

```
CREATE TRIGGER updateVaccineDoseFirst AFTER UPDATE ON USER_VACCINATION_FIRST FOR EACH ROW UPDATE VACCINE_INVENTORY SET doses_available=doses_available-1, check_date = CURDATE() WHERE VACCINE_INVENTORY.hospital_id IN (SELECT hospital_id FROM USER_VACCINATION_FIRST WHERE VACCINE_INVENTORY.vaccine_id IN (SELECT vaccine_id FROM USER_VACCINATION_FIRST WHERE USER_VACCINATION_FIRST.vaccinator_id IS NOT NULL));
```

```
CREATE TRIGGER updateVaccineDoseSecond AFTER UPDATE ON USER_VACCINATION_SECOND FOR EACH ROW UPDATE VACCINE_INVENTORY SET doses_available=doses_available-1, check_date = CURDATE() WHERE VACCINE_INVENTORY.hospital_id IN (SELECT hospital_id FROM USER_VACCINATION_SECOND WHERE VACCINE_INVENTORY.vaccine_id IN (SELECT vaccine_id FROM USER_VACCINATION_SECOND WHERE USER_VACCINATION_SECOND.vaccinator_id IS NOT NULL));
```

These commands will create the required triggers for your database.

To connect with the database you must also change the username and the password for the `mysqli` connect to work. 

Do the changes whererver required

After creation of Databases and Triggers your basic setup of the application is <strong>complete</strong>!

Now visit to the below mentioned website link with your favorite web browser

```
http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_welcome.php
```

If this link doesn't work then try this link

```
http://localhost/COVAC/COVAC_DBMS/Pages/covac_welcome.php
```

After visiting the link if your browser looks like how it is shown below then congratulations the application is up and running locally in your system.

<img src="Pages/assets/welcome_page.png">

<br>
<h3>Thank you</h3>

P.S.: If any improvements required please feel free to create a issue and let us know :)