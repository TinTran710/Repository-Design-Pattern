# Repository Design Pattern in Laravel
Repository design pattern tương tác với bảng Keyword trong database.

## Cài đặt
Sử dụng Fractal để xuất dữ liệu từ database sang view theo định dạng mong muốn

```
$ composer require league/fractal
```

Các hàm public của repository

```
// thêm từ khóa nếu chưa có, nếu có rồi thì cập nhật trust, không cập nhật source
$keyword_repository->creat($string, $source = 'manual', $trust = 1);
// lấy ra 10 từ khóa tìm được theo từ khóa cho trước
$keyword_repository->search($query, $page = 1; $limit = 10);
// sửa từ khóa
$keyword_repository->improve($old_keyword, $new_keyword, $source = 'manual', $trust = 1);
// Lấy ra danh sách
$keyword_repository->list($where, $page = 1; $limit = 10);
```
