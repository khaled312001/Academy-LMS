# Image Download Guide for Academy LMS Demo Data

This guide explains how to download all images needed for the demo data in Academy LMS.

## Quick Start (Windows PowerShell)

1. **Run the PowerShell script:**
   ```powershell
   .\download_images_simple.ps1
   ```
   
   This will download placeholder images from a free service.

## Advanced: Using Python with Unsplash (Better Quality Images)

### Prerequisites
- Python 3.6 or higher
- `requests` library: `pip install requests`

### Steps

1. **Get a free Unsplash API key:**
   - Visit: https://unsplash.com/developers
   - Create a free account
   - Create a new application
   - Copy your Access Key

2. **Set the API key:**
   
   **Windows PowerShell:**
   ```powershell
   $env:UNSPLASH_ACCESS_KEY="your_access_key_here"
   ```
   
   **Linux/Mac:**
   ```bash
   export UNSPLASH_ACCESS_KEY="your_access_key_here"
   ```

3. **Run the Python script:**
   ```bash
   python download_images.py
   ```

## What Images Are Downloaded?

### User Images (10 images)
- 5 Instructor profile pictures
- 5 Student profile pictures
- Location: `uploads/user_image/`
- Size: 400x400px

### Category Thumbnails (10 images)
- Main category images (5)
- Sub-category images (5)
- Location: `uploads/category_thumbnails/`
- Size: 600x400px

### Course Thumbnails (6 images)
- One thumbnail per course
- Location: `uploads/thumbnails/`
- Size: 800x450px

### Blog Images (10 images)
- 5 Blog thumbnails
- 5 Blog banners
- Location: `uploads/blog/`
- Sizes: 400x300px (thumbnails), 1200x400px (banners)

### Badge Images (4 images)
- Achievement badges
- Location: `uploads/badges/`
- Size: 200x200px

**Total: 40 images**

## Image File Names

All image file names in `demo_data.sql` are already configured correctly. The download scripts will create images with these exact names:

### Users
- `instructor_2.jpg` through `instructor_6.jpg`
- `student_7.jpg` through `student_11.jpg`

### Categories
- `web-dev.jpg`, `web-dev-sub.jpg`
- `data-science.jpg`, `data-science-sub.jpg`
- `design.jpg`, `design-sub.jpg`
- `photography.jpg`, `photography-sub.jpg`
- `marketing.jpg`, `marketing-sub.jpg`

### Courses
- `course_1.jpg` through `course_6.jpg`

### Blogs
- `blog_1_thumb.jpg`, `blog_1_banner.jpg`
- `blog_2_thumb.jpg`, `blog_2_banner.jpg`
- `blog_3_thumb.jpg`, `blog_3_banner.jpg`
- `blog_4_thumb.jpg`, `blog_4_banner.jpg`
- `blog_5_thumb.jpg`, `blog_5_banner.jpg`

### Badges
- `badge_1.jpg` through `badge_4.jpg`

## Alternative: Manual Download

If you prefer to download images manually:

1. Visit a free stock photo site:
   - Unsplash: https://unsplash.com
   - Pexels: https://www.pexels.com
   - Pixabay: https://pixabay.com

2. Search for appropriate images based on the categories above

3. Download and rename them to match the file names listed above

4. Place them in the correct directories:
   - User images → `uploads/user_image/`
   - Category images → `uploads/category_thumbnails/`
   - Course images → `uploads/thumbnails/`
   - Blog images → `uploads/blog/`
   - Badge images → `uploads/badges/`

## Verification

After downloading images, verify they exist:

**Windows PowerShell:**
```powershell
Get-ChildItem -Recurse uploads\user_image, uploads\thumbnails, uploads\category_thumbnails, uploads\blog, uploads\badges | Select-Object Name, Length
```

**Linux/Mac:**
```bash
find uploads/{user_image,thumbnails,category_thumbnails,blog,badges} -type f -name "*.jpg" | wc -l
```

You should see 40 image files.

## Troubleshooting

### Script fails to download
- Check your internet connection
- For Unsplash: Verify your API key is correct
- Try running the script again (some services have rate limits)

### Images not showing in application
- Verify images are in the correct directories
- Check file permissions (images should be readable)
- Ensure file names match exactly (case-sensitive on Linux/Mac)

### Need different images
- Edit `download_images.py` to change search queries
- Or manually replace images with your own

## Notes

- The PowerShell script uses placeholder images (random photos)
- The Python script with Unsplash provides better quality, relevant images
- All images are free to use (Unsplash license)
- Images are downloaded at appropriate sizes for web use
