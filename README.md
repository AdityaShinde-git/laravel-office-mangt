Project Overview
This project is a CRUD-based Office Management System built using Laravel, MySQL, and jQuery DataTables.
It includes:
    Employee management
    Self-referencing Employees 
    DataTables for searchable, paginated tables
Tech Stack
    Backend: Laravel 12
    Database: MySQL (XAMPP)
    Frontend: Blade + jQuery + DataTables
    APIs: Crud Operations,Image Handling,search
    
Table:
id
name
company and com_id
company_id
Created_at
Action:
    Edit/Delete

Features
 Employee CRUD
Add, view, update, delete employee records.
Entering salary
Enter company and ID
DataTables Integration
 
Enhanced employee table:
Searchable
Paginated

Installation & Setup
1.Clone or Create the Laravel Project
composer create-project laravel/laravel office-management

2.Environment Configuration
DB_DATABASE=Db-name
DB_USERNAME=root
DB_PASSWORD=

3.Run Migrations
php artisan migrate

4.Serve Application
php artisan serve

5.Access in Browser
http://localhost:8000/products

Front End Behavior
Employee List View
Uses DataTables for:
    Search input
    Pagination controls

Displays:
Name
    Company
    Salary
    Image
    Create/Edit Employee
    Name /other details from DB
    Validation: required fields

