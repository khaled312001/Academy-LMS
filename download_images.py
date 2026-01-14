#!/usr/bin/env python3
"""
Image Download Script for Academy LMS Demo Data
Downloads images from Unsplash (free stock photos) for all demo data tables
"""

import os
import requests
import json
from pathlib import Path

# Configuration
UNSPLASH_ACCESS_KEY = "YOUR_UNSPLASH_ACCESS_KEY"  # Get free key from https://unsplash.com/developers
BASE_DIR = Path(__file__).parent
UPLOADS_DIR = BASE_DIR / "uploads"

# Image directories
DIRECTORIES = {
    "user_image": UPLOADS_DIR / "user_image",
    "thumbnails": UPLOADS_DIR / "thumbnails",
    "category_thumbnails": UPLOADS_DIR / "category_thumbnails",
    "blog": UPLOADS_DIR / "blog",
    "badges": UPLOADS_DIR / "badges",
}

# Image requirements
IMAGE_REQUIREMENTS = {
    # User images (instructors and students)
    "instructor_2.jpg": {"dir": "user_image", "query": "professional man business", "width": 400, "height": 400},
    "instructor_3.jpg": {"dir": "user_image", "query": "professional woman business", "width": 400, "height": 400},
    "instructor_4.jpg": {"dir": "user_image", "query": "professional man designer", "width": 400, "height": 400},
    "instructor_5.jpg": {"dir": "user_image", "query": "professional woman photographer", "width": 400, "height": 400},
    "instructor_6.jpg": {"dir": "user_image", "query": "professional man marketing", "width": 400, "height": 400},
    "student_7.jpg": {"dir": "user_image", "query": "young student man", "width": 400, "height": 400},
    "student_8.jpg": {"dir": "user_image", "query": "young student woman", "width": 400, "height": 400},
    "student_9.jpg": {"dir": "user_image", "query": "young student man", "width": 400, "height": 400},
    "student_10.jpg": {"dir": "user_image", "query": "young student woman", "width": 400, "height": 400},
    "student_11.jpg": {"dir": "user_image", "query": "young student man", "width": 400, "height": 400},
    
    # Category thumbnails
    "web-dev.jpg": {"dir": "category_thumbnails", "query": "web development coding", "width": 600, "height": 400},
    "web-dev-sub.jpg": {"dir": "category_thumbnails", "query": "javascript code", "width": 600, "height": 400},
    "data-science.jpg": {"dir": "category_thumbnails", "query": "data science analytics", "width": 600, "height": 400},
    "data-science-sub.jpg": {"dir": "category_thumbnails", "query": "python programming", "width": 600, "height": 400},
    "design.jpg": {"dir": "category_thumbnails", "query": "graphic design ui ux", "width": 600, "height": 400},
    "design-sub.jpg": {"dir": "category_thumbnails", "query": "ui design interface", "width": 600, "height": 400},
    "photography.jpg": {"dir": "category_thumbnails", "query": "photography camera", "width": 600, "height": 400},
    "photography-sub.jpg": {"dir": "category_thumbnails", "query": "photography portrait", "width": 600, "height": 400},
    "marketing.jpg": {"dir": "category_thumbnails", "query": "digital marketing social media", "width": 600, "height": 400},
    "marketing-sub.jpg": {"dir": "category_thumbnails", "query": "marketing strategy", "width": 600, "height": 400},
    
    # Course thumbnails
    "course_1.jpg": {"dir": "thumbnails", "query": "web development programming", "width": 800, "height": 450},
    "course_2.jpg": {"dir": "thumbnails", "query": "data science machine learning", "width": 800, "height": 450},
    "course_3.jpg": {"dir": "thumbnails", "query": "ui ux design interface", "width": 800, "height": 450},
    "course_4.jpg": {"dir": "thumbnails", "query": "photography camera professional", "width": 800, "height": 450},
    "course_5.jpg": {"dir": "thumbnails", "query": "digital marketing social media", "width": 800, "height": 450},
    "course_6.jpg": {"dir": "thumbnails", "query": "javascript programming code", "width": 800, "height": 450},
    
    # Blog images
    "blog_1_thumb.jpg": {"dir": "blog", "query": "javascript code programming", "width": 400, "height": 300},
    "blog_1_banner.jpg": {"dir": "blog", "query": "web development coding", "width": 1200, "height": 400},
    "blog_2_thumb.jpg": {"dir": "blog", "query": "machine learning artificial intelligence", "width": 400, "height": 300},
    "blog_2_banner.jpg": {"dir": "blog", "query": "data science analytics", "width": 1200, "height": 400},
    "blog_3_thumb.jpg": {"dir": "blog", "query": "design trends modern", "width": 400, "height": 300},
    "blog_3_banner.jpg": {"dir": "blog", "query": "ui ux design modern", "width": 1200, "height": 400},
    "blog_4_thumb.jpg": {"dir": "blog", "query": "online learning education", "width": 400, "height": 300},
    "blog_4_banner.jpg": {"dir": "blog", "query": "online education learning", "width": 1200, "height": 400},
    "blog_5_thumb.jpg": {"dir": "blog", "query": "react javascript frontend", "width": 400, "height": 300},
    "blog_5_banner.jpg": {"dir": "blog", "query": "react programming development", "width": 1200, "height": 400},
    
    # Badge images
    "badge_1.jpg": {"dir": "badges", "query": "achievement badge award", "width": 200, "height": 200},
    "badge_2.jpg": {"dir": "badges", "query": "achievement medal gold", "width": 200, "height": 200},
    "badge_3.jpg": {"dir": "badges", "query": "achievement trophy winner", "width": 200, "height": 200},
    "badge_4.jpg": {"dir": "badges", "query": "achievement star rating", "width": 200, "height": 200},
}

def create_directories():
    """Create necessary directories"""
    for dir_path in DIRECTORIES.values():
        dir_path.mkdir(parents=True, exist_ok=True)
        print(f"Created directory: {dir_path}")

def download_from_unsplash(filename, query, width, height, access_key):
    """Download image from Unsplash"""
    if access_key == "YOUR_UNSPLASH_ACCESS_KEY":
        print(f"⚠️  Skipping {filename} - Please set UNSPLASH_ACCESS_KEY")
        return False
    
    try:
        # Search for image
        search_url = "https://api.unsplash.com/search/photos"
        headers = {"Authorization": f"Client-ID {access_key}"}
        params = {
            "query": query,
            "per_page": 1,
            "orientation": "landscape" if width > height else "portrait"
        }
        
        response = requests.get(search_url, headers=headers, params=params, timeout=10)
        response.raise_for_status()
        
        data = response.json()
        if not data.get("results"):
            print(f"⚠️  No results for {filename} (query: {query})")
            return False
        
        # Get image URL
        image_url = data["results"][0]["urls"]["raw"]
        image_url += f"&w={width}&h={height}&fit=crop"
        
        # Download image
        img_response = requests.get(image_url, timeout=30)
        img_response.raise_for_status()
        
        # Save image
        file_path = DIRECTORIES[IMAGE_REQUIREMENTS[filename]["dir"]] / filename
        with open(file_path, "wb") as f:
            f.write(img_response.content)
        
        print(f"✅ Downloaded: {filename}")
        return True
        
    except Exception as e:
        print(f"❌ Error downloading {filename}: {str(e)}")
        return False

def download_from_placeholder(filename, width, height):
    """Download placeholder image from placeholder service"""
    try:
        # Using picsum.photos as fallback
        url = f"https://picsum.photos/{width}/{height}?random={hash(filename)}"
        response = requests.get(url, timeout=30)
        response.raise_for_status()
        
        file_path = DIRECTORIES[IMAGE_REQUIREMENTS[filename]["dir"]] / filename
        with open(file_path, "wb") as f:
            f.write(response.content)
        
        print(f"✅ Downloaded placeholder: {filename}")
        return True
        
    except Exception as e:
        print(f"❌ Error downloading placeholder {filename}: {str(e)}")
        return False

def main():
    """Main function"""
    print("=" * 60)
    print("Academy LMS - Image Download Script")
    print("=" * 60)
    
    # Create directories
    create_directories()
    
    # Check for Unsplash access key
    access_key = os.environ.get("UNSPLASH_ACCESS_KEY", UNSPLASH_ACCESS_KEY)
    
    if access_key == "YOUR_UNSPLASH_ACCESS_KEY":
        print("\n⚠️  WARNING: No Unsplash access key found!")
        print("   Using placeholder images instead.")
        print("   To use Unsplash images, get a free key from:")
        print("   https://unsplash.com/developers")
        print("   Then set: export UNSPLASH_ACCESS_KEY='your_key'\n")
        use_unsplash = False
    else:
        use_unsplash = True
    
    # Download images
    print("\n📥 Downloading images...\n")
    downloaded = 0
    failed = 0
    
    for filename, requirements in IMAGE_REQUIREMENTS.items():
        if use_unsplash:
            success = download_from_unsplash(
                filename,
                requirements["query"],
                requirements["width"],
                requirements["height"],
                access_key
            )
        else:
            success = download_from_placeholder(
                filename,
                requirements["width"],
                requirements["height"]
            )
        
        if success:
            downloaded += 1
        else:
            failed += 1
    
    # Summary
    print("\n" + "=" * 60)
    print(f"✅ Successfully downloaded: {downloaded} images")
    if failed > 0:
        print(f"❌ Failed to download: {failed} images")
    print("=" * 60)
    print("\n📝 Next step: Run the updated demo_data.sql file")
    print("   All image paths are already configured in the SQL file.")

if __name__ == "__main__":
    main()
