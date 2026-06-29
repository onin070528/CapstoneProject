@echo off
title iTour Davao Oriental - Startup
color 0A

echo ============================================
echo   iTour Davao Oriental - Morning Startup
echo ============================================
echo.

REM Navigate to project directory
cd /d "%~dp0"

echo [1/3] Deleting stale Vite hot file...
if exist "public\hot" (
    del /f /q "public\hot"
    echo        Done - stale hot file removed.
) else (
    echo        No stale hot file found, skipping.
)
echo.

echo [2/3] Building CSS and JS assets...
call npm run build
if %errorlevel% neq 0 (
    echo        ERROR: Build failed! Check the output above.
    pause
    exit /b 1
)
echo        Assets built successfully.
echo.

echo [3/3] Starting Laravel server...
echo        App will be available at http://127.0.0.1:8000
echo        Press Ctrl+C to stop the server.
echo.
echo ============================================
echo   Server is running!
echo   Open: http://127.0.0.1:8000
echo ============================================
echo.

php artisan serve
