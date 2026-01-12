#!/bin/bash

echo "🚀 Preparing for deployment..."

# 1. Clear all caches
echo "📦 Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# 2. Run optimizations
echo "⚡ Running optimizations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. Check if composer packages are up to date
echo "📚 Checking dependencies..."
composer install --optimize-autoloader --no-dev

# 4. Generate production assets
echo "🎨 Checking assets..."
if [ -f "package.json" ]; then
    npm run build 2>/dev/null || echo "⚠️  No build script found"
fi

echo "✅ Deployment preparation complete!"
echo ""
echo "📝 Next steps:"
echo "1. Commit your changes: git add . && git commit -m 'Ready for deployment'"
echo "2. Push to GitHub: git push origin main"
echo "3. Configure Railway (see DEPLOYMENT.md)"
