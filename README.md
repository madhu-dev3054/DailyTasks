# PHP Task Management Web Application


A secure and responsive Task Management Web Application built using PHP and MySQL.  



This project allows users to:
- Register and Login
- Manage Tasks
- Update Profile
- Upload Profile Images
- Use Secure Authentication Features

---

# Features

## Authentication System
- User Registration
- User Login
- Logout System
- Session Management

## Security Features
- Password Hashing using `password_hash()`
- Password Verification using `password_verify()`
- SQL Injection Protection using Prepared Statements
- Form Validations
- Duplicate Email Checking

## User Profile Features
- Update Profile
- Profile Image Upload
- Dynamic User Sessions

## Task Management Features
- Create Tasks
- Read Tasks
- Update Tasks
- Delete Tasks

## Frontend Features
- Responsive Design
- Clean User Interface
- Custom CSS Styling

---

# Technologies Used

## Frontend
- HTML5
- CSS3
- Basic JavaScript

## Backend
- PHP

## Database
- MySQL
- phpMyAdmin

## Tools
- XAMPP
- Git
- GitHub
- VS Code

---

# Folder Structure

```bash
todo-app/
│
├── assets/
│   ├── css/
│   ├── images/
│
├── config/
│   └── db.php
│
├── includes/
│   └── navbar.php
│
├── register.php
├── login.php
├── dashboard.php
├── profile.php
├── update_profile.php
├── logout.php
│
├── database.sql
└── README.md
```

---

# Database Table

## users Table

| Column Name         | Type        |
|--------------------|-------------|
| id                 | int         |
| username           | varchar     |
| email              | varchar     |
| password           | varchar     |
| profile_photo      | varchar     |
| email_verified     | tinyint     |
| verification_token | varchar     |

---

# Security Concepts Implemented

- Password Hashing
- Password Verification
- Prepared Statements
- Input Validation
- Session Authentication
- Duplicate Email Protection

---

# Future Improvements

- Email Verification System
- Forgot Password System
- Task Search Feature
- Dark Mode
- AJAX Based Operations
- Better UI/UX

---

# Author

Madhu Vaghela

---

# GitHub

Add your GitHub repository link here.

Example:

```bash
https://github.com/yourusername/todo-app
```

---

# Live Demo

Add your live hosted project link here after deployment.

Example:

```bash
https://yourproject.infinityfreeapp.com
```