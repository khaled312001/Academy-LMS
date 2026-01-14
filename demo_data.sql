-- ============================================
-- Academy LMS - Complete Demo Data
-- ============================================
-- This file contains comprehensive demo data for all tables
-- Run this SQL file to populate your database with demo data
-- ============================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- ============================================
-- USERS (Admins, Instructors, Students)
-- ============================================
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `password`, `skills`, `social_links`, `biography`, `role_id`, `date_added`, `last_modified`, `wishlist`, `title`, `payment_keys`, `verification_code`, `status`, `is_instructor`, `image`, `temp`, `sessions`) VALUES
(2, 'John', 'Smith', 'john.smith@example.com', '+1-555-0101', '123 Main St, New York, NY', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '["Web Development", "JavaScript", "React"]', '{"facebook":"https://facebook.com/johnsmith","twitter":"https://twitter.com/johnsmith","linkedin":"https://linkedin.com/in/johnsmith"}', 'Experienced web developer with 10+ years of experience in modern web technologies.', 2, UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15'), '[]', 'Senior Web Developer', '', NULL, 1, 1, 'instructor_2.jpg', NULL, ''),
(3, 'Sarah', 'Johnson', 'sarah.johnson@example.com', '+1-555-0102', '456 Oak Ave, Los Angeles, CA', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '["Data Science", "Python", "Machine Learning"]', '{"facebook":"https://facebook.com/sarahjohnson","twitter":"https://twitter.com/sarahjohnson","linkedin":"https://linkedin.com/in/sarahjohnson"}', 'Data scientist and AI researcher specializing in machine learning and deep learning.', 2, UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16'), '[]', 'Data Science Expert', '', NULL, 1, 1, 'instructor_3.jpg', NULL, ''),
(4, 'Michael', 'Brown', 'michael.brown@example.com', '+1-555-0103', '789 Pine Rd, Chicago, IL', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '["Graphic Design", "UI/UX", "Adobe Creative Suite"]', '{"facebook":"https://facebook.com/michaelbrown","twitter":"https://twitter.com/michaelbrown","linkedin":"https://linkedin.com/in/michaelbrown"}', 'Creative designer with expertise in UI/UX design and brand identity.', 2, UNIX_TIMESTAMP('2024-01-17'), UNIX_TIMESTAMP('2024-01-17'), '[]', 'Creative Director', '', NULL, 1, 1, 'instructor_4.jpg', NULL, ''),
(5, 'Emily', 'Davis', 'emily.davis@example.com', '+1-555-0104', '321 Elm St, Houston, TX', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '["Photography", "Video Editing", "Adobe Premiere"]', '{"facebook":"https://facebook.com/emilydavis","twitter":"https://twitter.com/emilydavis","linkedin":"https://linkedin.com/in/emilydavis"}', 'Professional photographer and videographer with a passion for storytelling.', 2, UNIX_TIMESTAMP('2024-01-18'), UNIX_TIMESTAMP('2024-01-18'), '[]', 'Professional Photographer', '', NULL, 1, 1, 'instructor_5.jpg', NULL, ''),
(6, 'David', 'Wilson', 'david.wilson@example.com', '+1-555-0105', '654 Maple Dr, Phoenix, AZ', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '["Marketing", "SEO", "Content Strategy"]', '{"facebook":"https://facebook.com/davidwilson","twitter":"https://twitter.com/davidwilson","linkedin":"https://linkedin.com/in/davidwilson"}', 'Digital marketing expert helping businesses grow their online presence.', 2, UNIX_TIMESTAMP('2024-01-19'), UNIX_TIMESTAMP('2024-01-19'), '[]', 'Digital Marketing Specialist', '', NULL, 1, 1, 'instructor_6.jpg', NULL, ''),
(7, 'Student', 'One', 'student1@example.com', '+1-555-0201', '100 Student Ave, Boston, MA', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '[]', '{"facebook":"","twitter":"","linkedin":""}', NULL, 2, UNIX_TIMESTAMP('2024-01-20'), UNIX_TIMESTAMP('2024-01-20'), '[]', NULL, '', NULL, 1, 0, 'student_7.jpg', NULL, ''),
(8, 'Student', 'Two', 'student2@example.com', '+1-555-0202', '200 Learner St, Seattle, WA', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '[]', '{"facebook":"","twitter":"","linkedin":""}', NULL, 2, UNIX_TIMESTAMP('2024-01-21'), UNIX_TIMESTAMP('2024-01-21'), '[]', NULL, '', NULL, 1, 0, 'student_8.jpg', NULL, ''),
(9, 'Student', 'Three', 'student3@example.com', '+1-555-0203', '300 Study Blvd, Miami, FL', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '[]', '{"facebook":"","twitter":"","linkedin":""}', NULL, 2, UNIX_TIMESTAMP('2024-01-22'), UNIX_TIMESTAMP('2024-01-22'), '[]', NULL, '', NULL, 1, 0, 'student_9.jpg', NULL, ''),
(10, 'Student', 'Four', 'student4@example.com', '+1-555-0204', '400 Education Way, Denver, CO', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '[]', '{"facebook":"","twitter":"","linkedin":""}', NULL, 2, UNIX_TIMESTAMP('2024-01-23'), UNIX_TIMESTAMP('2024-01-23'), '[]', NULL, '', NULL, 1, 0, 'student_10.jpg', NULL, ''),
(11, 'Student', 'Five', 'student5@example.com', '+1-555-0205', '500 Knowledge Ln, Austin, TX', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '[]', '{"facebook":"","twitter":"","linkedin":""}', NULL, 2, UNIX_TIMESTAMP('2024-01-24'), UNIX_TIMESTAMP('2024-01-24'), '[]', NULL, '', NULL, 1, 0, 'student_11.jpg', NULL, '');

-- ============================================
-- CATEGORIES
-- ============================================
INSERT INTO `category` (`id`, `code`, `name`, `parent`, `slug`, `date_added`, `last_modified`, `font_awesome_class`, `thumbnail`, `sub_category_thumbnail`) VALUES
(1, 'WEB', 'Web Development', 0, 'web-development', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-code', 'web-dev.jpg', 'web-dev-sub.jpg'),
(2, 'DATA', 'Data Science', 0, 'data-science', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-chart-line', 'data-science.jpg', 'data-science-sub.jpg'),
(3, 'DESIGN', 'Design', 0, 'design', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-palette', 'design.jpg', 'design-sub.jpg'),
(4, 'PHOTO', 'Photography', 0, 'photography', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-camera', 'photography.jpg', 'photography-sub.jpg'),
(5, 'MARKET', 'Marketing', 0, 'marketing', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-bullhorn', 'marketing.jpg', 'marketing-sub.jpg'),
(6, 'JS', 'JavaScript', 1, 'javascript', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-js', NULL, NULL),
(7, 'PYTHON', 'Python', 2, 'python', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-python', NULL, NULL),
(8, 'UIUX', 'UI/UX Design', 3, 'ui-ux-design', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-paint-brush', NULL, NULL);

-- ============================================
-- COURSES
-- ============================================
INSERT INTO `course` (`id`, `title`, `short_description`, `description`, `outcomes`, `faqs`, `language`, `category_id`, `sub_category_id`, `section`, `requirements`, `price`, `discount_flag`, `discounted_price`, `level`, `user_id`, `thumbnail`, `video_url`, `date_added`, `last_modified`, `course_type`, `is_top_course`, `is_admin`, `status`, `course_overview_provider`, `meta_keywords`, `meta_description`, `is_free_course`, `multi_instructor`, `enable_drip_content`, `creator`, `expiry_period`, `upcoming_image_thumbnail`, `publish_date`) VALUES
(1, 'Complete Web Development Bootcamp', 'Master web development from scratch with HTML, CSS, JavaScript, and modern frameworks', '<p>This comprehensive course will take you from beginner to advanced web developer. You will learn HTML5, CSS3, JavaScript, React, Node.js, and much more. Build real-world projects and create a professional portfolio.</p>', '["Build responsive websites", "Create dynamic web applications", "Understand modern JavaScript", "Work with React and Node.js", "Deploy applications to production"]', '[{"question":"Do I need prior experience?","answer":"No, this course is designed for beginners."},{"question":"How long does it take?","answer":"Approximately 40 hours of content."}]', 'english', 1, 6, NULL, '["Basic computer skills", "Internet connection", "Willingness to learn"]', 99.99, 1, 79.99, 'beginner', '2', 'course_1.jpg', 'https://www.youtube.com/watch?v=demo1', UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15'), 'general', 1, 0, 'active', 'youtube', 'web development, javascript, react, html, css', 'Learn web development from scratch with this comprehensive bootcamp', 0, 0, 0, 2, NULL, NULL, NULL),
(2, 'Data Science with Python', 'Learn data science, machine learning, and data analysis using Python', '<p>This course covers everything you need to know about data science. Learn Python programming, data analysis with pandas, data visualization, machine learning algorithms, and more.</p>', '["Analyze data with Python", "Build machine learning models", "Create data visualizations", "Work with real datasets", "Deploy ML models"]', '[{"question":"What Python knowledge is required?","answer":"Basic Python knowledge is helpful but not required."},{"question":"Will I get a certificate?","answer":"Yes, upon completion you will receive a certificate."}]', 'english', 2, 7, NULL, '["Python basics (optional)", "Basic math knowledge", "Computer with Python installed"]', 129.99, 0, NULL, 'intermediate', '3', 'course_2.jpg', 'https://www.youtube.com/watch?v=demo2', UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16'), 'general', 1, 0, 'active', 'youtube', 'data science, python, machine learning, pandas', 'Master data science with Python in this comprehensive course', 0, 0, 0, 3, NULL, NULL, NULL),
(3, 'UI/UX Design Masterclass', 'Create beautiful and user-friendly interfaces with modern design principles', '<p>Learn the fundamentals of UI/UX design, user research, wireframing, prototyping, and design tools like Figma and Adobe XD. Create stunning interfaces that users love.</p>', '["Design user interfaces", "Conduct user research", "Create wireframes and prototypes", "Use design tools effectively", "Build a design portfolio"]', '[{"question":"Do I need design software?","answer":"We will use Figma which is free."},{"question":"Is this for beginners?","answer":"Yes, we start from the basics."}]', 'english', 3, 8, NULL, '["Computer", "Internet connection", "Figma account (free)"]', 89.99, 1, 69.99, 'beginner', '4', 'course_3.jpg', 'https://www.youtube.com/watch?v=demo3', UNIX_TIMESTAMP('2024-01-17'), UNIX_TIMESTAMP('2024-01-17'), 'general', 1, 0, 'active', 'youtube', 'ui design, ux design, figma, user interface', 'Master UI/UX design and create beautiful interfaces', 0, 0, 0, 4, NULL, NULL, NULL),
(4, 'Professional Photography Course', 'Learn professional photography techniques and post-processing', '<p>From camera basics to advanced techniques, learn everything about photography. Master composition, lighting, editing, and build a professional photography portfolio.</p>', '["Master camera settings", "Understand composition rules", "Edit photos professionally", "Build a photography portfolio", "Start a photography business"]', '[{"question":"What camera do I need?","answer":"Any DSLR or mirrorless camera will work."},{"question":"Do I need editing software?","answer":"We will cover free alternatives to Photoshop."}]', 'english', 4, 0, NULL, '["DSLR or mirrorless camera", "Basic computer skills"]', 79.99, 0, NULL, 'beginner', '5', 'course_4.jpg', 'https://www.youtube.com/watch?v=demo4', UNIX_TIMESTAMP('2024-01-18'), UNIX_TIMESTAMP('2024-01-18'), 'general', 0, 0, 'active', 'youtube', 'photography, camera, editing, photoshop', 'Learn professional photography from scratch', 0, 0, 0, 5, NULL, NULL, NULL),
(5, 'Digital Marketing Complete Guide', 'Master digital marketing strategies and grow your business online', '<p>Learn SEO, social media marketing, content marketing, email marketing, and paid advertising. Create effective marketing campaigns and measure your results.</p>', '["Create marketing strategies", "Master SEO techniques", "Run social media campaigns", "Analyze marketing metrics", "Grow online presence"]', '[{"question":"Is this suitable for beginners?","answer":"Yes, we cover everything from basics."},{"question":"Will I learn about analytics?","answer":"Yes, we cover Google Analytics and more."}]', 'english', 5, 0, NULL, '["Basic computer skills", "Internet connection"]', 94.99, 1, 74.99, 'beginner', '6', 'course_5.jpg', 'https://www.youtube.com/watch?v=demo5', UNIX_TIMESTAMP('2024-01-19'), UNIX_TIMESTAMP('2024-01-19'), 'general', 0, 0, 'active', 'youtube', 'digital marketing, seo, social media, advertising', 'Master digital marketing and grow your business', 0, 0, 0, 6, NULL, NULL, NULL),
(6, 'Advanced JavaScript Concepts', 'Deep dive into advanced JavaScript topics and modern ES6+ features', '<p>Master advanced JavaScript concepts including closures, promises, async/await, design patterns, and modern ES6+ features. Perfect for developers who want to level up their JavaScript skills.</p>', '["Master advanced JavaScript", "Understand async programming", "Learn design patterns", "Work with ES6+ features", "Write clean JavaScript code"]', '[{"question":"What level is this course?","answer":"This is an advanced course for experienced developers."},{"question":"Do I need React knowledge?","answer":"No, this focuses on vanilla JavaScript."}]', 'english', 1, 6, NULL, '["Solid JavaScript fundamentals", "Experience with programming"]', 119.99, 0, NULL, 'advanced', '2', 'course_6.jpg', 'https://www.youtube.com/watch?v=demo6', UNIX_TIMESTAMP('2024-01-20'), UNIX_TIMESTAMP('2024-01-20'), 'general', 0, 0, 'active', 'youtube', 'javascript, es6, async, promises, advanced', 'Master advanced JavaScript concepts and patterns', 0, 0, 0, 2, NULL, NULL, NULL);

-- ============================================
-- SECTIONS
-- ============================================
INSERT INTO `section` (`id`, `title`, `course_id`, `start_date`, `end_date`, `restricted_by`, `order`) VALUES
(1, 'Introduction to Web Development', 1, NULL, NULL, NULL, 1),
(2, 'HTML & CSS Fundamentals', 1, NULL, NULL, NULL, 2),
(3, 'JavaScript Basics', 1, NULL, NULL, NULL, 3),
(4, 'React Framework', 1, NULL, NULL, NULL, 4),
(5, 'Introduction to Data Science', 2, NULL, NULL, NULL, 1),
(6, 'Python for Data Analysis', 2, NULL, NULL, NULL, 2),
(7, 'Machine Learning Basics', 2, NULL, NULL, NULL, 3),
(8, 'Design Fundamentals', 3, NULL, NULL, NULL, 1),
(9, 'User Research', 3, NULL, NULL, NULL, 2),
(10, 'Prototyping & Testing', 3, NULL, NULL, NULL, 3);

-- ============================================
-- LESSONS
-- ============================================
INSERT INTO `lesson` (`id`, `title`, `duration`, `course_id`, `section_id`, `video_type`, `cloud_video_id`, `video_url`, `audio_url`, `date_added`, `last_modified`, `lesson_type`, `attachment`, `attachment_type`, `caption`, `summary`, `is_free`, `order`, `quiz_attempt`, `video_type_for_mobile_application`, `video_url_for_mobile_application`, `duration_for_mobile_application`) VALUES
(1, 'Welcome to Web Development', '00:10:00', 1, 1, 'youtube', NULL, 'https://www.youtube.com/watch?v=lesson1', NULL, UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15'), 'video', NULL, NULL, NULL, 'Introduction to the course and what you will learn', 1, 1, 0, NULL, NULL, NULL),
(2, 'Setting Up Your Development Environment', '00:15:00', 1, 1, 'youtube', NULL, 'https://www.youtube.com/watch?v=lesson2', NULL, UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15'), 'video', NULL, NULL, NULL, 'Learn how to set up your coding environment', 0, 2, 0, NULL, NULL, NULL),
(3, 'HTML Basics', '00:20:00', 1, 2, 'youtube', NULL, 'https://www.youtube.com/watch?v=lesson3', NULL, UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15'), 'video', NULL, NULL, NULL, 'Introduction to HTML structure and tags', 1, 1, 0, NULL, NULL, NULL),
(4, 'CSS Styling', '00:25:00', 1, 2, 'youtube', NULL, 'https://www.youtube.com/watch?v=lesson4', NULL, UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15'), 'video', NULL, NULL, NULL, 'Learn CSS fundamentals and styling', 0, 2, 0, NULL, NULL, NULL),
(5, 'JavaScript Variables and Data Types', '00:18:00', 1, 3, 'youtube', NULL, 'https://www.youtube.com/watch?v=lesson5', NULL, UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15'), 'video', NULL, NULL, NULL, 'Understanding JavaScript variables and data types', 1, 1, 0, NULL, NULL, NULL),
(6, 'Introduction to Data Science', '00:12:00', 2, 5, 'youtube', NULL, 'https://www.youtube.com/watch?v=lesson6', NULL, UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16'), 'video', NULL, NULL, NULL, 'What is data science and why it matters', 1, 1, 0, NULL, NULL, NULL),
(7, 'Python Basics for Data Science', '00:30:00', 2, 6, 'youtube', NULL, 'https://www.youtube.com/watch?v=lesson7', NULL, UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16'), 'video', NULL, NULL, NULL, 'Python programming fundamentals', 0, 1, 0, NULL, NULL, NULL),
(8, 'Design Principles', '00:15:00', 3, 8, 'youtube', NULL, 'https://www.youtube.com/watch?v=lesson8', NULL, UNIX_TIMESTAMP('2024-01-17'), UNIX_TIMESTAMP('2024-01-17'), 'video', NULL, NULL, NULL, 'Core principles of good design', 1, 1, 0, NULL, NULL, NULL),
(9, 'Color Theory', '00:20:00', 3, 8, 'youtube', NULL, 'https://www.youtube.com/watch?v=lesson9', NULL, UNIX_TIMESTAMP('2024-01-17'), UNIX_TIMESTAMP('2024-01-17'), 'video', NULL, NULL, NULL, 'Understanding color in design', 0, 2, 0, NULL, NULL, NULL),
(10, 'Camera Settings Explained', '00:22:00', 4, NULL, 'youtube', NULL, 'https://www.youtube.com/watch?v=lesson10', NULL, UNIX_TIMESTAMP('2024-01-18'), UNIX_TIMESTAMP('2024-01-18'), 'video', NULL, NULL, NULL, 'Master your camera settings', 1, 1, 0, NULL, NULL, NULL);

-- ============================================
-- ENROLLMENTS
-- ============================================
INSERT INTO `enrol` (`id`, `user_id`, `course_id`, `gifted_by`, `expiry_date`, `date_added`, `last_modified`) VALUES
(1, 7, 1, 0, NULL, UNIX_TIMESTAMP('2024-01-20'), UNIX_TIMESTAMP('2024-01-20')),
(2, 7, 3, 0, NULL, UNIX_TIMESTAMP('2024-01-21'), UNIX_TIMESTAMP('2024-01-21')),
(3, 8, 2, 0, NULL, UNIX_TIMESTAMP('2024-01-22'), UNIX_TIMESTAMP('2024-01-22')),
(4, 8, 4, 0, NULL, UNIX_TIMESTAMP('2024-01-23'), UNIX_TIMESTAMP('2024-01-23')),
(5, 9, 1, 0, NULL, UNIX_TIMESTAMP('2024-01-24'), UNIX_TIMESTAMP('2024-01-24')),
(6, 9, 5, 0, NULL, UNIX_TIMESTAMP('2024-01-25'), UNIX_TIMESTAMP('2024-01-25')),
(7, 10, 2, 0, NULL, UNIX_TIMESTAMP('2024-01-26'), UNIX_TIMESTAMP('2024-01-26')),
(8, 10, 3, 0, NULL, UNIX_TIMESTAMP('2024-01-27'), UNIX_TIMESTAMP('2024-01-27')),
(9, 11, 4, 0, NULL, UNIX_TIMESTAMP('2024-01-28'), UNIX_TIMESTAMP('2024-01-28')),
(10, 11, 6, 0, NULL, UNIX_TIMESTAMP('2024-01-29'), UNIX_TIMESTAMP('2024-01-29'));

-- ============================================
-- PAYMENTS
-- ============================================
INSERT INTO `payment` (`id`, `user_id`, `payment_type`, `course_id`, `amount`, `date_added`, `last_modified`, `admin_revenue`, `instructor_revenue`, `tax`, `instructor_payment_status`, `transaction_id`, `session_id`, `coupon`) VALUES
(1, 7, 'course', 1, 79.99, UNIX_TIMESTAMP('2024-01-20'), UNIX_TIMESTAMP('2024-01-20'), '24.00', '55.99', 0, 0, 'TXN001', 'SESS001', NULL),
(2, 7, 'course', 3, 69.99, UNIX_TIMESTAMP('2024-01-21'), UNIX_TIMESTAMP('2024-01-21'), '21.00', '48.99', 0, 0, 'TXN002', 'SESS002', NULL),
(3, 8, 'course', 2, 129.99, UNIX_TIMESTAMP('2024-01-22'), UNIX_TIMESTAMP('2024-01-22'), '39.00', '90.99', 0, 0, 'TXN003', 'SESS003', NULL),
(4, 8, 'course', 4, 79.99, UNIX_TIMESTAMP('2024-01-23'), UNIX_TIMESTAMP('2024-01-23'), '24.00', '55.99', 0, 0, 'TXN004', 'SESS004', NULL),
(5, 9, 'course', 1, 79.99, UNIX_TIMESTAMP('2024-01-24'), UNIX_TIMESTAMP('2024-01-24'), '24.00', '55.99', 0, 0, 'TXN005', 'SESS005', 'SAVE20'),
(6, 9, 'course', 5, 74.99, UNIX_TIMESTAMP('2024-01-25'), UNIX_TIMESTAMP('2024-01-25'), '22.50', '52.49', 0, 0, 'TXN006', 'SESS006', NULL),
(7, 10, 'course', 2, 129.99, UNIX_TIMESTAMP('2024-01-26'), UNIX_TIMESTAMP('2024-01-26'), '39.00', '90.99', 0, 0, 'TXN007', 'SESS007', NULL),
(8, 10, 'course', 3, 69.99, UNIX_TIMESTAMP('2024-01-27'), UNIX_TIMESTAMP('2024-01-27'), '21.00', '48.99', 0, 0, 'TXN008', 'SESS008', NULL),
(9, 11, 'course', 4, 79.99, UNIX_TIMESTAMP('2024-01-28'), UNIX_TIMESTAMP('2024-01-28'), '24.00', '55.99', 0, 0, 'TXN009', 'SESS009', NULL),
(10, 11, 'course', 6, 119.99, UNIX_TIMESTAMP('2024-01-29'), UNIX_TIMESTAMP('2024-01-29'), '36.00', '83.99', 0, 0, 'TXN010', 'SESS010', NULL);

-- ============================================
-- RATINGS & REVIEWS
-- ============================================
INSERT INTO `rating` (`id`, `rating`, `user_id`, `ratable_id`, `ratable_type`, `date_added`, `last_modified`, `review`) VALUES
(1, 5, 7, 1, 'course', UNIX_TIMESTAMP('2024-01-25'), UNIX_TIMESTAMP('2024-01-25'), 'Excellent course! Very comprehensive and well-structured. The instructor explains everything clearly.'),
(2, 4, 8, 2, 'course', UNIX_TIMESTAMP('2024-01-26'), UNIX_TIMESTAMP('2024-01-26'), 'Great content and practical examples. Helped me understand data science concepts better.'),
(3, 5, 9, 1, 'course', UNIX_TIMESTAMP('2024-01-27'), UNIX_TIMESTAMP('2024-01-27'), 'Best web development course I have taken. Highly recommended!'),
(4, 4, 10, 3, 'course', UNIX_TIMESTAMP('2024-01-28'), UNIX_TIMESTAMP('2024-01-28'), 'Good course on UI/UX design. Learned a lot about design principles and tools.'),
(5, 5, 11, 4, 'course', UNIX_TIMESTAMP('2024-01-29'), UNIX_TIMESTAMP('2024-01-29'), 'Amazing photography course! The instructor is very knowledgeable and provides great tips.'),
(6, 4, 7, 2, 'course', UNIX_TIMESTAMP('2024-01-30'), UNIX_TIMESTAMP('2024-01-30'), 'Solid course on data science. Good balance of theory and practice.'),
(7, 5, 8, 4, 'course', UNIX_TIMESTAMP('2024-01-31'), UNIX_TIMESTAMP('2024-01-31'), 'Fantastic photography course! Improved my skills significantly.'),
(8, 4, 9, 5, 'course', UNIX_TIMESTAMP('2024-02-01'), UNIX_TIMESTAMP('2024-02-01'), 'Great marketing course with practical strategies that I can apply immediately.');

-- ============================================
-- BLOG CATEGORIES
-- ============================================
INSERT INTO `blog_category` (`blog_category_id`, `title`, `subtitle`, `slug`, `added_date`) VALUES
(1, 'Web Development', 'Latest trends and tutorials in web development', 'web-development', UNIX_TIMESTAMP('2024-01-01')),
(2, 'Data Science', 'Insights and updates from the data science world', 'data-science', UNIX_TIMESTAMP('2024-01-01')),
(3, 'Design', 'Design inspiration and best practices', 'design', UNIX_TIMESTAMP('2024-01-01')),
(4, 'Learning Tips', 'Tips and strategies for effective learning', 'learning-tips', UNIX_TIMESTAMP('2024-01-01'));

-- ============================================
-- BLOGS
-- ============================================
INSERT INTO `blogs` (`blog_id`, `blog_category_id`, `user_id`, `title`, `keywords`, `description`, `thumbnail`, `banner`, `is_popular`, `likes`, `added_date`, `updated_date`, `status`) VALUES
(1, 1, 2, '10 JavaScript Tips Every Developer Should Know', 'javascript, web development, programming tips', '<p>JavaScript is one of the most popular programming languages today. Here are 10 essential tips that will help you write better JavaScript code and become a more efficient developer.</p>', 'blog_1_thumb.jpg', 'blog_1_banner.jpg', 1, '[]', UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15'), 'active'),
(2, 2, 3, 'Getting Started with Machine Learning', 'machine learning, data science, python, ai', '<p>Machine learning is transforming industries. Learn the basics of machine learning and how to get started with your first ML project using Python.</p>', 'blog_2_thumb.jpg', 'blog_2_banner.jpg', 1, '[]', UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16'), 'active'),
(3, 3, 4, 'Design Trends for 2024', 'design, ui/ux, trends, 2024', '<p>Discover the latest design trends that will shape user interfaces in 2024. From color schemes to typography, learn what is trending in the design world.</p>', 'blog_3_thumb.jpg', 'blog_3_banner.jpg', 0, '[]', UNIX_TIMESTAMP('2024-01-17'), UNIX_TIMESTAMP('2024-01-17'), 'active'),
(4, 4, 2, 'How to Stay Motivated While Learning Online', 'learning, motivation, online courses, education', '<p>Learning online can be challenging. Here are proven strategies to stay motivated and make the most of your online learning journey.</p>', 'blog_4_thumb.jpg', 'blog_4_banner.jpg', 1, '[]', UNIX_TIMESTAMP('2024-01-18'), UNIX_TIMESTAMP('2024-01-18'), 'active'),
(5, 1, 2, 'React Hooks: A Complete Guide', 'react, hooks, javascript, frontend', '<p>React Hooks revolutionized how we write React components. This comprehensive guide covers all the essential hooks and how to use them effectively.</p>', 'blog_5_thumb.jpg', 'blog_5_banner.jpg', 0, '[]', UNIX_TIMESTAMP('2024-01-19'), UNIX_TIMESTAMP('2024-01-19'), 'active');

-- ============================================
-- BLOG COMMENTS
-- ============================================
INSERT INTO `blog_comments` (`blog_comment_id`, `blog_id`, `user_id`, `parent_id`, `comment`, `likes`, `added_date`, `updated_date`) VALUES
(1, 1, 7, 0, 'Great tips! Especially the one about arrow functions. Thanks for sharing!', '[]', UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16')),
(2, 1, 8, 0, 'Very helpful article. I learned a lot from this.', '[]', UNIX_TIMESTAMP('2024-01-17'), UNIX_TIMESTAMP('2024-01-17')),
(3, 2, 9, 0, 'Perfect introduction to ML. Looking forward to more content!', '[]', UNIX_TIMESTAMP('2024-01-17'), UNIX_TIMESTAMP('2024-01-17')),
(4, 3, 10, 0, 'Love these design trends! Can\'t wait to apply them in my projects.', '[]', UNIX_TIMESTAMP('2024-01-18'), UNIX_TIMESTAMP('2024-01-18')),
(5, 4, 11, 0, 'This is exactly what I needed. Motivation is key to success!', '[]', UNIX_TIMESTAMP('2024-01-19'), UNIX_TIMESTAMP('2024-01-19'));

-- ============================================
-- COUPONS
-- ============================================
INSERT INTO `coupons` (`id`, `code`, `discount_percentage`, `created_at`, `expiry_date`) VALUES
(1, 'WELCOME10', '10', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-12-31')),
(2, 'SAVE20', '20', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-12-31')),
(3, 'STUDENT50', '50', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-12-31')),
(4, 'SPRING25', '25', UNIX_TIMESTAMP('2024-03-01'), UNIX_TIMESTAMP('2024-05-31')),
(5, 'SUMMER30', '30', UNIX_TIMESTAMP('2024-06-01'), UNIX_TIMESTAMP('2024-08-31'));

-- ============================================
-- APPLICATIONS (Instructor Applications)
-- ============================================
INSERT INTO `applications` (`id`, `user_id`, `address`, `phone`, `message`, `document`, `status`) VALUES
(1, 7, '100 Student Ave, Boston, MA', '+1-555-0201', 'I would like to become an instructor and share my knowledge about web development.', 'application_1.pdf', 0),
(2, 8, '200 Learner St, Seattle, WA', '+1-555-0202', 'I have experience in data science and would love to teach others.', 'application_2.pdf', 1),
(3, 9, '300 Study Blvd, Miami, FL', '+1-555-0203', 'I am a professional designer and want to create design courses.', 'application_3.pdf', 0);

-- ============================================
-- BADGES (Gamification)
-- ============================================
INSERT INTO `badges` (`id`, `type`, `title`, `image`, `condition_from`, `condition_to`, `description`, `created_at`, `updated_at`) VALUES
(1, 'course_completion', 'First Course Completed', 'badge_1.jpg', 1, 1, 'Complete your first course', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01')),
(2, 'course_completion', '5 Courses Master', 'badge_2.jpg', 5, 5, 'Complete 5 courses', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01')),
(3, 'course_completion', '10 Courses Expert', 'badge_3.jpg', 10, 10, 'Complete 10 courses', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01')),
(4, 'rating', 'Top Reviewer', 'badge_4.jpg', 10, 999, 'Leave 10 or more reviews', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'));

-- ============================================
-- CONTACT MESSAGES
-- ============================================
INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `message`, `has_read`, `replied`, `created_at`, `updated_at`) VALUES
(1, 'Alice', 'Johnson', 'alice@example.com', '+1-555-1001', '123 Contact St, New York, NY', 'I have a question about the web development course. Can you provide more details?', 1, 1, UNIX_TIMESTAMP('2024-01-20'), UNIX_TIMESTAMP('2024-01-21')),
(2, 'Bob', 'Williams', 'bob@example.com', '+1-555-1002', '456 Inquiry Ave, Los Angeles, CA', 'I am interested in becoming an instructor. How can I apply?', 1, 0, UNIX_TIMESTAMP('2024-01-21'), UNIX_TIMESTAMP('2024-01-21')),
(3, 'Carol', 'Miller', 'carol@example.com', '+1-555-1003', '789 Question Rd, Chicago, IL', 'Do you offer certificates upon course completion?', 0, 0, UNIX_TIMESTAMP('2024-01-22'), UNIX_TIMESTAMP('2024-01-22')),
(4, 'David', 'Garcia', 'david@example.com', '+1-555-1004', '321 Help St, Houston, TX', 'I need help with my account. Can someone assist me?', 1, 1, UNIX_TIMESTAMP('2024-01-23'), UNIX_TIMESTAMP('2024-01-24'));

-- ============================================
-- NEWSLETTER SUBSCRIBERS
-- ============================================
INSERT INTO `newsletter_subscriber` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'subscriber1@example.com', UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15')),
(2, 'subscriber2@example.com', UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16')),
(3, 'subscriber3@example.com', UNIX_TIMESTAMP('2024-01-17'), UNIX_TIMESTAMP('2024-01-17')),
(4, 'subscriber4@example.com', UNIX_TIMESTAMP('2024-01-18'), UNIX_TIMESTAMP('2024-01-18')),
(5, 'subscriber5@example.com', UNIX_TIMESTAMP('2024-01-19'), UNIX_TIMESTAMP('2024-01-19'));

-- ============================================
-- NEWSLETTERS
-- ============================================
INSERT INTO `newsletters` (`id`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to Our Learning Platform!', '<p>Thank you for joining our learning community. We are excited to have you here!</p>', UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15')),
(2, 'New Courses Available This Month', '<p>Check out our latest courses on web development, data science, and design.</p>', UNIX_TIMESTAMP('2024-01-20'), UNIX_TIMESTAMP('2024-01-20')),
(3, 'Special Discount: 30% Off All Courses', '<p>Don\'t miss our special promotion! Get 30% off on all courses this month.</p>', UNIX_TIMESTAMP('2024-01-25'), UNIX_TIMESTAMP('2024-01-25'));

-- ============================================
-- NOTIFICATIONS
-- ============================================
INSERT INTO `notifications` (`id`, `from_user`, `to_user`, `type`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 7, 'course_purchase', 'Course Purchase Confirmation', 'You have successfully purchased Complete Web Development Bootcamp', 0, UNIX_TIMESTAMP('2024-01-20'), UNIX_TIMESTAMP('2024-01-20')),
(2, NULL, 8, 'course_purchase', 'Course Purchase Confirmation', 'You have successfully purchased Data Science with Python', 0, UNIX_TIMESTAMP('2024-01-22'), UNIX_TIMESTAMP('2024-01-22')),
(3, 2, 7, 'course_completion', 'Course Completed!', 'Congratulations! You have completed Complete Web Development Bootcamp', 0, UNIX_TIMESTAMP('2024-01-25'), UNIX_TIMESTAMP('2024-01-25')),
(4, NULL, 9, 'course_purchase', 'Course Purchase Confirmation', 'You have successfully purchased Complete Web Development Bootcamp', 0, UNIX_TIMESTAMP('2024-01-24'), UNIX_TIMESTAMP('2024-01-24')),
(5, NULL, 10, 'course_purchase', 'Course Purchase Confirmation', 'You have successfully purchased Data Science with Python', 0, UNIX_TIMESTAMP('2024-01-26'), UNIX_TIMESTAMP('2024-01-26'));

-- ============================================
-- MESSAGE THREADS
-- ============================================
INSERT INTO `message_thread` (`message_thread_id`, `message_thread_code`, `sender`, `receiver`, `last_message_timestamp`) VALUES
(1, 'THREAD001', '2', '7', UNIX_TIMESTAMP('2024-01-21')),
(2, 'THREAD002', '3', '8', UNIX_TIMESTAMP('2024-01-23')),
(3, 'THREAD003', '7', '2', UNIX_TIMESTAMP('2024-01-22'));

-- ============================================
-- MESSAGES
-- ============================================
INSERT INTO `message` (`message_id`, `message_thread_code`, `message`, `sender`, `receiver`, `timestamp`, `read_status`) VALUES
(1, 'THREAD001', 'Hi! Welcome to the course. If you have any questions, feel free to ask.', 2, 7, UNIX_TIMESTAMP('2024-01-21'), 1),
(2, 'THREAD001', 'Thank you! I am excited to start learning.', 7, 2, UNIX_TIMESTAMP('2024-01-21'), 1),
(3, 'THREAD002', 'Hello! I have a question about the data science course.', 8, 3, UNIX_TIMESTAMP('2024-01-23'), 1),
(4, 'THREAD002', 'Sure! I would be happy to help. What is your question?', 3, 8, UNIX_TIMESTAMP('2024-01-23'), 0),
(5, 'THREAD003', 'I need help with lesson 3. Can you explain it further?', 7, 2, UNIX_TIMESTAMP('2024-01-22'), 1);

-- ============================================
-- QUESTIONS (Quiz Questions)
-- ============================================
INSERT INTO `question` (`id`, `quiz_id`, `title`, `type`, `number_of_options`, `options`, `correct_answers`, `order`) VALUES
(1, 1, 'What is the correct way to declare a variable in JavaScript?', 'single', 4, '["var x = 5;", "variable x = 5;", "x := 5;", "x = 5;"]', '["var x = 5;"]', 1),
(2, 1, 'Which of the following are JavaScript data types?', 'multiple', 5, '["String", "Number", "Boolean", "Object", "Array"]', '["String", "Number", "Boolean", "Object"]', 2),
(3, 2, 'What is the purpose of pandas in Python?', 'single', 4, '["Web development", "Data analysis", "Game development", "Mobile apps"]', '["Data analysis"]', 1),
(4, 2, 'Which libraries are commonly used in machine learning?', 'multiple', 4, '["scikit-learn", "TensorFlow", "Pandas", "NumPy"]', '["scikit-learn", "TensorFlow", "NumPy"]', 2);

-- ============================================
-- QUIZ RESULTS
-- ============================================
INSERT INTO `quiz_results` (`quiz_result_id`, `quiz_id`, `user_id`, `user_answers`, `correct_answers`, `total_obtained_marks`, `date_added`, `date_updated`, `is_submitted`) VALUES
(1, 1, 7, '{"1":"var x = 5;","2":["String","Number","Boolean","Object"]}', '{"1":"var x = 5;","2":["String","Number","Boolean","Object"]}', 100, UNIX_TIMESTAMP('2024-01-25'), UNIX_TIMESTAMP('2024-01-25'), 1),
(2, 2, 8, '{"3":"Data analysis","4":["scikit-learn","TensorFlow","NumPy"]}', '{"3":"Data analysis","4":["scikit-learn","TensorFlow","NumPy"]}', 100, UNIX_TIMESTAMP('2024-01-26'), UNIX_TIMESTAMP('2024-01-26'), 1);

-- ============================================
-- RESOURCE FILES
-- ============================================
INSERT INTO `resource_files` (`id`, `lesson_id`, `title`, `file_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Course Introduction PDF', 'intro.pdf', UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15')),
(2, 3, 'HTML Cheat Sheet', 'html-cheatsheet.pdf', UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15')),
(3, 4, 'CSS Reference Guide', 'css-reference.pdf', UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15')),
(4, 6, 'Data Science Resources', 'data-science-resources.zip', UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16')),
(5, 7, 'Python Code Examples', 'python-examples.zip', UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16'));

-- ============================================
-- TAGS
-- ============================================
INSERT INTO `tag` (`id`, `tag`, `tagable_id`, `tagable_type`, `date_added`, `last_modified`) VALUES
(1, 'javascript', 1, 'course', UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15')),
(2, 'web-development', 1, 'course', UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15')),
(3, 'react', 1, 'course', UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15')),
(4, 'python', 2, 'course', UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16')),
(5, 'data-science', 2, 'course', UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16')),
(6, 'machine-learning', 2, 'course', UNIX_TIMESTAMP('2024-01-16'), UNIX_TIMESTAMP('2024-01-16')),
(7, 'design', 3, 'course', UNIX_TIMESTAMP('2024-01-17'), UNIX_TIMESTAMP('2024-01-17')),
(8, 'ui-ux', 3, 'course', UNIX_TIMESTAMP('2024-01-17'), UNIX_TIMESTAMP('2024-01-17')),
(9, 'photography', 4, 'course', UNIX_TIMESTAMP('2024-01-18'), UNIX_TIMESTAMP('2024-01-18')),
(10, 'marketing', 5, 'course', UNIX_TIMESTAMP('2024-01-19'), UNIX_TIMESTAMP('2024-01-19'));

-- ============================================
-- COMMENTS
-- ============================================
INSERT INTO `comment` (`id`, `body`, `user_id`, `commentable_id`, `commentable_type`, `date_added`, `last_modified`) VALUES
(1, 'Great course! Very well explained.', 7, 1, 'course', UNIX_TIMESTAMP('2024-01-25'), UNIX_TIMESTAMP('2024-01-25')),
(2, 'I learned so much from this course. Highly recommended!', 8, 2, 'course', UNIX_TIMESTAMP('2024-01-26'), UNIX_TIMESTAMP('2024-01-26')),
(3, 'The instructor is amazing. Clear explanations and great examples.', 9, 1, 'course', UNIX_TIMESTAMP('2024-01-27'), UNIX_TIMESTAMP('2024-01-27')),
(4, 'This course helped me understand data science better.', 10, 2, 'course', UNIX_TIMESTAMP('2024-01-28'), UNIX_TIMESTAMP('2024-01-28'));

-- ============================================
-- WATCH HISTORIES
-- ============================================
INSERT INTO `watch_histories` (`watch_history_id`, `course_id`, `student_id`, `completed_lesson`, `course_progress`, `watching_lesson_id`, `quiz_result`, `completed_date`, `date_added`, `date_updated`) VALUES
(1, 1, 7, '[1,2,3,4]', 40, 5, '[]', NULL, UNIX_TIMESTAMP('2024-01-20'), UNIX_TIMESTAMP('2024-01-25')),
(2, 2, 8, '[6,7]', 30, 7, '[]', NULL, UNIX_TIMESTAMP('2024-01-22'), UNIX_TIMESTAMP('2024-01-26')),
(3, 3, 10, '[8,9]', 25, 9, '[]', NULL, UNIX_TIMESTAMP('2024-01-27'), UNIX_TIMESTAMP('2024-01-28')),
(4, 4, 11, '[10]', 15, 10, '[]', NULL, UNIX_TIMESTAMP('2024-01-28'), UNIX_TIMESTAMP('2024-01-29'));

-- ============================================
-- WATCHED DURATION
-- ============================================
INSERT INTO `watched_duration` (`watched_id`, `watched_student_id`, `watched_course_id`, `watched_lesson_id`, `current_duration`, `watched_counter`) VALUES
(1, 7, 1, 1, 600, '{"1":600}'),
(2, 7, 1, 2, 900, '{"2":900}'),
(3, 7, 1, 3, 1200, '{"3":1200}'),
(4, 8, 2, 6, 720, '{"6":720}'),
(5, 8, 2, 7, 1800, '{"7":1800}'),
(6, 10, 3, 8, 900, '{"8":900}'),
(7, 11, 4, 10, 1320, '{"10":1320}');

-- ============================================
-- INSTRUCTOR FOLLOWINGS
-- ============================================
INSERT INTO `instructor_followings` (`id`, `user_id`, `instructor_id`, `is_following`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 1, UNIX_TIMESTAMP('2024-01-20'), UNIX_TIMESTAMP('2024-01-20')),
(2, 8, 3, 1, UNIX_TIMESTAMP('2024-01-22'), UNIX_TIMESTAMP('2024-01-22')),
(3, 9, 2, 1, UNIX_TIMESTAMP('2024-01-24'), UNIX_TIMESTAMP('2024-01-24')),
(4, 10, 4, 1, UNIX_TIMESTAMP('2024-01-27'), UNIX_TIMESTAMP('2024-01-27')),
(5, 11, 5, 1, UNIX_TIMESTAMP('2024-01-28'), UNIX_TIMESTAMP('2024-01-28'));

-- ============================================
-- PAYOUTS
-- ============================================
INSERT INTO `payout` (`id`, `user_id`, `payment_type`, `amount`, `date_added`, `last_modified`, `status`) VALUES
(1, 2, 'paypal', 55.99, UNIX_TIMESTAMP('2024-02-01'), UNIX_TIMESTAMP('2024-02-01'), 1),
(2, 2, 'paypal', 48.99, UNIX_TIMESTAMP('2024-02-01'), UNIX_TIMESTAMP('2024-02-01'), 1),
(3, 3, 'stripe', 90.99, UNIX_TIMESTAMP('2024-02-01'), UNIX_TIMESTAMP('2024-02-01'), 0),
(4, 4, 'paypal', 55.99, UNIX_TIMESTAMP('2024-02-01'), UNIX_TIMESTAMP('2024-02-01'), 0),
(5, 5, 'paypal', 55.99, UNIX_TIMESTAMP('2024-02-01'), UNIX_TIMESTAMP('2024-02-01'), 0);

-- ============================================
-- CUSTOM PAGES
-- ============================================
INSERT INTO `custom_page` (`custom_page_id`, `page_title`, `page_content`, `page_url`, `button_title`, `button_position`, `status`) VALUES
(1, 'About Our Platform', '<h2>Welcome to Our Learning Platform</h2><p>We are dedicated to providing high-quality online courses to help you achieve your learning goals.</p>', 'about-platform', 'Learn More', 'top', 1),
(2, 'Success Stories', '<h2>Student Success Stories</h2><p>Read about how our students have transformed their careers through our courses.</p>', 'success-stories', 'View Stories', 'top', 1);

-- ============================================
-- BBB MEETINGS (BigBlueButton)
-- ============================================
INSERT INTO `bbb_meetings` (`id`, `course_id`, `meeting_id`, `moderator_pw`, `viewer_pw`, `instructions`, `created_at`, `updated_at`) VALUES
(1, 1, 'meeting-001', 'mod123', 'view123', 'Join this live session to discuss web development topics.', UNIX_TIMESTAMP('2024-01-20'), UNIX_TIMESTAMP('2024-01-20')),
(2, 2, 'meeting-002', 'mod456', 'view456', 'Live Q&A session for data science course students.', UNIX_TIMESTAMP('2024-01-22'), UNIX_TIMESTAMP('2024-01-22'));

-- ============================================
-- END OF DEMO DATA
-- ============================================
-- Note: Password for all demo users is: 1234
-- All timestamps are set to realistic dates in 2024
-- ============================================
