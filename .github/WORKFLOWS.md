# GitHub Actions Workflows

Tài liệu này mô tả các GitHub Actions workflows được sử dụng trong package.

## 1. Update Packagist (`update-packagist.yml`)

### Mục đích
Tự động thông báo cho Packagist cập nhật package khi có thay đổi mới.

### Kích hoạt khi
- Push lên branch `main`
- Tạo tag mới (v*)
- Publish release mới

### Cấu hình Secrets

Để workflow hoạt động, bạn cần thêm 2 secrets vào GitHub repository:

1. Truy cập: `https://github.com/ethantechnology/laravel-query-watcher/settings/secrets/actions`

2. Thêm secrets:
   - `PACKAGIST_USERNAME`: Username Packagist của bạn
   - `PACKAGIST_TOKEN`: API token từ Packagist

### Lấy Packagist API Token

1. Đăng nhập vào https://packagist.org/
2. Vào **Profile** > **Show API Token**
3. Copy token và thêm vào GitHub secrets

---

## 2. Run Tests (`tests.yml`)

### Mục đích
Kiểm tra package hoạt động với nhiều phiên bản PHP và Laravel khác nhau.

### Test Matrix
- **PHP**: 7.2, 7.3, 7.4, 8.0, 8.1, 8.2, 8.3
- **Laravel**: 5.8, 6.x, 7.x, 8.x, 9.x, 10.x, 11.x

### Kích hoạt khi
- Push lên branch `main`
- Tạo Pull Request

---

## Cách thêm GitHub Secrets

### Bước 1: Lấy API Token từ Packagist
```bash
# Đăng nhập vào packagist.org
# Vào: https://packagist.org/profile
# Click "Show API Token"
# Copy token
```

### Bước 2: Thêm vào GitHub
1. Mở repository: https://github.com/ethantechnology/laravel-query-watcher
2. Vào **Settings** > **Secrets and variables** > **Actions**
3. Click **New repository secret**
4. Thêm:
   - Name: `PACKAGIST_USERNAME`
   - Value: username Packagist của bạn
5. Click **Add secret**
6. Lặp lại cho:
   - Name: `PACKAGIST_TOKEN`
   - Value: API token vừa copy

### Bước 3: Kiểm tra
Push một commit mới hoặc tạo tag để test workflow:
```bash
git add .
git commit -m "Test workflow"
git push origin main
```

Kiểm tra tại: `https://github.com/ethantechnology/laravel-query-watcher/actions`

---

## Workflow Status Badges

Thêm badges vào README.md:

```markdown
[![Update Packagist](https://github.com/ethantechnology/laravel-query-watcher/workflows/Update%20Packagist/badge.svg)](https://github.com/ethantechnology/laravel-query-watcher/actions)
[![Tests](https://github.com/ethantechnology/laravel-query-watcher/workflows/Run%20Tests/badge.svg)](https://github.com/ethantechnology/laravel-query-watcher/actions)
```
