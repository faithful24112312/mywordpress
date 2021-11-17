-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2021 lúc 05:01 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `mabl` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`mabl`, `masp`, `makh`, `ngaybl`, `noidung`) VALUES
(1, 3, 7, '2020-08-14', ' quán làm nước uống rất ngon'),
(2, 4, 7, '2020-08-14', ' quán làm nước uống rất ngon '),
(3, 3, 5, '2020-08-14', 'quán làm nước uống rất ngon'),
(4, 3, 5, '2020-08-14', '  thái dộ  phục vụ tốt'),
(5, 3, 5, '2020-08-14', '  thái dộ  phục vụ tốt'),
(6, 3, 5, '2020-08-14', '  thái dộ  phục vụ tốt'),
(7, 3, 5, '2020-08-14', '  lịch sự với khách hàng'),
(8, 3, 5, '2020-08-14', '  lịch sự với khách hàng'),
(9, 3, 5, '2020-08-14', '  lịch sự với khách hàng'),
(10, 3, 5, '2020-08-14', '  hi'),
(11, 3, 5, '2020-08-14', '  hi'),
(12, 3, 5, '2020-08-14', '  hello'),
(13, 3, 5, '2020-08-14', '  holle'),
(14, 3, 5, '2020-08-14', '  nkho'),
(15, 3, 5, '2020-08-14', '  kjhjhukkjkjhjhhgfhg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `size` varchar(5) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`masohd`, `masp`, `soluongmua`, `size`, `thanhtien`, `tinhtrang`) VALUES
(1, 3, 1, 'S', 10000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(1, 1, '2021-08-13', 10000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `vaitro` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`, `vaitro`) VALUES
(1, 'tri', 'tri', '202cb962ac59075b964b07152d234b70', 'a@gmail.com', '', '', 0),
(2, 'ton', 'ton', '202cb962ac59075b964b07152d234b70', 'a@gmail.com', '', '', 0),
(3, 'trường', 'truong', '202cb962ac59075b964b07152d234b70', 'an@gmail.com', '', '', 0),
(4, 'an', 'an', '202cb962ac59075b964b07152d234b70', 'an@gmail.com', '', '', 0),
(5, 'Nguyên', 'nguyen', '202cb962ac59075b964b07152d234b70', 'nguyen@gmail.com', '', '', 0),
(8, 'dang', 'yt', '202cb962ac59075b964b07152d234b70', 'dangtri01695051040@gmail.com', 'an hoa', '0395051040', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
(1, 'nước chai'),
(3, 'cà phê'),
(4, 'trà sửa'),
(5, 'rượu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `maloai` int(11) NOT NULL,
  `tensp` varchar(60) NOT NULL,
  `size` varchar(5) NOT NULL,
  `dongia` float NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `ngaylap` date NOT NULL,
  `nhom` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `maloai`, `tensp`, `size`, `dongia`, `mota`, `hinh`, `ngaylap`, `nhom`) VALUES
(1, 1, '7 up', 'S', 10000, '10000', '1.jpg', '2020-08-08', 0),
(2, 1, 'boganic', 'S', 10000, '10000', '2.jpg', '2020-08-08', 0),
(3, 1, 'c2', 'S', 10000, '10000', '3.jpg', '2020-08-08', 0),
(4, 1, 'coca', 'S', 10000, '10000', '4.jpg', '2020-08-08', 0),
(5, 1, 'cocktail', 'S', 10000, '10000', '5.jpg', '2020-08-08', 0),
(6, 1, 'compact', 'S', 10000, '10000', '6.jpg', '2020-08-08', 0),
(7, 1, 'lipton', 'S', 10000, '10000', '7.jpg', '2020-08-08', 0),
(8, 1, 'mirinda', 'S', 10000, '10000', '8.jpg', '2020-08-08', 0),
(9, 1, 'pepsi', 'S', 10000, '10000', '9.jpg', '2020-08-08', 0),
(10, 1, 'redbull', 'S', 10000, '10000', '10.jpg', '2020-08-08', 0),
(11, 1, 'rồng đỏ', 'S', 10000, '10000', '11.jpg', '2020-08-08', 0),
(12, 1, 'sting', 'S', 10000, '10000', '12.jpg', '2020-08-08', 0),
(13, 1, 'weke-up 247', 'S', 10000, '10000', '13.jpg', '2020-08-08', 0),
(14, 1, 'warrior', 'S', 10000, '10000', '14.jpg', '2020-08-08', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`mabl`),
  ADD KEY `fk_bl_mahh` (`masp`),
  ADD KEY `fk_bl_kh` (`makh`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`masohd`,`masp`),
  ADD KEY `fk_cthd_masp` (`masp`) USING BTREE;

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`masohd`),
  ADD KEY `fk_hoadon_kh` (`makh`) USING BTREE;

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `FK_hanghoa_maloai` (`maloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `fk_cthd_mahd` FOREIGN KEY (`masohd`) REFERENCES `hoadon` (`masohd`),
  ADD CONSTRAINT `fk_cthd_masp` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hoadon_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sanpham_maloai` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
