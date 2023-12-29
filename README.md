# **EFFICIENT THREE-TIER APPLICATION DEPLOYMENT ON AWS WITH EC2 AND RDS**

## **PROBLEM STATEMENT:**
The current infrastructure faces challenges handling increased user traffic, impacting overall performance. Deploying a three-tier architecture on AWS is essential for optimizing scalability, reliability, and resource utilization. The objective is to enhance the user experience by leveraging EC2 for presentation, Apache server for application logic, and MySQL RDS for database storage.

## **USE CASE - SCENARIO:**
The web application experiences fluctuations in user traffic, leading to performance degradation. The deployment of a three-tier architecture on AWS involves utilizing Amazon EC2 instances for the presentation layer, an Apache server for application logic, and MySQL RDS for efficient and secure database storage. This approach ensures scalability and effective data management tailored to the specific technology stack without incorporating S3 or Lambda.

## **TASKS TO BE PERFORMED:**
1. Create a MySQL database on Amazon RDS:
   - Database Name: php
   - Database Password: phpapplication123
   - Table: data
   - Execute table.sql to create the necessary table structure.

2. Connect to the EC2 instance and deploy the application with Apache.
3. Verify the application output to ensure proper functionality.

---


## **SOLUTION:**
### **PRE-REQUIREMENTS:**
- Cloud           : **AWS**
- Server          : **EC2**
- Database        : **RDS MySQL**

**GitHub repository:** [https://github.com/Ravivarman16/php-application.git](https://github.com/Ravivarman16/php-application.git)

---


### **STEPS TO IMPLEMENT:**

**STEP:1 - CREATING AN AWS MYSQL DATABASE AND CREATING A TABLE:**

- **Database Name:** php
  
- **Database Password:** phpapplication123
- **Table Name:** data

- After creating a database, connect it with the command either on EC2 instance or on MySQL Workbench:
    ```bash
    mysql -u admin -p <databasename> -h <database endpoint>
    ```

- After connecting to the database, execute the SQL query named table.sql which is provided in the above repository.

---

**STEP:2 - CREATING AN EC2 INSTANCE AND INSTALLING REQUIRED PACKAGES & SOFTWARES:**

- After launching an instance, connect it with **Instance Connect.**

- Clone the GitHub repository:
    ```bash
    git clone https://github.com/Ravivarman16/php-application.git 
    cd php-application
    ```

- Execute the `package.sh` script by changing its file permission.
    ```bash
    chmod +x package.sh
    ./package.sh
    ```

- Check the versions of the following packages using the command:
    ```bash
    apache --version
    mysql --version
    php --version
    ```

**Note:** Ensure security groups are configured accordingly for database connection.

---
