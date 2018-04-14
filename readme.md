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

`$where` dạng array, xem định dạng `$where` hỗ trợ bởi [builder](https://github.com/laravel/framework/blob/5.5/src/Illuminate/Database/Eloquent/Builder.php#L219)

**ví dụ:**

```
$where = [
    ['trust', ">", 1],
    ['trust', "<", 5]
];
