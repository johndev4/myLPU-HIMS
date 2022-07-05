# myLPU: Health Information Management System
**The following technologies are used for the project:**
1. CodeIgniter 4 Framework
2. Bootstrap 4
3. JQuerys

## Prerequisites
• PHP 8.0

## Deployment Guide

**Setup .env file**
```
# ENVIRONMENT
#--------------------------------------------------------------------

CI_ENVIRONMENT = [production, development]

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

**Setup Database**
1. Create a schema named with ```database.default.database``` from .env file
2. Import ```infrastructure/database/sql/init-create-tables.sql```
3. Import ```infrastructure/database/csv/administrator-account.csv``` into administrators table

### Run using XAMPP:
1. Config php.ini located in php folder and put ```extension=intl``` on it 
  
    (**NOTE:** You can just uncomment it by removing ```;``` at the beginning of it)

2. Open the XAMPP control panel
3. Start Apache and MySQL server

### Run using command-line interface:
- **Change working directory to infrastructure**
```
cd [path_of_client_side]
```
- **Run php spark serve**
```
php spark serve --port=[port_number]
```

