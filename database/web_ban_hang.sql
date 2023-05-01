-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 30, 2022 lúc 05:55 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_ban_hang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `status`) VALUES
('admin', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `status`) VALUES
(2, 'NIKE', 1),
(3, 'ADIDAS', 1),
(4, 'PUMA', 1),
(5, 'MIZUNO', 1),
(6, 'ASICS', 1),
(7, 'KAMITO', 1),
(8, 'X-MUNICH', 0),
(9, 'giày trẻ em', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` tinytext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: chưa xử lý; \r\n1: đã xử lý;\r\n2: đã xóa;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `memberid`, `productid`, `date`, `content`, `status`) VALUES
(1, 1, 3, '2022-05-08 15:35:04', 'sản phẩm này chất lượng quá', 2),
(2, 1, 1, '2022-05-08 15:36:34', 'form giày đẹp quá', 1),
(3, 1, 27, '2022-05-08 15:41:50', 'đôi này rẻ mà chất lượng quá', 1),
(4, 1, 10, '2022-05-08 15:42:23', 'đã mua và rất thích sản phẩm này', 1),
(5, 1, 8, '2022-05-08 15:44:28', 'vừa chấn lắm shop', 1),
(6, 2, 2, '2022-05-08 16:00:23', 'sản phẩm vừa chân', 0),
(9, 1, 3, '2022-05-17 20:45:25', 'sản phẩm đỉnh quá', 0),
(10, 10, 1, '2022-05-30 20:33:35', 'đỉnh thật sự\r\n', 0),
(11, 1, 7, '2022-06-03 09:21:38', 'ddepj qua', 0),
(12, 10, 1, '2022-06-03 09:23:44', 'dep', 0),
(13, 10, 2, '2022-06-03 09:25:45', 'dda dung va rat tot', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_product`
--

CREATE TABLE `img_product` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `img_product`
--

INSERT INTO `img_product` (`id`, `productid`, `image`) VALUES
(1, 1, '1.1.webp'),
(2, 1, '1.2.webp'),
(3, 1, '1.3.webp'),
(4, 1, '1.4.webp'),
(5, 2, '2.1.webp'),
(6, 2, '2.2.webp'),
(7, 2, '2.3.webp'),
(8, 2, '2.4.webp'),
(9, 3, '3.5.webp'),
(10, 3, '3.2.webp'),
(11, 3, '3.3.webp'),
(12, 3, '3.4.webp'),
(13, 4, '4.1.webp'),
(14, 4, '4.2.webp'),
(15, 4, '4.3.webp'),
(16, 4, '4.4.webp'),
(17, 5, '5.1.webp'),
(18, 5, '5.2.webp'),
(19, 5, '5.3.webp'),
(20, 5, '5.4.webp'),
(21, 6, '6.1.webp'),
(22, 6, '6.2.webp'),
(23, 6, '6.3.webp'),
(24, 6, '6.4.webp'),
(25, 7, '7.1.webp'),
(26, 7, '7.2.webp'),
(27, 7, '7.3.webp'),
(28, 7, '7.4.webp'),
(29, 8, '8.1.webp'),
(30, 8, '8.2.webp'),
(31, 8, '8.3.webp'),
(32, 8, '8.4.webp'),
(33, 9, '9.1.webp'),
(34, 9, '9.2.webp'),
(35, 9, '9.3.webp'),
(36, 9, '9.4.webp'),
(37, 10, '10.1.webp'),
(38, 10, '10.2.webp'),
(39, 10, '10.3.webp'),
(40, 10, '10.4.webp'),
(41, 11, '11.1.webp'),
(42, 11, '11.2.webp'),
(43, 11, '11.3.webp'),
(44, 11, '11.4.webp'),
(45, 12, '12.1.webp'),
(46, 12, '12.2.webp'),
(47, 12, '12.3.webp'),
(48, 12, '12.4.webp'),
(49, 13, '13.1.webp'),
(50, 13, '13.2.webp'),
(51, 13, '13.3.webp'),
(52, 13, '13.4.webp'),
(53, 14, '14.1.webp'),
(54, 14, '14.2.webp'),
(55, 14, '14.3.webp'),
(56, 14, '14.4.webp'),
(57, 15, '15.1.webp'),
(58, 15, '15.2.webp'),
(59, 15, '15.3.webp'),
(60, 15, '15.4.webp'),
(61, 16, '16.1.webp'),
(62, 16, '16.2.webp'),
(63, 16, '16.3.webp'),
(64, 16, '16.4.webp'),
(65, 17, '17.1.webp'),
(66, 17, '17.2.webp'),
(67, 17, '17.3.webp'),
(68, 17, '17.4.webp'),
(69, 18, '18.1.webp'),
(70, 18, '18.2.webp'),
(71, 18, '18.3.webp'),
(72, 18, '18.4.webp'),
(73, 19, '19.1.webp'),
(74, 19, '19.2.webp'),
(75, 19, '19.3.webp'),
(76, 19, '19.4.webp'),
(77, 20, '20.1.webp'),
(78, 20, '20.2.webp'),
(79, 20, '20.3.webp'),
(80, 20, '20.4.webp'),
(81, 21, '21.1.webp'),
(82, 21, '21.2.webp'),
(83, 21, '21.3.webp'),
(84, 21, '21.4.webp'),
(85, 22, '22.1.webp'),
(86, 22, '22.2.webp'),
(87, 22, '22.3.webp'),
(88, 22, '22.4.webp'),
(89, 23, '23.1.webp'),
(90, 23, '23.2.webp'),
(91, 23, '23.3.webp'),
(92, 23, '23.4.webp'),
(93, 24, '24.1.webp'),
(94, 24, '24.2.webp'),
(95, 24, '24.3.webp'),
(96, 24, '24.4.webp'),
(97, 25, '25.1.webp'),
(98, 25, '25.2.webp'),
(99, 25, '25.3.webp'),
(100, 25, '25.4.webp'),
(101, 26, '26.1.webp'),
(102, 26, '26.2.webp'),
(103, 26, '26.3.webp'),
(104, 26, '26.4.webp'),
(105, 27, '27.1.webp'),
(106, 27, '27.2.webp'),
(107, 27, '27.3.webp'),
(108, 27, '27.4.webp'),
(109, 28, '28.1.webp'),
(110, 28, '28.2.webp'),
(111, 28, '28.3.webp'),
(112, 28, '28.4.webp'),
(113, 29, '29.1.webp'),
(114, 29, '29.2.webp'),
(115, 29, '29.3.webp'),
(116, 29, '29.4.webp'),
(133, 30, '1.1.webp'),
(134, 30, '1.2.webp'),
(135, 30, '1.jpg'),
(136, 30, '1.4.webp'),
(137, 37, '1.1.webp'),
(138, 37, '1.2.webp'),
(139, 37, '1.3.webp'),
(140, 37, '1.4.webp'),
(145, 41, '14.2.webp'),
(146, 41, '18.3.webp'),
(147, 41, '18.4.webp'),
(148, 41, '23.4.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT ' 1: đã kích hoạt; 2: đã khóa\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `fullname`, `mobile`, `email`, `address`, `status`) VALUES
(1, 'truong', '123', 'Ngô Văn Hải Trường', '0388549606', 'truong@gmail.com', 'Hà Lam - Thăng Bình - Quảng nam', 1),
(2, 'thang', '123', 'Ngô Văn Thắng', '0373705810', 'thang@gmail.com', 'Đà nẵng', 1),
(3, 'thai', '123', 'Trần Viết Thái', '0845333111', 'thai@gmail.com', 'Đà Nẵng', 1),
(4, 'nga', '123', 'Nguyễn Thị Hồng Nga', '0917437123', 'nga@gmail.com', 'Bình trung Thăng Bình Quảng Nam', 1),
(5, 'thong', '123', 'Bùi Truyền Thống', '0845333111', 'thong@gmail.com', 'Quảng Bình', 1),
(6, 'duc', '123', 'Nguyễn Công Đức', '0376473845', 'duc@gmail.com', 'Quảng Nam\r\n', 2),
(10, 'an', '123', 'Huỳnh Nguyễn Hoài Nga', '0388549606', 'an@gmail.com', 'Quảng Nam', 1),
(12, 'anh', '123', 'Nguyễn văn Anh', '0843007232', 'an@gmail.com', 'Quảng Nam', 2),
(17, 'tuananh', '123', 'Nguyễn Tuấn Anh', '0917437123', 'tuananh@gmail.com', 'Thái Bình', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `productid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`productid`, `orderid`, `number`, `price`) VALUES
(1, 1, 1, 4990000),
(9, 1, 1, 3950000),
(2, 3, 1, 3200000),
(27, 3, 1, 690000),
(10, 3, 2, 1399000),
(7, 4, 2, 2150000),
(19, 4, 1, 1750000),
(1, 5, 2, 4990000),
(2, 5, 1, 3200000),
(1, 6, 1, 4990000),
(2, 6, 1, 3200000),
(1, 8, 2, 4990000),
(7, 8, 3, 2150000),
(7, 9, 1, 2150000),
(1, 9, 4, 4990000),
(4, 9, 1, 3950000),
(8, 9, 1, 4500000),
(9, 9, 1, 3950000),
(3, 9, 1, 1750000),
(37, 10, 1, 1399000),
(1, 11, 1, 4990000),
(8, 11, 1, 4500000),
(14, 11, 1, 3690000),
(10, 11, 1, 1399000),
(27, 11, 2, 690000),
(5, 13, 2, 2790000),
(25, 13, 1, 3450000),
(1, 14, 1, 4990000),
(14, 14, 1, 3690000),
(3, 15, 1, 1750000),
(27, 16, 3, 690000),
(8, 16, 1, 4500000),
(10, 19, 1, 1399000),
(8, 19, 1, 4500000),
(1, 19, 1, 4990000),
(7, 19, 1, 2150000),
(8, 27, 1, 4500000),
(17, 27, 1, 1390000),
(2, 31, 2, 3200000),
(10, 31, 1, 1399000),
(3, 33, 2, 1750000),
(1, 34, 4, 4990000),
(2, 34, 1, 3200000),
(6, 34, 1, 690000),
(3, 34, 2, 1750000),
(18, 40, 1, 690000),
(6, 41, 1, 690000),
(7, 43, 2, 2150000),
(15, 44, 2, 3890000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ordermethodid` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Chưa xử lý; 2: Đang xử lý; 3: Đã xử lý; 4: Hủy',
  `name` varchar(30) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `note` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `ordermethodid`, `memberid`, `orderdate`, `status`, `name`, `address`, `mobile`, `email`, `note`) VALUES
(1, 1, 4, '2022-04-14 22:25:49', 3, 'Nguyễn Thị Hồng Nga', 'Bình trung Thăng Bình Quảng Nam', '0917437123', 'nga@gmail.com', 'gửi giờ hành chính\r\n'),
(3, 1, 2, '2022-04-14 22:27:44', 3, 'Ngô Văn Thắng', 'Đà nẵng', '0373705810', 'thang@gmail.com', 'nhanh chóng giao hàng\r\n'),
(4, 3, 1, '2022-04-24 20:42:54', 4, 'Nguyễn Thị Hải', 'Hà Lam - Thăng Bình - Quảng nam', '0388549606', 'truong@gmail.com', 'Ghi chú'),
(5, 1, 1, '2022-04-26 14:06:33', 2, 'Ngô Văn Hải Trường', 'Hà Lam - Thăng Bình - Quảng nam', '0388549606', 'truong@gmail.com', ''),
(6, 1, 1, '2022-04-26 14:26:43', 2, 'Ngô Văn Hải Trường', 'Hà Lam - Thăng Bình - Quảng nam', '0388549606', 'truong@gmail.com', ''),
(7, 3, 1, '2022-04-26 14:27:15', 3, 'Ngô Văn Hải Trường', 'Hà Lam - Thăng Bình - Quảng nam', '0388549606', 'truong@gmail.com', ''),
(8, 1, 1, '2022-04-26 14:28:27', 3, 'Nguyễn A', 'Hà Lam - Thăng Bình - Quảng nam', '0388549606', 'truong@gmail.com', 'note'),
(9, 1, 1, '2022-04-26 14:49:35', 2, 'Ngô Văn Hải Trường', 'Hà Lam - Thăng Bình - Quảng nam', '0388549606', 'truong@gmail.com', ''),
(10, 1, 2, '2022-04-30 09:07:04', 3, 'Nguyễn Văn Thắng', 'Quảng Nam', '0373705810', 'thang@gmail.com', ''),
(11, 3, 5, '2022-04-30 12:49:39', 3, 'Nguyễn Thị Anh', 'Đà Nẵng', '0373893375', 'nguyen@gmail.com', 'Người thân nhận hàng giúp'),
(13, 1, 1, '2022-05-07 12:47:19', 3, 'Nguyễn Thị hải', 'Hà Lam - Thăng Bình - Quảng nam', '0388549606', 'truong@gmail.com', ''),
(14, 1, 6, '2022-05-07 17:04:31', 3, 'Nguyễn Công Đức', 'Quảng Nam\r\n', '0376473845', 'duc@gmail.com', 'không có ghi chú'),
(15, 1, 3, '2022-05-13 21:47:26', 3, 'Trần Viết Thái', 'Đà Nẵng', '0845333111', 'thai@gmail.com', ''),
(16, 1, 10, '2022-05-14 16:43:41', 3, 'Huỳnh Nguyễn Hoài An', 'Quảng Nam', '0388549606', 'an@gmail.com', ''),
(19, 1, 2, '2022-05-16 15:56:34', 4, 'Ngô Văn Thắng', 'Đà nẵng', '0373705810', 'thang@gmail.com', ''),
(27, 1, 2, '2022-05-18 21:48:20', 3, 'Ngô Văn Thắng', 'Đà nẵng', '0373705810', 'thang@gmail.com', ''),
(31, 1, 1, '2022-05-19 13:56:17', 4, 'Ngô Văn Hải Trường', 'Hà Lam - Thăng Bình - Quảng nam', '0388549606', 'truong@gmail.com', ''),
(33, 1, 10, '2022-05-30 20:18:22', 1, 'Huỳnh Nguyễn Hoài An', 'Quảng Nam', '0388549606', 'an@gmail.com', ''),
(34, 1, 1, '2022-06-02 16:24:13', 1, 'Ngô Văn Hải Trường', 'Hà Lam - Thăng Bình - Quảng nam', '0388549606', 'truong@gmail.com', ''),
(40, 1, 2, '2022-06-03 09:42:21', 1, 'Ngô Văn Thắng', 'Đà nẵng', '0373705810', 'thang@gmail.com', 'ne'),
(41, 1, 17, '2022-06-03 10:21:12', 1, 'Nguyễn Tuấn Anh', 'Thái Bình', '0917437123', 'tuananh@gmail.com', ''),
(43, 1, 10, '2022-06-07 14:09:52', 1, 'Huỳnh Nguyễn Hoài An', 'Quảng Nam', '0388549606', 'an@gmail.com', ''),
(44, 1, 1, '2022-06-07 14:20:48', 1, 'Ngô Văn Hải Trường', 'Hà Lam - Thăng Bình - Quảng nam', '0388549606', 'truong@gmail.com', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordersmethods`
--

CREATE TABLE `ordersmethods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ordersmethods`
--

INSERT INTO `ordersmethods` (`id`, `name`, `status`) VALUES
(1, 'Trực tiếp cho người giao hàng', 1),
(2, 'Chuyển khoản qua thẻ ATM', 1),
(3, 'Chuyển khoản qua MOMO', 1),
(4, 'Thanh toán bằng thẻ tín dụng', 1),
(5, 'Thanh toán tại cửa hàng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `thongso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `brandid`, `name`, `price`, `image`, `description`, `status`, `thongso`) VALUES
(1, 2, 'NIKE TIEMPO LEGEND 9 ELITE FG RAWDACIOUS - WHITE/BRIGHT CRIMSON/PINK BLAST', 4990000, '1.webp', '<p>Nike Tiempo Legend 9 Elite FG Rawdacious - White/Bright Crimson/Pink Blast l&agrave; phi&ecirc;n bản gi&agrave;y cao cấp d&agrave;nh chuy&ecirc;n cho s&acirc;n cỏ tự nhi&ecirc;n 11 người. Nằm trong Bộ sưu tập &#39;Rawdacious Pack&#39; mới của Nike c&oacute; gam m&agrave;u ấn tượng. Về thiết kế, m&agrave;u trắng chủ đạo nổi bật với Swoosh được thiết kế dưới dạng gợn s&oacute;ng, được bao quanh trong một đường viền m&agrave;u xanh v&ocirc;n chạy dọc đến g&oacute;t ch&acirc;n, khiến mọi sự tập trung đều đổ dồn v&agrave;o logo thương hiệu. Nếu bạn đang t&igrave;m kiếm một mẫu gi&agrave;y b&oacute;ng đ&aacute; s&acirc;n cỏ tự nhi&ecirc;n to&agrave;n diện từ thiết kế cho tới c&aacute;c chức năng th&igrave; Nike Tiempo Legend 9 ch&iacute;nh l&agrave; mẫu gi&agrave;y d&agrave;nh cho bạn.</p>\r\n', 1, '<p>Những cầu thủ nổi tiếng đại diện: Piqu&eacute;, Van Dijk v&agrave; Thiago Silva.....<br />\r\n<br />\r\nBộ Sưu Tập: Rawdacious.<br />\r\n<br />\r\nNăm sản xuất: 2021.<br />\r\n<br />\r\nChất liệu: Da Kangaroo cao cấp mềm mại.<br />\r\n<br />\r\nC&ocirc;ng nghệ: Cổ thun Flyknit &ocirc;m ch&acirc;n, khu&ocirc;n đế thiết kế mới b&aacute;m s&acirc;n, l&oacute;t gi&agrave;y Nike-Grip chống trượt v&agrave; những điểm Foam Pod tăng cảm gi&aacute;c banh.<br />\r\n<br />\r\nTrọng lượng: gram/chiếc (Size 41).<br />\r\n<br />\r\nPhong c&aacute;ch: Kiểm so&aacute;t, kỹ thuật.<br />\r\n<br />\r\nVị tr&iacute;: Hậu vệ, tiền vệ trung t&acirc;m.<br />\r\n<br />\r\nForm gi&agrave;y: Tương đối thoải m&aacute;i, ph&ugrave; hợp ch&acirc;n b&egrave;.<br />\r\n<br />\r\nMặt s&acirc;n: Cỏ tự nhi&ecirc;n 11 người.</p>\r\n'),
(2, 5, 'MIZUNO MORELIA TF NEXT WAVE - WHITE/HIGH RISK RED', 3200000, '2.webp', 'Morelia là dòng giày đã được ra mắt từ năm 1985 với thiết kế truyền thống mang tính chuẩn mực cho một đôi giày bóng đá. Trải qua gần 40 năm, những mẫu Morelia mới nhất vẫn giữ những nét truyền thống đó pha lẫn với những chi tiết hiện đại tạo nên một đôi giày tinh tế phù hợp với nhiều cầu thủ.', 1, 'Cầu thủ nổi tiếng đại diện: Nghiêm Xuân Tú, Đặng Văn Lâm, Nguyễn Tuấn Anh....<br>\r\n<br>\r\nBộ sưu tập: Next Wave.<br>\r\n<br>\r\nNăm sản xuất: 2021.<br>\r\n<br>\r\nChất liệu: Da Kangaroo cao cấp mềm mại.<br>\r\n<br>\r\nCông nghệ: Đế đệm giảm chấn êm ái kết hợp lót đệm chống trượt và .<br>\r\n<br>\r\nPhong cách: Kiểm soát, chuyền bóng.<br>\r\n<br>\r\nVị trí: Trung vệ, Tiền vệ trung tâm.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(3, 3, 'ADIDAS X SPEEDFLOW .3 TF SAPPHIRE EDGE - SKY RUSH/SHOCK PINK/FOOTWEAR WHITE', 1750000, '3.webp', '<p>ADIDAS X SPEEDFLOW .3 TF SAPPHIRE EDGE - SKY RUSH/SHOCK PINK/FOOTWEAR WHITE l&agrave; mẫu gi&agrave;y d&agrave;nh cho s&acirc;n cỏ nh&acirc;n tạo 5-7 người. Nằm trong BST mới Sapphire Edge, adidas X Speedflow .3 sở hữu phối m&agrave;u Sky Rush / Team Shock Pink / White với gam m&agrave;u xanh da trời tươi m&aacute;t l&agrave;m chủ đạo, nổi bật với c&aacute;c chi tiết m&agrave;u trắng v&agrave; hồng l&agrave;m điểm nhất ở logo 3 sọc. Adidas X SpeedFlow .3 TF chắc chắn sẽ l&agrave; đ&ocirc;i gi&agrave;y tốc độ cho c&aacute;c t&iacute;n đồ đam m&ecirc; cỏ nh&acirc;n tạo kh&ocirc;ng thể bỏ qua.</p>\r\n', 0, '<p>Cầu thủ nổi tiếng đại diện: Mohamed Salah, Son Hueng Min, Timo Werner, Lionel Messi...<br />\r\n<br />\r\nBộ sưu tập: Sapphire Edge.<br />\r\n<br />\r\nNăm sản xuất: 2022.<br />\r\n<br />\r\nChất liệu: Da tổng hợp mỏng nhẹ.<br />\r\n<br />\r\nC&ocirc;ng nghệ: Cổ thun &ocirc;m ch&acirc;n, đế 2 khu&ocirc;n mới v&agrave; bộ đệm cao su &ecirc;m &aacute;i.<br />\r\n<br />\r\nTrọng lượng: 245 gram/chiếc (Size 41).<br />\r\n<br />\r\nPhong c&aacute;ch: Tấn c&ocirc;ng, tốc độ.<br />\r\n<br />\r\nVị tr&iacute;: Tiền vệ c&aacute;nh, tiền đạo.<br />\r\n<br />\r\nForm gi&agrave;y: Ph&ugrave; hợp form ch&acirc;n thon/ch&acirc;n b&egrave;.<br />\r\n<br />\r\nMặt s&acirc;n: Cỏ nh&acirc;n tạo 5-7 người.</p>\r\n'),
(4, 4, 'PUMA FUTURE Z 1.1 FG/AG SPECTRA - PUMA WHITE/RED BLAST', 3950000, '4.webp', 'PUMA tung ra một bộ sưu tập hoàn toàn mới, chuẩn bị cho giai đoạn cuối của các giải đấu châu Âu và EURO 2020. Với tên gọi Spectra cùng khẩu hiệu \"Great is everywhere\' thông điệp PUMA muốn bạn tin rằng bạn không chỉ giỏi - bạn bạn còn rất tuyệt vời! Bạn là những gì bạn tin tưởng và bạn hoàn toàn có thể trở nên tuyệt vời ở bất cứ đâu.<br> \r\n\r\nPUMA Future Z 1.1 FG/AG Spectra - PUMA White/Red Blast là mẫu phiên bản cao cấp dành cho sân cỏ tự nhiên 7-11 người. Nằm trong bộ sưu tập Spectra mang một làn gió mới đầy tươi sáng, lấy cảm hứng từ các dãy màu phổ quang ánh sáng khúc xạ tự nhiên mang ý nghĩa giúp bạn nhìn xa hơn bình thường và tạo ra những khoảnh khắc ý nghĩa trong bóng đá.', 1, 'Cầu thủ nổi tiếng đại diện: James Maddison, Luis Suarez, Neymar Jr...<br>\r\n<br>\r\nBộ sưu tập: Spectra.<br>\r\n<br>\r\nNăm sản xuất: 2021.<br>\r\n<br>\r\nChất liệu: Da tổng hợp mỏng kết hợp Gripcontrol Pro tăng cảm giác bóng.<br>\r\n<br>\r\nCông nghệ: Dải nén FuzionFit+ thích ứng, cổ thun Evoknit ôm chân, đế ngoài hình chữ \'Z\' nhẹ và bám sân.<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Sân cỏ tự nhiên 11 người.'),
(5, 6, 'ASICS DESTAQUE FF 2 TF - SOLAR YELLOW/BLACK/BLUE', 2790000, '5.webp', 'Asics có thể coi là nguồn cảm hứng, là khuôn mẫu tạo ra bước đi đầu tiên của đế chế Nike - thương hiệu nổi tiếng đến từ Mỹ. Phil Knight là người đồng sáng lập, chủ tịch danh dự của đế chế NIKE. Ông muốn tìm hiểu xem có dòng giày nào có thể so sánh được với các đôi giày đến từ Đức đang rất được yêu thích trên thế giới thời điểm hiện tại. Trong một lần đi khảo sát và học hỏi, ông đã bị bất ngờ trước chất lượng các đôi giày Asics đem lại. Tiếp đến, ông xin được phân phối và sau đó là săn đón các kỹ sư thiết kế để tạo ra thương hiệu Nike cho riêng mình. ', 1, 'Phiên bản giày: Destaque FF 2.<br>\r\n<br>\r\nNăm sản xuất: 2021. <br>\r\n<br>\r\nChất liệu: Da Kangaroo kết hợp da tổng hợp mềm mại và chắc chắn.<br>\r\n<br>\r\nCông nghệ: Cổ chất liệu vải rời thoải mái, đế đệm Flyte Foam kết đệm Gel êm ái và bám sân và những sợi lưới thoáng khí.<br>\r\n<br>\r\n\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\n\r\nVị trí: Tiền vệ cánh, tiền đạo.<br>\r\n<br>\r\n\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\n\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(6, 7, 'GIÀY ĐÁ BÓNG KAMITO TA11 TF TOUCH OF MAGIC - AQUA BLUE/GOLD', 690000, '6.webp', 'KAMITO TA11 là một trong những mẫu giày đá bóng vô cùng nổi tiếng trong giới bóng đá phong trào, được thiết kế với sự góp ý của cầu thủ Tuấn Anh - Hoàng Anh Gia Lai Việt Nam. Kamito TA11 ra đời để vinh danh cũng như ghi nhận những đóng góp đáng giá của cầu thủ Nguyễn Tuấn Anh. Giống như những mẫu giày \"Signature\" khác, Kamito TA11 sở hữu những đặc trưng khác biệt và thú vị liên quan đến đội trưởng của CLB Hoàng Anh Gia Lai.', 1, 'Cầu thủ nổi tiếng đại diện: Tuấn Anh 11...<br>\r\n<br>\r\nGam màu: PINK/GOLD.<br>\r\n<br>\r\nBộ sưu tập: Touch of magic.<br>\r\n<br>\r\nNăm sản xuất: 2022.<br>\r\n<br>\r\nChất liệu: Da KA-FIBER ULTRA êm mềm.<br>\r\n<br>\r\nCông nghệ: Đế KA-SPIN đàn hồi êm ái, lót đệm KA-COMFORT .<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ trung tâm, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(7, 2, 'NIKE MERCURIAL SUPERFLY 8 ACADEMY TF KM FLAMES - LIGHT THISTLE/METALLIC SILVER', 2150000, '7.webp', 'Nike và Kylian Mbappe đã chính thức giới thiệu Nike Mercurial Superfly hoàn toàn mới từ bộ sưu tập \'KM Flames\'. Giày đá bóng Mercurial Superfly VIII Mbappe mới và bộ sưu tập \'KM Flames\' của Nike giới thiệu một thiết kế riêng nhằm để tôn vinh Kylian Mbappe - cầu thủ bóng đá nhanh nhất thế giới.', 1, 'Cầu thủ nổi tiếng đại diện: Cristiano Ronaldo, Edin Hazard, Mbappe.....<br>\r\n<br>\r\nBộ sưu tập: KM Flames.<br>\r\n<br>\r\nNăm sản xuất: 2021.<br>\r\n<br>\r\nChất liệu: Da tổng hợp mới mềm mại.<br>\r\n<br>\r\nCông nghệ: Cổ thun Dynamic Fit, đế đệm êm ái.<br>\r\n<br>\r\nTrọng lượng: 234 gram/chiếc (Size 42).<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ cánh, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(8, 3, 'ADIDAS X SPEEDFLOW .1 FG DIAMOND EDGE - FOOTWEAR WHITE/LEGACY INDIGO/HI-RES BLUE', 4500000, '8.webp', 'Adidas X Speedflow .1 FG Diamond Edge - Footwear White/Legacy Indigo/Hi-Res Blue là phiên bản giày cao cấp dành cho sân cỏ tự nhiên 7-11 người. Về thiết kế Adidas X Speedflow sở hữu gam màu trắng - xanh hài hòa đầy phong cách. Phiên bản này là một phần của bộ sưu tập Diamond Edge - BST giày đá bóng cuối cùng của Adidas trong mùa giải 21-22. Colorway chính thức của Adidas X Speedflow Diamond Edge là \'White / Legacy Indigo / Sky Rush\' với gam màu trắng chủ đạo, nổi bật với các chi tiết màu xanh da trời ở logo 3 dọc, phần trên upper và đinh giày.', 1, 'Cầu thủ nổi tiếng đại diện: Mohamed Salah, Son Hueng Min, Messi...<br>\r\n<br>\r\nBộ sưu tập: Diamond Edge.<br>\r\n<br>\r\nNăm sản xuất: 2022.<br>\r\n<br>\r\nChất liệu: Da tổng hợp cao cấp mỏng nhẹ kết khung lưới cố định Speedcage.<br>\r\n<br>\r\nCông nghệ: Đế Speedframe tốc độ bám sân, tấm carbon siêu nhẹ, cổ thun Primknit ôm chân, lót foam êm ái và gót chân đệm 3D.<br>\r\n<br>\r\nTrọng lượng: 222 gram/chiếc (Size 41).<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ cánh, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Sân cỏ tự nhiên 11 người.'),
(9, 4, 'PUMA FUTURE Z 1.1 FG/AG GAME ON - YELLOW ALERT/PUMA', 3950000, '9.webp', 'Giày bóng đá Puma Future thế hệ tiếp theo đã được phát hành, được Puma đổi tên từ Puma Future Netfit thành Puma Future Z và là một phần của bộ sưu tập \'Game On\'. <br>\r\n\r\nVới phối màu nổi bật và thiết kế ấn tượng, sự hợp tác giữa Neymar và PUMA một lần nữa mang lại cho chúng ta điều gì đó cho tương lai. Future Z được phát triển để trả lời cho câu hỏi \'Làm thế nào chúng ta có thể tái thiết kế hoàn toàn một đôi giày bóng đá để nâng cao những cầu thủ năng động nhất thế giới?\'. Sự ra mắt của Future Z là một đáp án hoàn hảo. Các cầu thủ mong muốn một khởi động nhanh nhẹn và nhạy bén hơn để hỗ trợ phong cách chơi sáng tạo của họ. ', 1, 'Cầu thủ nổi tiếng đại diện: James Maddison, Luis Suarez, Neymar Jr...<br>\r\n<br>\r\nBộ sưu tập: Game On.<br>\r\n<br>\r\nNăm sản xuất: 2021.<br>\r\n<br>\r\nChất liệu: Da tổng hợp mỏng kết hợp Gripcontrol Pro tăng cảm giác bóng.<br>\r\n<br>\r\nCông nghệ: Dải nén FuzionFit+ thích ứng, cổ thun Evoknit ôm chân, đế ngoài hình chữ \'Z\' nhẹ và bám sân.<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Sân cỏ tự nhiên 11 người.'),
(10, 5, 'MIZUNO MONARCIDA NEO II SELECT AS TF - WHITE/ORANG', 1399000, '10.webp', 'Mizuno được biết đến là 1 trong những thương hiệu lâu đời nhất tại Nhật Bản. MONARCIDA NEO SELECT AS là dòng sản phẩm có Form truyền thống với upper được làm bằng chất liệu da tổng hợp mềm và ôm chân đem lại cảm giác vô cùng thoải mái khi chơi bóng.', 1, 'Cầu thủ nổi tiếng đại diện: Nghiêm Xuân Tú, Đặng Văn Lâm, Nguyễn Tuấn Anh....<br>\r\n<br>\r\nGam màu: WHITE/ORANGE.<br>\r\n<br>\r\nNăm sản xuất: 2022.<br>\r\n<br>\r\nChất liệu: Da Tổng Hợp.<br>\r\n<br>\r\nCông nghệ: Khuôn đế bám sân, lót đệm chống trượt chắc chắn.<br>\r\n<br>\r\nTrọng lượng: 255 gram/chiếc (Size 42).<br>\r\n<br>\r\nPhong cách: Kiểm soát, chuyền bóng.<br>\r\n<br>\r\nVị trí: Trung vệ, Tiền vệ trung tâm.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(11, 6, 'ASICS ULTREZZA CLUB 2 AI SAFET', 1791000, '11.webp', 'ASICS ULTREZZA CLUB 2 AI SAFETY YELLOW/MAKO BLUE là mẫu giày đá bóng chuyên cho sân cỏ tự nhiên 7-11 người. Về thiết kế Asics Ultrezza 2 Andres Iniesta có màu xanh chanh chuyển dần sang màu vàng volt nổi bật, cực hút mắt. Phần logo Iniesta màu đen được đặt ngay chính giữa gót giày. Logo Asics cũng được sử dụng màu đen nổi bật trên nền màu xanh, vàng tươi sáng. Ngoài ra, vẫn là khối họa tiết quen thuộc từng xuất hiện ở phiên bản tiền nhiệm nhưng có một số thay đổi nhỏ về hình ảnh như đường gờ được sáng tạo hơn để làm cho vẻ ngoài của giày trông hấp dẫn hơn.', 1, 'Phiên bản giày: Destaque FF 2.<br>\r\n<br>\r\nNăm sản xuất: 2021. <br>\r\n<br>\r\nChất liệu: Da Kangaroo kết hợp da tổng hợp mềm mại và chắc chắn.<br>\r\n<br>\r\nCông nghệ: Cổ chất liệu vải rời thoải mái, đế đệm Flyte Foam kết đệm Gel êm ái và bám sân và những sợi lưới thoáng khí.<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ cánh, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(12, 7, 'GIÀY ĐÁ BÓNG KAMITO TA11 TF TOUCH OF MAGIC - PINK/GOLD', 690000, '12.webp', 'KAMITO TA11 là một trong những mẫu giày đá bóng vô cùng nổi tiếng trong giới bóng đá phong trào, được thiết kế với sự góp ý của cầu thủ Tuấn Anh - Hoàng Anh Gia Lai Việt Nam. Kamito TA11 ra đời để vinh danh cũng như ghi nhận những đóng góp đáng giá của cầu thủ Nguyễn Tuấn Anh. Giống như những mẫu giày \"Signature\" khác, Kamito TA11 sở hữu những đặc trưng khác biệt và thú vị liên quan đến đội trưởng của CLB Hoàng Anh Gia Lai.', 1, 'Cầu thủ nổi tiếng đại diện: Tuấn Anh 11...<br>\r\n<br>\r\nGam màu: PINK/GOLD.<br>\r\n\r\nBộ sưu tập: Touch of magic.<br>\r\n<br>\r\nNăm sản xuất: 2022.<br>\r\n<br>\r\nChất liệu: Da KA-FIBER ULTRA êm mềm.<br>\r\n<br>\r\nCông nghệ: Đế KA-SPIN đàn hồi êm ái, lót đệm KA-COMFORT .<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ trung tâm, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(13, 2, 'NIKE PHANTOM GT 2 ELITE FG RECHARGE - SAPPHIRE/VOLT/GREY FOG/BLUE VOID', 5190000, '13.webp', 'Mùa Đông năm 2021 trong những ngày này chúng ta đang dần thiếu đi những động lực để có thể ra ngoài và chơi bóng trong một đêm tối lạnh lẽo, ẩm ướt. Chính vì đã nắm bắt được điều này, Nike ngay lập tức đã cho tung ra một bộ sưu tập giày đá bóng với gam màu mới ấm áp mang tên ‘Recharge Pack’. \r\n\r\n', 1, 'Cầu thủ nổi tiếng đại diện: Kevin De Bruyne, Harry Kane và Mason Greendwood....<br>\r\n<br>\r\nBộ sưu tập: Recharge.<br>\r\n<br>\r\nNăm sản xuất: 2021.<br>\r\n<br>\r\nChất liệu: Da tổng hợp Nikeskin kết hợp đường vân GT thế hệ thứ 2.<br>\r\n<br>\r\nCông nghệ: Cổ thun Flyknit, ACC (đá mọi thời tiết), khuôn đế Hyper Quick System bám sân, lót NikeGrip chống trượt.<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ trung tâm, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ tự nhiên 11 người.'),
(14, 4, 'PUMA FUTURE 6.1 NETFIT FG/AG TURBO - LUMINOUS PINK/PUMA BLACK\r\n\r\n', 3690000, '14.webp', 'Hoang dã, tốc độ và điên cuồng! Đây là những cảm giác đầu tiên xuất hiện khi bắt gặp phối màu mới từ PUMA. Tăng tốc hơn trong cuộc đua sản xuất những đôi giày nhanh nhất, PUMA vừa ra mắt bộ sưu tập \'The Turbo\' bao gồm các phiên bản đặc biệt của Ultra 1.1 và Future 6.1, lấy cảm hứng từ khói và bụi trên đường đua.', 1, 'Cầu thủ nổi tiếng đại diện: Marco Reus, Luis Suarez, Neymar Jr...<br>\r\n<br>\r\nBộ sưu tập: Turbo.<br>\r\n<br>\r\nNăm sản xuất: 2020.<br>\r\n<br>\r\nChất liệu: Da tổng hợp mềm mại kết hợp Gripcontrol Pro tăng cảm giác bóng.<br>\r\n<br>\r\nCông nghệ: Đế RapidgAgility giảm trọng lượng giày, công nghệ dây NETFIT, lót đệm êm ái.<br>\r\n<br>\r\nTrọng lượng giày: 210 gram/chiếc (Size 42).<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Sân cỏ tự nhiên 11 người.'),
(15, 3, 'ADIDAS X SPEEDFLOW MESSI .1 FG UNPARALLELED - VICTORY BLUE/SHOCK PINK/SOLAR YELLOW\r\n', 3890000, '15.webp', 'adidas X Speedflow Messi .1 FG Unparalleled - Victory Blue/Shock Pink/Solar Yellow là phiên bản giày cao cấp dành cho sân cỏ tự nhiên 7-11 người. Được ra mắt vào tháng 9-2021, nhà Adidas lại tiếp tục cho các fan hâm mộ một lần nữa “đứng ngồi không yên” khi bổ sung vào bộ sưu tập ‘NumbersUp’ bằng mẫu giày X Speedflow mang tên ‘Messi Unparalleled’. Đây là mẫu giày Signature đầu tiên Adidas dành cho Messi kể từ khi anh không còn khoác áo câu lạc bộ Barcelona. ‘Unparalleled’ có ý nghĩa là vô song, tức là chỉ có duy nhất một Messi trên đời, một huyền thoại của nền bóng đá thế giới với chiều cao khiêm tốn nhưng lại có một phong cách đá bóng nhanh nhẹn, khéo léo và những kỷ lục thi đấu khó ai có thể theo kịp.\r\n\r\n', 1, 'Cầu thủ nổi tiếng đại diện: Mohamed Salah, Son Hueng Min, Messi...<br>\r\n<br>\r\nBộ sưu tập: Unparalleled.<br>\r\n<br>\r\nNăm sản xuất: 2021.<br>\r\n<br>\r\nChất liệu: Da tổng hợp cao cấp mỏng nhẹ kết khung lưới cố định Speedcage.<br>\r\n<br>\r\nCông nghệ: Đế Speedframe tốc độ bám sân, tấm carbon siêu nhẹ, cổ thun Primknit ôm chân, lót foam êm ái và gót chân đệm 3D.<br>\r\n<br>\r\nTrọng lượng: 222 gram/chiếc (Size 41).<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ cánh, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Sân cỏ tự nhiên 11 người.'),
(16, 5, 'MIZUNO MORELIA SALA CLUB TF WHITE/RED', 1490000, '16.webp', 'Đối với sân chơi phong trào tại Việt Nam thì mặt cỏ nhân tạo là phổ biến nhất và Mizuno cũng rất kịp thời khi cho ra mắt rất nhiều dòng giày dành riêng cho mặt sân này. Với những cầu thủ yêu thích dòng giày Morelia và mong muốn có một mẫu giày mềm mại, có hiệu suất cao cùng mức giá hợp lý thì không thể bỏ qua MRL Sala Club TF. Đây là mẫu giày tầm trung có thiết kế độc đáo với rất nhiều ưu điểm nổi bật.', 1, 'Cầu thủ nổi tiếng đại diện: Nghiêm Xuân Tú, Đặng Văn Lâm, Nguyễn Tuấn Anh....<br>\r\n<br>\r\nNăm sản xuất: 2021.<br>\r\n<br>\r\nMàu sắc: White/Red.<br>\r\n<br>\r\nChất liệu: Da tổng hợp.<br>\r\n<br>\r\nCông nghệ: Đế đệm êm ái, lót đệm thoải mái.<br>\r\n<br>\r\nPhong cách: Kiểm soát, chuyền bóng.<br>\r\n<br>\r\nVị trí: Trung vệ, Tiền vệ trung tâm.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(17, 6, 'ASICS TOQUE 6 TF - CLASSIC RED/DIVA PINK', 1390000, '17.webp', 'ASICS TOQUE 6 TF - CLASSIC RED/DIVA PINK là mẫu giày chuyên cho sân cỏ nhân tạo . Nhẹ , ôm chân , bám sân tốt là cảm giác đầu tiên khi bạn xỏ trên chân ASICS TOQUE 6 TF - CLASSIC RED/DIVA PINK . ', 1, 'Phiên bản giày: Toque 6.<br>\r\n<br>\r\nChất liệu da: Da tổng hợp mỏng nhẹ.<br>\r\n<br>\r\nCổ thun: Cổ rời thoải mái.<br>\r\n<br>\r\nKhuôn đế: Đế đệm Foam êm ái và bám sân.<br>\r\n<br>\r\nVị trí: Tiền đạo, Trung vệ, Hậu vệ cánh.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo.<br>\r\n<br>\r\nForm giày: Phù hợp chân thon.'),
(18, 7, 'GIÀY ĐÁ BÓNG KAMITO TA11 TF TOUCH OF MAGIC - RED/GOLD', 690000, '18.webp', 'KAMITO TA11 TOUCH OF MAGIC - RED/GOLD là một trong những mẫu giày đá bóng vô cùng nổi tiếng trong giới bóng đá phong trào, được thiết kế với sự góp ý của cầu thủ Tuấn Anh - Hoàng Anh Gia Lai Việt Nam. Kamito TA11 ra đời để vinh danh cũng như ghi nhận những đóng góp đáng giá của cầu thủ Nguyễn Tuấn Anh. Giống như những mẫu giày \"Signature\" khác, Kamito TA11 sở hữu những đặc trưng khác biệt và thú vị liên quan đến đội trưởng của CLB Hoàng Anh Gia Lai.<br>\r\n\r\nNhững sản phẩm từ thương hiệu Kamito được kỳ công sáng tạo bởi những người thợ lành nghề, dồn tâm huyết vào từng đường kim mũi chỉ, mong muốn đem đến những sản phẩm tốt nhất, giúp các cầu thủ thăng hoa khi thi đấu cùng hiệu suất cao nhất. <br>\r\n\r\n- Thứ nhất, đôi giày được thiết kế và hoàn thiện bởi sự góp ý của chính Tuấn Anh, nhằm đem lại hiệu suất thi đấu cao nhất.<br>\r\n\r\n- Các họa tiết trên upper giày cũng được thiết kế rất đặc trưng, đặc biệt nổi bật là các vân kim cương nổi tạo điểm nhấn trong tổng thể của thiết kế. <br>\r\n\r\n- Kí hiệu TA11 được đặt theo tên và số áo của Tuấn Anh.<br>\r\n\r\n- Chữ ký của Tuấn Anh cũng được xuất hiện trên thân giày.', 1, 'Cầu thủ nổi tiếng đại diện: Tuấn Anh 11...<br>\r\n<br>\r\nGam màu: PINK/GOLD.<br>\r\n<br>\r\nBộ sưu tập: Touch of magic.<br>\r\n<br>\r\nNăm sản xuất: 2022.<br>\r\n<br>\r\nChất liệu: Da KA-FIBER ULTRA êm mềm.<br>\r\n<br>\r\nCông nghệ: Đế KA-SPIN đàn hồi êm ái, lót đệm KA-COMFORT .<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ trung tâm, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(19, 3, 'ADIDAS COPA SENSE .3 TF WHITESPARK - FOOTWEAR WHITE/SOLAR RED/IRON METAL', 1750000, '19.webp', 'adidas Copa Sense .3 TF WhiteSpark - Footwear White/Solar Red/Iron Metal là mẫu giày dành cho sân cỏ nhân tạo 5-7 người. Nằm trong BST giày đá bóng White Spark với gam màu trắng chủ đạo, đi kèm các chi tiết màu xám và đỏ nổi bật. Được tạo ra để thắp sáng sân cỏ trên toàn thế giới. Adidas vốn rất thành công với những phối màu sặc sỡ như Meteorite, Superspectral và Superlative. Đã đến lúc để cập nhật những gam màu khác biệt và màu trắng là một sự lựa chọn thật tuyệt vời.', 1, 'Cầu thủ nổi tiếng đại diện: Paulo Dybala, Pedri Gonzalez, Joao Felix...<br>\r\n<br>\r\nBộ sưu tập: White Spark.<br>\r\n<br>\r\nNăm sản xuất: 2021.<br>\r\n<br>\r\nChất liệu: Da tự nhiên có cấu trúc Fusionskin.<br>\r\n<br>\r\nCông nghệ: Cổ thun liền co giãn, được cải tiến bổ sung thêm bộ đệm êm ái.<br>\r\n<br>\r\nTrọng lượng: 286 gram/chiếc (Size 41).<br>\r\n<br>\r\nPhong cách: Phòng ngự, kiểm soát.<br>\r\n<br>\r\nVị trí: Hậu vệ, tiền vệ trung tâm.<br>\r\n<br>\r\nForm giày: Phù hợp form chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(20, 3, 'ADIDAS X SPEEDFLOW .1 FG SAPPHIRE EDGE - SKY RUSH/SHOCK PINK/FOOTWEAR WHITE', 4500000, '20.webp', 'adidas X Speedflow .1 FG Sapphire Edge - Sky Rush/Shock Pink/Footwear White là phiên bản giày cao cấp dành cho sân cỏ tự nhiên 7-11 người. Nằm trong BST mới Sapphire Edge, adidas X Speedflow.1 sở hữu phối màu Sky Rush / Team Shock Pink / White với gam màu xanh da trời tươi mát làm chủ đạo, nổi bật với các chi tiết màu trắng và hồng làm điểm nhất ở logo 3 sọc.', 1, 'Cầu thủ nổi tiếng đại diện: Mohamed Salah, Son Hueng Min, Messi...<br>\r\n<br>\r\nBộ sưu tập: Sapphire Edge.<br>\r\n<br>\r\nNăm sản xuất: 2022.<br>\r\n<br>\r\nChất liệu: Da tổng hợp cao cấp mỏng nhẹ kết khung lưới cố định Speedcage.<br>\r\n<br>\r\nCông nghệ: Đế Speedframe tốc độ bám sân, tấm carbon siêu nhẹ, cổ thun Primknit ôm chân, lót foam êm ái và gót chân đệm 3D.<br>\r\n<br>\r\nTrọng lượng: 222 gram/chiếc (Size 41).<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ cánh, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Sân cỏ tự nhiên 11 người.'),
(21, 2, 'NIKE MERCURIAL SUPERFLY 8 ACADEMY TF CR7 SPARK POSITIVITY - CHILE RED/BLACK/WHITE/TOTAL ORANGE', 2150000, '21.webp', 'NIKE MERCURIAL SUPERFLY 8 ACADEMY TF CR7 SPARK POSITIVITY - CHILE RED/BLACK/WHITE/TOTAL ORANGE là mẫu giày dành cho sân cỏ nhân tạo 5-7 người. Nằm trong BST ‘Spark Positivity’ với gam màu đỏ, trắng, đen nổi bật. Giày đá bóng Nike Mercurial ‘Spark Positivity’ được sản xuất để cùng Cristiano Ronaldo thi đấu tại mùa giải Euro 2020.\r\n\r\n', 1, 'Cầu thủ nổi tiếng đại diện: Cristiano Ronaldo, Edin Hazard, Mbappe.....<br>\r\n<br>\r\nBộ sưu tập: Spark Positivity.<br>\r\n<br>\r\nNăm sản xuất: 2022.<br>\r\n<br>\r\nChất liệu: Da tổng hợp mới mềm mại.<br>\r\n<br>\r\nCông nghệ: Cổ thun Dynamic Fit, đế đệm êm ái.<br>\r\n<br>\r\nTrọng lượng: 234 gram/chiếc (Size 42).<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ cánh, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(22, 4, 'PUMA ULTRA 1.2 PRO CAGE TT GAME ON - PUMA BLACK/PUMA WHITE/YELLOW ALERT', 2450000, '22.webp', 'Sau lần ra mắt Future Z phiên bản mới, Puma đã nhanh chóng bổ sung thêm vào bộ sưu tập Game On phối màu mới nhất của giày đá bóng tốc độ Puma Ultra. Nổi tiếng là một thương hiệu luôn lấy tốc độ làm tiêu chí hang đầu, Puma Ultra mang sứ mệnh sản xuất giày cho \"người đàn ông nhanh nhất thế giới\". Tốc độ vốn dĩ đã nằm trong DNA của hãng giày ‘báo sư tử’, ngay cả ở trong logo hình “con báo” của họ. <br>\r\n\r\n\r\n\r\nPUMA Ultra 1.2 Pro Cage TT Game On - PUMA Black/PUMA White/Yellow Alert là mẫu giày dành cho sân cỏ nhân tạo 5-7 người. Nằm trong bộ sưu tập  “Game On” sở hữu vẻ ngoài độc đáo trên upper là những đường màu sặc sỡ pha trộn lẫn nhau trên nền đen, thể hiện vận tốc nhanh trên đường đua của mẫu giày đá bóng tốc độ. ', 1, 'Cầu thủ nổi tiếng đại diện: Antoine Griezmann, Kyle Walker, Sergio Aguero...<br>\r\n<br>\r\nBộ sưu tập: Game On.<br>\r\n<br>\r\nNăm sản xuất: 2021.<br>\r\n<br>\r\nChất liệu: Da MATRYXEVO cao cấp.<br>\r\n<br>\r\nCông nghệ: Đế tốc độ kết hợp bộ đệm êm ái, chất liệu GripControl Pro phần mũi giày và công nghệ da tổng hợp mềm mại hỗ trợ di chuyển linh hoạt.<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ cánh, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(23, 7, 'GIÀY ĐÁ BÓNG KAMITO TA11 TF TOUCH OF MAGIC - WHITE/GOLD', 690000, '23.webp', 'KAMITO TA11 TOUCH OF MAGIC - WHITE/GOLD là một trong những mẫu giày đá bóng vô cùng nổi tiếng trong giới bóng đá phong trào, được thiết kế với sự góp ý của cầu thủ Tuấn Anh - Hoàng Anh Gia Lai Việt Nam. Kamito TA11 ra đời để vinh danh cũng như ghi nhận những đóng góp đáng giá của cầu thủ Nguyễn Tuấn Anh. Giống như những mẫu giày \"Signature\" khác, Kamito TA11 sở hữu những đặc trưng khác biệt và thú vị liên quan đến đội trưởng của CLB Hoàng Anh Gia Lai.', 0, 'Cầu thủ nổi tiếng đại diện: Tuấn Anh 11...<br>\r\n<br>\r\nGam màu: PINK/GOLD.<br>\r\n<br>\r\nBộ sưu tập: Touch of magic.<br>\r\n<br>\r\nNăm sản xuất: 2022.<br>\r\n<br>\r\nChất liệu: Da KA-FIBER ULTRA êm mềm.<br>\r\n<br>\r\nCông nghệ: Đế KA-SPIN đàn hồi êm ái, lót đệm KA-COMFORT .<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ trung tâm, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(24, 6, 'ASICS TOQUE 6 TF - BLACK/SAFETY YELLOW', 1390000, '24.webp', 'ASICS TOQUE 6 TF - Black/Safety Yellow là mẫu giày chuyên cho sân cỏ nhân tạo . Nhẹ , ôm chân , bám sân tốt là cảm giác đầu tiên khi bạn xỏ trên chân ASICS TOQUE 6 TF - Black/Safety Yellow', 1, 'Phiên bản giày: Toque 6.<br>\r\n<br>\r\nChất liệu da: Da tổng hợp mỏng nhẹ.<br>\r\n<br>\r\nCổ thun: Cổ rời thoải mái.<br>\r\n<br>\r\nKhuôn đế: Đế đệm Foam êm ái và bám sân.<br>\r\n<br>\r\nVị trí: Tiền đạo, Trung vệ, Hậu vệ cánh.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo.<br>\r\n<br>\r\nForm giày: Phù hợp chân thon.'),
(25, 2, 'NIKE MERCURIAL SUPERFLY 7 ELITE IC DAYBREAK - LASER ORANGE/BLACK/WHITE', 3450000, '25.webp', 'Bộ sưu tập Daybreak với gam màu sáng tươi mới . Nối bật nhất chắc chắn là Nike Mercurial Daybreak, mang màu cam vàng chủ đạo, kết hợp chi tiết trắng cùng logo Nike hình tia chớp. Sân cỏ nhân tạo hay sân cỏ tự nhiên cũng đều màu xanh lá, và các màu cam hay vàng luôn tạo hiệu ứng thẩm mỹ đẹp nhất. Các sản phẩm mã màu “701” hay “801” luôn chiếm trọng tình yêu của người hâm mộ. Phiên bản lần này có cả 2 dòng là cổ thấp Vapor 13 và cao cổ Superfly 7.', 1, 'Cầu thủ nổi tiếng đại diện: Cristiano Ronaldo, Edin Hazard, Mbappe.....<br>\r\n<br>\r\nBộ sưu tập: Daybreak.<br>\r\n<br>\r\nNăm sản xuất: 2020.<br>\r\n<br>\r\nChất liệu: Da tổng hợp phủ Nikeskin mới mềm mại.<br>\r\n<br>\r\nCông nghệ: Cổ thun Flyknit, lót đệm êm ái và công nghệ ACC.<br>\r\n<br>\r\nTrọng lượng: 245 gram/chiếc (Size 41).<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ cánh, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Sân Futsal trong nhà- sân xi măng.'),
(26, 2, 'NIKE PHANTOM GT PRO TF SPECTRUM - PHOTO BLUE/METALLIC SILVER/RAGE GREEN', 2350000, '26.webp', 'Với colorway xanh da trời mới mẻ trong BST Spectrum pack đem đến một thiết kế hài hòa, dịu mát như bầu trời ngày xuân. Thiết kế đánh bật từ các đường viền màu bạc cho đến dấu Swoosh nổi bật trên nền xanh da trời đẹp mắt.<br>\r\n\r\nLần đầu tiên trong lịch sử 10 năm qua, Nike đã trở lại đội hình 3 dòng giày bao gồm : Mercurial, Tiempo và 1 cái tên hoàn toàn mới : Phantom GT. Sau khi Phantom VSN và Phantom Venom được “hợp nhất” thành một silo Phantom - GT - đôi giày được tạo ra từ việc phân tích một lượng dữ liệu lớn của các cầu thủ đã trải nghiệm cả 2 dòng Phantom cũ.<br>\r\n\r\nNike Phantom GT Pro TF Spectrum - Photo Blue/Metallic Silver/Rage Green là một trong những phiên bản giày cỏ nhân tạo không thể bỏ qua. Một đôi giày hiện đại mang tính cách mạng với nhiều cải tiến vượt trội, ra đời để thay thế Nike Phantom VNM và VSN, đưa Nike về đội hình 3 silo sau hơn một thập kỉ qua.', 0, 'Những cầu thủ nổi tiếng đại diện: Kevin De Bruyne, Harry Kane và Mason Greendwood....<br>\r\n<br>\r\nBộ Sưu Tập: Spectrum.<br>\r\n<br>\r\nNăm sản xuất: 2021.<br>\r\n<br>\r\nChất liệu: Da tổng hợp NikeSkin và các vân Generative Texture.<br>\r\n<br>\r\nCông nghệ: Đế đệm React và lót đệm êm ái.<br>\r\n<br>\r\nTrọng lượng: 236 gram/chiếc (Size 41).<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ trung tâm, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(27, 7, 'GIÀY ĐÁ BÓNG KAMITO TA11 TF TOUCH OF MAGIC - WHITE/GOLD', 690000, '27.webp', 'KAMITO TA11 TOUCH OF MAGIC - WHITE/GOLD là một trong những mẫu giày đá bóng vô cùng nổi tiếng trong giới bóng đá phong trào, được thiết kế với sự góp ý của cầu thủ Tuấn Anh - Hoàng Anh Gia Lai Việt Nam. Kamito TA11 ra đời để vinh danh cũng như ghi nhận những đóng góp đáng giá của cầu thủ Nguyễn Tuấn Anh. Giống như những mẫu giày \"Signature\" khác, Kamito TA11 sở hữu những đặc trưng khác biệt và thú vị liên quan đến đội trưởng của CLB Hoàng Anh Gia Lai.', 1, 'Cầu thủ nổi tiếng đại diện: Tuấn Anh 11...<br>\r\n<br>\r\nBộ sưu tập: Touch of magic.<br>\r\n<br>\r\nNăm sản xuất: 2021.<br>\r\n<br>\r\nChất liệu: Da KA-FIBER ULTRA êm mềm.<br>\r\n<br>\r\nCông nghệ: Đế KA-SPIN đàn hồi êm ái, lót đệm KA-COMFORT .<br>\r\n<br>\r\nPhong cách: Tấn công, tốc độ.<br>\r\n<br>\r\nVị trí: Tiền vệ trung tâm, tiền đạo.<br>\r\n<br>\r\nForm giày: Phù hợp form chân thon/chân bè.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo 5-7 người.'),
(28, 7, 'GIÀY ĐÁ BÓNG KAMITO TA11 TF TOUCH OF MAGIC - BLACK/GOLD', 690000, '28.webp', 'KAMITO TA11 TOUCH OF MAGIC - BLACK/GOLD là một trong những mẫu giày đá bóng vô cùng nổi tiếng trong giới bóng đá phong trào, được thiết kế với sự góp ý của cầu thủ Tuấn Anh - Hoàng Anh Gia Lai Việt Nam. Kamito TA11 ra đời để vinh danh cũng như ghi nhận những đóng góp đáng giá của cầu thủ Nguyễn Tuấn Anh. Giống như những mẫu giày \"Signature\" khác, Kamito TA11 sở hữu những đặc trưng khác biệt và thú vị liên quan đến đội trưởng của CLB Hoàng Anh Gia Lai.', 1, 'Những cầu thủ nổi tiếng đại diện: Tuấn Anh 11.<br>\r\n<br>\r\nBộ Sưu Tập: Touch of magic.<br>\r\n<br>\r\nCổ thun: Lưỡi gà rời dễ chịu.<br>\r\n<br>\r\nChất liệu da: Da KA-FIBER ULTRA êm mềm<br>\r\n<br>\r\nLót đệm:  KA-COMFORT cực êm ái <br>\r\n<br>\r\nKhuôn đế:  KA-SPIN đàn hồi êm ái.<br>\r\n<br>\r\nVị trí: Tiền đạo trung tâm, Trung vệ, Tiền vệ.<br>\r\n<br>\r\nMặt sân: Cỏ nhân tạo.<br>\r\n<br>\r\n\r\nForm giày: Phù hợp form chân thon tới chân bè.'),
(29, 9, 'giày thử', 4900000, '3.webp', 'không được xóa', 0, ''),
(30, 8, 'thử mã số 8', 5000000, '15.webp', 'thử\r\n', 0, ''),
(37, 5, 'MIZUNO MONARCIDA NEO II SELECT AS TF - REFLEX BLUE C/WHITE', 1399000, '29.webp', '<p>Mizuno được biết đến l&agrave; 1 trong những thương hiệu l&acirc;u đời nhất tại Nhật Bản.&nbsp;MONARCIDA NEO SELECT AS l&agrave; d&ograve;ng sản phẩm c&oacute; Form truyền thống với&nbsp;upper được l&agrave;m bằng chất liệu da tổng hợp mềm v&agrave; &ocirc;m ch&acirc;n đem lại cảm gi&aacute;c v&ocirc; c&ugrave;ng thoải m&aacute;i khi chơi b&oacute;ng.</p>\r\n', 0, '<p><strong>Cầu thủ nổi tiếng đại diện:&nbsp;</strong>Nghi&ecirc;m Xu&acirc;n T&uacute;, Đặng Văn L&acirc;m, Nguyễn Tuấn Anh....</p>\r\n\r\n<p><strong>Gam m&agrave;u:&nbsp;</strong>Ice Melt/Star Sapphire.</p>\r\n\r\n<p><strong>Năm sản xuất:&nbsp;</strong>2022.</p>\r\n\r\n<p><strong>Chất liệu:</strong>&nbsp;Da Tổng Hợp.</p>\r\n\r\n<p><strong>C&ocirc;ng nghệ:</strong>&nbsp;Khu&ocirc;n đế b&aacute;m s&acirc;n, l&oacute;t đệm chống trượt chắc chắn.</p>\r\n\r\n<p><strong>Trọng lượng:</strong>&nbsp;255 gram/chiếc (Size 42).</p>\r\n\r\n<p><strong>Phong c&aacute;ch:&nbsp;</strong>Kiểm so&aacute;t, chuyền b&oacute;ng.</p>\r\n\r\n<p><strong>Vị tr&iacute;:&nbsp;</strong>Trung vệ, Tiền vệ trung t&acirc;m.</p>\r\n\r\n<p><strong>Form gi&agrave;y:&nbsp;</strong>Ph&ugrave; hợp form ch&acirc;n thon/ch&acirc;n b&egrave;.</p>\r\n\r\n<p><strong>Mặt s&acirc;n:</strong>&nbsp;Cỏ nh&acirc;n tạo 5-7 người.</p>\r\n'),
(43, 3, 'Phiếu dự giờ', 100001, '2.4.webp', '<p>s</p>\r\n', 0, '<p>s</p>\r\n');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberid` (`memberid`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `img_product`
--
ALTER TABLE `img_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `productid` (`productid`),
  ADD KEY `orderid` (`orderid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberid` (`memberid`),
  ADD KEY `ordermethodid` (`ordermethodid`);

--
-- Chỉ mục cho bảng `ordersmethods`
--
ALTER TABLE `ordersmethods`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brandid` (`brandid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `img_product`
--
ALTER TABLE `img_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `ordersmethods`
--
ALTER TABLE `ordersmethods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`memberid`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`memberid`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ordermethodid`) REFERENCES `ordersmethods` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brandid`) REFERENCES `brand` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
