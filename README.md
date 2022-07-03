# myLPU: Health Information Management System
Since the pandemic began, school facilities have been underutilized due to the closure of most establishments. The purpose of this project is to help students, employees, and especially the clinic staff, to have the ability to utilize the school clinic in an online set-up by providing a health information management system for LPU, helping lyceans to get primary care. The project focuses on the development of a web-based system that will be accessible through a web browser on mobile devices and personal computers with internet connections. The web-based system was developed using Visual Studio code with the programming languages PHP, HTML, CSS, and JavaScript, while the database was done using MySQL, and user’s layout was done using Adobe Photoshop. The proponents used the Agile model method for the process of developing the project system. The project was tested and improved based on functionality and compatibility test cases. The ISO 25010 was used to evaluate the system. The web-based system was evaluated by one (1) admin, ten (10) end-users, and five (5) IT experts, with a total average mean of “3.82” and a standard deviation of “0.13” and was interpreted as “Highly Acceptable” With the evaluation result, it proves that the system can be a great help in utilizing the school clinic in an online set-up amidst a pandemic.

The following technologies are used for the project:
1. CodeIgniter 4 Framework
2. Bootstrap 4
3. JQuery

## Prerequisites
• XAMPP (Optional)

• PHP 8.0

## Installation

### Setup .env file
```
#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------

app.baseURL = [hostname:portnumber]

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = [database_hostname]
database.default.database = [database_name]
database.default.username = [db_username]
database.default.password = [db_password]
```

### Setup Database
1. Open phpmyadmin
2. Create database named with the value of "database.default.database" on .env file
3. Import './database/sql_script/table_setup.sql'
4. Import './database/administrato_accounts' on administrators table


