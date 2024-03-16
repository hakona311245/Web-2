CREATE TABLE TaiKhoanNhanVien (
    staff_id INT(10) PRIMARY KEY not null AUTO_INCREMENT,
    staff_name VARCHAR(100) not null,
    phone VARCHAR(10) not null,
    email VARCHAR(100) not null,
    address VARCHAR(255) not null,
    role varchar(20) not null,
    create_at datetime 
);
