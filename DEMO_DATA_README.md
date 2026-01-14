# Demo Data for Academy LMS

This document explains how to import the complete demo data into your Academy LMS database.

## Files

- `demo_data.sql` - Complete SQL file with demo data for all tables

## What's Included

The demo data includes:

### Users
- **1 Admin user** (existing)
- **5 Instructor users** with complete profiles
- **5 Student users** for testing enrollments

**Default Password for all demo users:** `1234`

### Courses & Content
- **6 Complete courses** across different categories
- **10 Course sections** organized by topics
- **10 Lessons** with video content
- **Categories and subcategories** for course organization

### Enrollments & Payments
- **10 Course enrollments** for various students
- **10 Payment records** with different payment methods
- **8 Course ratings and reviews**

### Blog System
- **4 Blog categories**
- **5 Blog posts** with content
- **5 Blog comments**

### Additional Features
- **5 Discount coupons** with various discount percentages
- **3 Instructor applications** (pending and approved)
- **4 Gamification badges**
- **4 Contact messages** (read/unread status)
- **5 Newsletter subscribers**
- **3 Newsletter campaigns**
- **5 System notifications**
- **3 Private message threads** with messages
- **4 Quiz questions** with answers
- **2 Quiz results** from completed quizzes
- **5 Resource files** attached to lessons
- **10 Tags** for courses
- **4 Course comments**
- **4 Watch history records** showing student progress
- **7 Watched duration records** tracking lesson viewing
- **5 Instructor followings**
- **5 Payout records** for instructors
- **2 Custom pages**
- **2 BigBlueButton meeting records**

## How to Import

### Method 1: Using phpMyAdmin

1. Open phpMyAdmin
2. Select your database (usually `lms`)
3. Click on the "Import" tab
4. Choose the `demo_data.sql` file
5. Click "Go" to import

### Method 2: Using MySQL Command Line

```bash
mysql -u your_username -p your_database_name < demo_data.sql
```

### Method 3: Using the Data Center (Recommended)

1. Log in as admin to your Academy LMS
2. Navigate to **Admin → Data Center**
3. Create a backup of your current data (optional but recommended)
4. Extract the `demo_data.sql` file to a zip file
5. Upload the zip file through the Data Center import feature
6. The system will automatically import the data

### Method 4: Direct SQL Execution

1. Connect to your database
2. Open the `demo_data.sql` file
3. Copy and paste the SQL statements
4. Execute them in your database client

## Important Notes

⚠️ **Warning:** Importing this demo data will add new records to your database. It will NOT delete existing data, but it may cause ID conflicts if you already have data in your tables.

### To Avoid Conflicts:

If you want a clean import, you can:

1. **Backup your current database first**
2. **Truncate tables** before importing (optional):
   ```sql
   TRUNCATE TABLE users;
   TRUNCATE TABLE course;
   TRUNCATE TABLE enrol;
   -- ... etc for other tables
   ```
3. **Or reset AUTO_INCREMENT** values after import

### Demo User Credentials

All demo users have the password: **1234**

**Instructors:**
- john.smith@example.com
- sarah.johnson@example.com
- michael.brown@example.com
- emily.davis@example.com
- david.wilson@example.com

**Students:**
- student1@example.com
- student2@example.com
- student3@example.com
- student4@example.com
- student5@example.com

## Data Relationships

The demo data is structured with proper relationships:

- Courses are linked to categories and instructors
- Sections belong to courses
- Lessons belong to sections and courses
- Enrollments link students to courses
- Payments are linked to users and courses
- Ratings are linked to users and courses
- Blog posts are linked to categories and authors
- Messages link users in conversation threads
- Quiz questions belong to quizzes (lessons)
- Watch histories track student progress

## Customization

You can modify the `demo_data.sql` file to:
- Change user emails and passwords
- Adjust course prices
- Modify dates and timestamps
- Add more or fewer records
- Change content descriptions

## Troubleshooting

### Issue: Foreign Key Constraints
If you encounter foreign key errors, import tables in this order:
1. Users
2. Categories
3. Courses
4. Sections
5. Lessons
6. Enrollments
7. Payments
8. Other dependent tables

### Issue: Duplicate Key Errors
If you get duplicate key errors, the data already exists. Either:
- Delete existing records first
- Or modify the IDs in the SQL file

### Issue: Timestamp Errors
If timestamps cause issues, you can use:
```sql
SET time_zone = "+00:00";
```
Before importing.

## Support

For issues or questions about the demo data, please refer to the Academy LMS documentation or contact support.

---

**Last Updated:** January 2024
**Version:** 1.0
