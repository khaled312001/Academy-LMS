# PowerShell Script to Download Images for Academy LMS Demo Data
# This script downloads placeholder images from a free image service

$ErrorActionPreference = "Continue"

# Create directories
$directories = @(
    "uploads\user_image",
    "uploads\thumbnails",
    "uploads\category_thumbnails",
    "uploads\blog",
    "uploads\badges"
)

foreach ($dir in $directories) {
    if (-not (Test-Path $dir)) {
        New-Item -ItemType Directory -Path $dir -Force | Out-Null
        Write-Host "Created directory: $dir" -ForegroundColor Green
    }
}

# Image list with dimensions
$images = @{
    "uploads\user_image\instructor_2.jpg" = "400x400"
    "uploads\user_image\instructor_3.jpg" = "400x400"
    "uploads\user_image\instructor_4.jpg" = "400x400"
    "uploads\user_image\instructor_5.jpg" = "400x400"
    "uploads\user_image\instructor_6.jpg" = "400x400"
    "uploads\user_image\student_7.jpg" = "400x400"
    "uploads\user_image\student_8.jpg" = "400x400"
    "uploads\user_image\student_9.jpg" = "400x400"
    "uploads\user_image\student_10.jpg" = "400x400"
    "uploads\user_image\student_11.jpg" = "400x400"
    "uploads\category_thumbnails\web-dev.jpg" = "600x400"
    "uploads\category_thumbnails\web-dev-sub.jpg" = "600x400"
    "uploads\category_thumbnails\data-science.jpg" = "600x400"
    "uploads\category_thumbnails\data-science-sub.jpg" = "600x400"
    "uploads\category_thumbnails\design.jpg" = "600x400"
    "uploads\category_thumbnails\design-sub.jpg" = "600x400"
    "uploads\category_thumbnails\photography.jpg" = "600x400"
    "uploads\category_thumbnails\photography-sub.jpg" = "600x400"
    "uploads\category_thumbnails\marketing.jpg" = "600x400"
    "uploads\category_thumbnails\marketing-sub.jpg" = "600x400"
    "uploads\thumbnails\course_1.jpg" = "800x450"
    "uploads\thumbnails\course_2.jpg" = "800x450"
    "uploads\thumbnails\course_3.jpg" = "800x450"
    "uploads\thumbnails\course_4.jpg" = "800x450"
    "uploads\thumbnails\course_5.jpg" = "800x450"
    "uploads\thumbnails\course_6.jpg" = "800x450"
    "uploads\blog\blog_1_thumb.jpg" = "400x300"
    "uploads\blog\blog_1_banner.jpg" = "1200x400"
    "uploads\blog\blog_2_thumb.jpg" = "400x300"
    "uploads\blog\blog_2_banner.jpg" = "1200x400"
    "uploads\blog\blog_3_thumb.jpg" = "400x300"
    "uploads\blog\blog_3_banner.jpg" = "1200x400"
    "uploads\blog\blog_4_thumb.jpg" = "400x300"
    "uploads\blog\blog_4_banner.jpg" = "1200x400"
    "uploads\blog\blog_5_thumb.jpg" = "400x300"
    "uploads\blog\blog_5_banner.jpg" = "1200x400"
    "uploads\badges\badge_1.jpg" = "200x200"
    "uploads\badges\badge_2.jpg" = "200x200"
    "uploads\badges\badge_3.jpg" = "200x200"
    "uploads\badges\badge_4.jpg" = "200x200"
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Academy LMS - Image Download Script" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

$downloaded = 0
$failed = 0

foreach ($imagePath in $images.Keys) {
    $dimensions = $images[$imagePath]
    $width, $height = $dimensions -split "x"
    
    $url = "https://picsum.photos/$width/$height"
    
    try {
        Write-Host "Downloading: $imagePath" -ForegroundColor Yellow
        Invoke-WebRequest -Uri $url -OutFile $imagePath -ErrorAction Stop
        Write-Host "  Success" -ForegroundColor Green
        $downloaded++
    }
    catch {
        Write-Host "  Failed: $_" -ForegroundColor Red
        $failed++
    }
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Download Summary" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Successfully downloaded: $downloaded images" -ForegroundColor Green
if ($failed -gt 0) {
    Write-Host "Failed to download: $failed images" -ForegroundColor Red
}
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "Note: These are placeholder images from picsum.photos" -ForegroundColor Yellow
Write-Host "For better quality images, use the Python script with Unsplash API" -ForegroundColor Yellow
Write-Host ""
