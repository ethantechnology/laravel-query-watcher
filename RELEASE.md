# Release Guide

## Version 1.0.0 Released! 🎉

### Package Information
- **Name**: `eta/laravel-query-watcher`
- **Version**: v1.0.0
- **Git Repository**: git@github.com:ethantechnology/laravel-query-watcher.git

### Quick Commands

#### Push code and tag to GitHub
```bash
cd e:\code\eta\packages\laravel-query-watcher

# Push main branch
git push -u origin main

# Push the v1.0.0 tag
git push origin v1.0.0
```

#### Verify tag on GitHub
After pushing, check:
- https://github.com/ethantechnology/laravel-query-watcher/tags
- https://github.com/ethantechnology/laravel-query-watcher/releases

---

## Publishing to Packagist

### Step 1: Submit to Packagist
1. Visit https://packagist.org/
2. Login or register an account
3. Click **"Submit"** in the top menu
4. Enter repository URL: `https://github.com/ethantechnology/laravel-query-watcher`
5. Click **"Check"** then **"Submit"**

### Step 2: Set up Auto-Update
1. Go to your GitHub repository settings
2. Navigate to **Webhooks** > **Add webhook**
3. Payload URL: Get from Packagist package page
4. Content type: `application/json`
5. Events: Select **"Just the push event"**
6. Save webhook

### Step 3: Verify Installation
Test installation in a Laravel project:
```bash
composer require eta/laravel-query-watcher
```

---

## Creating Future Releases

### For Bug Fixes (Patch Version)
```bash
# Make your changes
git add .
git commit -m "Fix: description of bug fix"

# Create patch tag (1.0.1, 1.0.2, etc.)
git tag -a v1.0.1 -m "Patch release: bug fixes"
git push origin main
git push origin v1.0.1
```

### For New Features (Minor Version)
```bash
# Make your changes
git add .
git commit -m "Feature: description of new feature"

# Create minor tag (1.1.0, 1.2.0, etc.)
git tag -a v1.1.0 -m "Minor release: new features"
git push origin main
git push origin v1.1.0
```

### For Breaking Changes (Major Version)
```bash
# Make your changes
git add .
git commit -m "Breaking: description of breaking change"

# Create major tag (2.0.0, 3.0.0, etc.)
git tag -a v2.0.0 -m "Major release: breaking changes"
git push origin main
git push origin v2.0.0
```

---

## Version Management

### Current Version: 1.0.0
- ✅ Laravel 5.8 - 11.x support
- ✅ PHP 7.2 - 8.3 support
- ✅ Backward compatible
- ✅ Production ready

### Semantic Versioning
This package follows [Semantic Versioning](https://semver.org/):
- **MAJOR** (1.x.x): Breaking changes
- **MINOR** (x.1.x): New features, backward compatible
- **PATCH** (x.x.1): Bug fixes, backward compatible

---

## Badge for README (Optional)

Add these badges to your README.md:

```markdown
[![Latest Version](https://img.shields.io/packagist/v/eta/laravel-query-watcher.svg)](https://packagist.org/packages/eta/laravel-query-watcher)
[![Total Downloads](https://img.shields.io/packagist/dt/eta/laravel-query-watcher.svg)](https://packagist.org/packages/eta/laravel-query-watcher)
[![License](https://img.shields.io/packagist/l/eta/laravel-query-watcher.svg)](https://packagist.org/packages/eta/laravel-query-watcher)
```

---

## Checklist Before Publishing

- [x] Code tested across multiple Laravel versions
- [x] Vendor name updated to "eta"
- [x] Author information updated
- [x] Version tagged (v1.0.0)
- [ ] Code pushed to GitHub
- [ ] Tag pushed to GitHub  
- [ ] Package submitted to Packagist
- [ ] Auto-update webhook configured
- [ ] Installation tested from Packagist

---

## Support & Maintenance

- **Issues**: https://github.com/ethantechnology/laravel-query-watcher/issues
- **Email**: support@ethan-tech.com
- **Maintainer**: HaiHV
