-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2018 lúc 05:55 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websanpham32`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbchitiethoadon`
--

CREATE TABLE `tbchitiethoadon` (
  `id` int(11) NOT NULL,
  `mahd` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giamua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbchitiethoadon`
--

INSERT INTO `tbchitiethoadon` (`id`, `mahd`, `idsp`, `soluong`, `giamua`) VALUES
(3, 2, 1, 1, 5000000),
(4, 2, 2, 2, 20000),
(5, 3, 1, 1, 5000000),
(6, 3, 2, 2, 20000),
(7, 4, 1, 1, 5000000),
(8, 4, 2, 2, 20000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbhoadon`
--

CREATE TABLE `tbhoadon` (
  `mahd` int(11) NOT NULL,
  `tennguoimua` varchar(30) CHARACTER SET utf8 NOT NULL,
  `dienthoai` varchar(15) NOT NULL,
  `ngaydat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngaynhan` datetime NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbhoadon`
--

INSERT INTO `tbhoadon` (`mahd`, `tennguoimua`, `dienthoai`, `ngaydat`, `ngaynhan`, `trangthai`) VALUES
(2, 'abc19', '123456789', '2018-09-19 21:16:22', '2018-09-20 21:16:00', 0),
(3, 'abc19', '123456789', '2018-09-19 21:17:17', '2018-09-20 21:16:00', 1),
(4, 'abc20', '0912356004', '2018-09-19 21:17:47', '2018-09-20 21:17:00', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbloaitin`
--

CREATE TABLE `tbloaitin` (
  `LoaiTin` int(11) NOT NULL,
  `TenLoaiTin` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `Sothutu` int(11) DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbloaitin`
--

INSERT INTO `tbloaitin` (`LoaiTin`, `TenLoaiTin`, `Sothutu`, `TrangThai`) VALUES
(1, 'Thể Thao', NULL, NULL),
(2, 'Kinh tế', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbnhomsp`
--

CREATE TABLE `tbnhomsp` (
  `manhom` int(11) NOT NULL,
  `tennhom` varchar(200) CHARACTER SET utf8 NOT NULL,
  `sothutu` int(11) DEFAULT NULL,
  `trangthai` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbnhomsp`
--

INSERT INTO `tbnhomsp` (`manhom`, `tennhom`, `sothutu`, `trangthai`) VALUES
(1, 'Máy tính', 3, 0),
(2, 'Điện thoại', 2, 1),
(5, 'Đồng hồ', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbquantri`
--

CREATE TABLE `tbquantri` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(32) NOT NULL,
  `loai` tinyint(4) DEFAULT NULL,
  `trangthai` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbquantri`
--

INSERT INTO `tbquantri` (`id`, `taikhoan`, `matkhau`, `loai`, `trangthai`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(2, 'nhanvien', '202cb962ac59075b964b07152d234b70', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbsanpham`
--

CREATE TABLE `tbsanpham` (
  `id` int(11) NOT NULL,
  `masp` varchar(30) NOT NULL,
  `tensp` varchar(100) CHARACTER SET utf8 NOT NULL,
  `giasp` int(11) NOT NULL,
  `manhom` int(11) DEFAULT NULL,
  `hinhanh` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tomtat` text CHARACTER SET utf8,
  `noidung` text CHARACTER SET utf8,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbsanpham`
--

INSERT INTO `tbsanpham` (`id`, `masp`, `tensp`, `giasp`, `manhom`, `hinhanh`, `tomtat`, `noidung`, `trangthai`) VALUES
(1, 'sp01', 'Điện thoại iphone', 5000000, 2, 'iphone-8-plus-hh-600x600.jpg', '', '', 0),
(2, 'sp02', 'Máy tính 2', 2000000, 1, 'apple-macbook-pro-touch-mr9q2sa-a-2018-thumb-1-600x600.jpg', '', '', 1),
(3, 'SP04', 'Máy tính 1', 5000000, 1, 'apple-macbook-air-mqd32sa-a-i5-5350u-400-1-450x300-600x600.jpg', '', '', 1),
(4, 'SP05', 'Điện thoại 5', 12000000, 2, 'oppo-a3s-red-600x600.jpg', '', '', 1),
(6, 'SP053', 'Điện thoại 6', 10000000, 2, 'samsung-galaxy-s9-plus-64gb-xanh-san-ho-2-1-600x600.jpg', '', '', 1),
(7, 'SP054', 'Sản phẩm 54', 1000000, 5, 'TISSOT TRADITION T063.009.36.018.00.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbtintuc`
--

CREATE TABLE `tbtintuc` (
  `id` int(11) NOT NULL,
  `Tieude` varchar(200) CHARACTER SET utf8 NOT NULL,
  `TomTat` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `Noidung` text CHARACTER SET utf8,
  `Hinhanh` varchar(100) CHARACTER SET utf16 DEFAULT NULL,
  `TinNoiBat` tinyint(1) DEFAULT NULL,
  `LoaiTin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbtintuc`
--

INSERT INTO `tbtintuc` (`id`, `Tieude`, `TomTat`, `Noidung`, `Hinhanh`, `TinNoiBat`, `LoaiTin`) VALUES
(2, 'tiêu đề tin 1', 'Tóm tắt tin 1', 'Nội dung tin 1', 'ha_giang.PNG', 1, 1),
(3, 'tiêu đề tin 2', 'Tóm tắt tin 2', 'Nội dung tin 2', 'moc_chau.PNG', 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbchitiethoadon`
--
ALTER TABLE `tbchitiethoadon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_hd_sp` (`mahd`,`idsp`),
  ADD KEY `idsp` (`idsp`);

--
-- Chỉ mục cho bảng `tbhoadon`
--
ALTER TABLE `tbhoadon`
  ADD PRIMARY KEY (`mahd`);

--
-- Chỉ mục cho bảng `tbloaitin`
--
ALTER TABLE `tbloaitin`
  ADD PRIMARY KEY (`LoaiTin`);

--
-- Chỉ mục cho bảng `tbnhomsp`
--
ALTER TABLE `tbnhomsp`
  ADD PRIMARY KEY (`manhom`);

--
-- Chỉ mục cho bảng `tbquantri`
--
ALTER TABLE `tbquantri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taikhoan` (`taikhoan`);

--
-- Chỉ mục cho bảng `tbsanpham`
--
ALTER TABLE `tbsanpham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `masp_unique` (`masp`),
  ADD KEY `manhom` (`manhom`);

--
-- Chỉ mục cho bảng `tbtintuc`
--
ALTER TABLE `tbtintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LoaiTin` (`LoaiTin`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbchitiethoadon`
--
ALTER TABLE `tbchitiethoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbhoadon`
--
ALTER TABLE `tbhoadon`
  MODIFY `mahd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbloaitin`
--
ALTER TABLE `tbloaitin`
  MODIFY `LoaiTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbnhomsp`
--
ALTER TABLE `tbnhomsp`
  MODIFY `manhom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbquantri`
--
ALTER TABLE `tbquantri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbsanpham`
--
ALTER TABLE `tbsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbtintuc`
--
ALTER TABLE `tbtintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbchitiethoadon`
--
ALTER TABLE `tbchitiethoadon`
  ADD CONSTRAINT `tbchitiethoadon_ibfk_1` FOREIGN KEY (`mahd`) REFERENCES `tbhoadon` (`mahd`),
  ADD CONSTRAINT `tbchitiethoadon_ibfk_2` FOREIGN KEY (`idsp`) REFERENCES `tbsanpham` (`id`);

--
-- Các ràng buộc cho bảng `tbsanpham`
--
ALTER TABLE `tbsanpham`
  ADD CONSTRAINT `tbsanpham_ibfk_1` FOREIGN KEY (`manhom`) REFERENCES `tbnhomsp` (`manhom`);

--
-- Các ràng buộc cho bảng `tbtintuc`
--
ALTER TABLE `tbtintuc`
  ADD CONSTRAINT `tbtintuc_ibfk_1` FOREIGN KEY (`LoaiTin`) REFERENCES `tbloaitin` (`LoaiTin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
