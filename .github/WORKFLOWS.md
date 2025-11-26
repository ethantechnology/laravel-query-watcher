# GitHub Actions Workflows

This document describes the GitHub Actions workflows used in this package.

## 1. Update Packagist (`update-packagist.yml`)

### Purpose
Automatically notify Packagist to update the package when there are new changes.

### Triggers
- Push to `main` branch
- New tags (v*)
- Published releases

### Required Secrets

To enable this workflow, you need to add 2 secrets to your GitHub repository:

1. Go to: `https://github.com/ethantechnology/laravel-query-watcher/settings/secrets/actions`

2. Add the following secrets:
   - `PACKAGIST_USERNAME`: Your Packagist username
   - `PACKAGIST_TOKEN`: API token from Packagist

### Getting Packagist API Token

1. Login to https://packagist.org/
2. Go to **Profile** > **Show API Token**
3. Copy the token and add it to GitHub secrets

---

## 2. Run Tests (`tests.yml`)

### Purpose
Test the package with multiple PHP and Laravel versions.

### Test Matrix
- **PHP**: 7.2, 7.3, 7.4, 8.0, 8.1, 8.2, 8.3
- **Laravel**: 5.8, 6.x, 7.x, 8.x, 9.x, 10.x, 11.x

### Triggers
- Push to `main` branch
- Pull requests

---

## How to Add GitHub Secrets

### Step 1: Get API Token from Packagist
```bash
# Login to packagist.org
# Go to: https://packagist.org/profile
# Click "Show API Token"
# Copy the token
```

### Step 2: Add to GitHub
1. Open repository: https://github.com/ethantechnology/laravel-query-watcher
2. Go to **Settings** > **Secrets and variables** > **Actions**
3. Click **New repository secret**
4. Add:
   - Name: `PACKAGIST_USERNAME`
   - Value: Your Packagist username
5. Click **Add secret**
6. Repeat for:
   - Name: `PACKAGIST_TOKEN`
   - Value: The API token you copied

### Step 3: Verify
Push a new commit or create a tag to test the workflow:
```bash
git add .
git commit -m "Test workflow"
git push origin main
```

Check the workflow at: `https://github.com/ethantechnology/laravel-query-watcher/actions`

---

## Workflow Status Badges

Add badges to README.md:

```markdown
[![Update Packagist](https://github.com/ethantechnology/laravel-query-watcher/workflows/Update%20Packagist/badge.svg)](https://github.com/ethantechnology/laravel-query-watcher/actions)
[![Tests](https://github.com/ethantechnology/laravel-query-watcher/workflows/Run%20Tests/badge.svg)](https://github.com/ethantechnology/laravel-query-watcher/actions)
```
