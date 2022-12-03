-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 04:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `id_cthd` int(20) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `id_hd` int(20) NOT NULL,
  `id_sp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id_kh` int(20) NOT NULL,
  `id_sp` int(20) NOT NULL,
  `sl` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hd` int(20) NOT NULL,
  `ngaythanhtoan` date NOT NULL,
  `tongtien` int(11) NOT NULL,
  `id_kh` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` int(20) NOT NULL,
  `ten_kh` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email_kh` varchar(255) NOT NULL,
  `gioitinh` varchar(10) NOT NULL,
  `matkhau_kh` varchar(20) NOT NULL,
  `anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `id_lsp` int(20) NOT NULL,
  `ten_lsp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`id_lsp`, `ten_lsp`) VALUES
(1, 'T-shirt'),
(2, 'Hoodie'),
(3, 'Shirt'),
(4, 'Cardigan'),
(5, 'Jacket'),
(6, 'Pants\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(20) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `gia` int(10) NOT NULL,
  `sl` int(5) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `id_lsp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten`, `gia`, `sl`, `mota`, `anh`, `id_lsp`) VALUES
(1, 'MadmonksD White Tee', 250000, 10, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '1.jpg', 1),
(2, 'Cardigan D', 300000, 3, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '2.jpg', 4),
(3, 'Quần đơn giản', 200000, 8, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '3.jpg', 6),
(4, 'Áo trắng đơn giản', 150000, 20, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '4.jpg', 1),
(5, 'Quần túi hộp đen', 250000, 15, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '5.jpg', 6),
(6, 'Áo khoác da', 400000, 6, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '6.jpg', 5),
(7, 'Áo Xoài khủng long', 150000, 20, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '7.jpg', 1),
(8, 'Hoodie Xoài nhí nhố', 350000, 15, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '8.jpg', 2),
(11, 'Madmonks Green Tee', 270000, 5, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '9.jpg', 1),
(12, 'Madmonks Black Tee', 270000, 7, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '10.jpg', 1),
(13, 'Madmonks Alligator Vintage Tee', 300000, 4, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '11.jpg', 1),
(14, 'Áo thun basic đen', 150000, 9, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '12.jpg', 1),
(15, 'Áo Xấu lên bờ Green', 200000, 10, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '13.jpg', 1),
(16, 'Áo tay dài căn bản đen', 170000, 15, '+ CHÍNH SÁCH ĐỔI SẢN PHẨM:\r\n\r\n1.Điều kiện đổi hàng\r\n\r\n- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.\r\n\r\n- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.\r\n\r\n- Tất cả sản phẩm đã mua sẽ không được ', '14.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ten_user` varchar(225) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `matkhau_user` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`id_cthd`),
  ADD KEY `id_hd` (`id_hd`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD KEY `ten_kh` (`id_kh`,`id_sp`),
  ADD KEY `fk_gh_sp` (`id_sp`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `ten_kh` (`id_kh`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`id_lsp`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_lsp` (`id_lsp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ten_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `id_cthd` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hd` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_kh` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `id_lsp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `fk_cthd_hd` FOREIGN KEY (`id_hd`) REFERENCES `hoadon` (`id_hd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cthd_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_gh_kh` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gh_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hd_kh` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_lsp` FOREIGN KEY (`id_lsp`) REFERENCES `loaisp` (`id_lsp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
