# Portfolio Deployment Guide

## 🚀 Railway Deployment (Recommended)

### Prerequisites
- GitHub account
- Railway.app account (free)

### Step-by-Step Deployment

#### 1. Prepare Your Code
```bash
# Make sure all changes are committed
git add .
git commit -m "Ready for deployment"
git push origin main
```

#### 2. Railway Setup
1. Go to https://railway.app
2. Click "Start a New Project"
3. Choose "Deploy from GitHub repo"
4. Select your repository
5. Railway will auto-detect Laravel

#### 3. Add MySQL Database
1. In your Railway project, click "New"
2. Select "Database" > "Add MySQL"
3. Railway will automatically provide connection details

#### 4. Configure Environment Variables
In Railway dashboard, go to Variables tab and add:

```env
APP_NAME=YourPortfolio
APP_ENV=production
APP_KEY=                    # Generate with: php artisan key:generate --show
APP_DEBUG=false
APP_URL=https://your-project.up.railway.app

DB_CONNECTION=mysql
DB_HOST=${{MYSQL_HOST}}
DB_PORT=${{MYSQL_PORT}}
DB_DATABASE=${{MYSQL_DATABASE}}
DB_USERNAME=${{MYSQL_USER}}
DB_PASSWORD=${{MYSQL_PASSWORD}}

PORTFOLIO_OWNER_USER_ID=1
```

#### 5. Deploy
- Railway automatically deploys on every git push
- First deployment may take 5-10 minutes
- Check logs in Railway dashboard

### 🔑 Generate APP_KEY
```bash
php artisan key:generate --show
```
Copy the output and paste in Railway's APP_KEY variable.

### 📊 After Deployment
Your site will be live at: `https://your-project.up.railway.app`

### 🔒 Security Checklist
- ✅ APP_DEBUG=false
- ✅ Strong database password
- ✅ APP_KEY is set
- ✅ .env not in git

### 🐛 Troubleshooting

**Database Connection Error:**
- Verify MySQL service is running in Railway
- Check environment variables match

**500 Error:**
- Check Railway logs
- Ensure APP_KEY is set
- Run migrations: `php artisan migrate --force`

**Assets not loading:**
- Verify APP_URL matches your domain
- Clear cache: `php artisan optimize:clear`

### 📝 Update Your Site
```bash
# Make changes
git add .
git commit -m "Your update message"
git push origin main
# Railway auto-deploys
```

### 🆓 Cost
- Railway Free Plan: 500 hours/month
- Perfect for portfolios and small projects

---

## 🌐 Custom Domain (Optional)

1. In Railway dashboard, go to Settings
2. Add your custom domain
3. Update DNS records with provided values
4. Wait for DNS propagation (5-30 minutes)

---

## 📧 Support
For Railway issues: https://railway.app/help
For Laravel issues: https://laravel.com/docs
