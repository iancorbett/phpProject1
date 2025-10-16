#  PHP Project #1  
**PHP CSV Form + Viewer**

This mini-app was built for a technical project.  
It demonstrates clean procedural PHP, form handling, validation, and CSV data management — no frameworks required.

---

<img width="494" height="338" alt="Screenshot 2025-10-16 at 4 20 51 PM" src="https://github.com/user-attachments/assets/4bf07190-1b4e-4ad4-9b73-a906f6b2abfc" />

##  Overview
The project contains **two pages**:

1. **`project1_form.php`** – collects user input and appends it to a CSV file  
2. **`project1_view.php`** – reads, sorts, and displays all CSV records in a table  

All data is stored locally in `form_submissions1.csv`, which acts as a lightweight database.

---

##  Features
- HTML form with validation (first / last name, address, email, ZIP, appraised value, etc.)
- Custom PHP validation rules (`filter_var`, regex, numeric checks)
- Automatic CSV creation if file doesn’t exist
- CSV append mode for new submissions
- Case-insensitive multi-column sorting (City → Last Name)
- Running total of all *Appraised Values*
- Clean separation of form logic vs. display logic
- No dependencies or frameworks — **100 % raw PHP**

---

##  How to Run
1. Make sure PHP 8+ is installed.  
2. From the project directory, start the built-in PHP server:
   
   php -S localhost:3000
In your browser go to
 http://localhost:3000/project1_form.php

Fill out the form and submit.

Click “View CSV” to see your saved entries.


