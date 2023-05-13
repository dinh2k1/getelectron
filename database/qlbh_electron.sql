-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2021 lúc 02:22 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh_electron`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat`
--

CREATE TABLE `cat` (
  `Cat_ID` int(10) UNSIGNED NOT NULL,
  `Cat_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cat_Desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cat_Thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cat_Keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cat_Created` datetime NOT NULL,
  `Cat_Update` datetime NOT NULL,
  `Cat_Order` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cat`
--

INSERT INTO `cat` (`Cat_ID`, `Cat_Name`, `Cat_Desc`, `Cat_Thumbnail`, `Cat_Keywords`, `Cat_Created`, `Cat_Update`, `Cat_Order`) VALUES
(28, 'Điện thoại', '', '', '', '2020-12-04 05:02:53', '2020-12-04 06:20:46', 1),
(29, 'Laptop', '', '', '', '2020-12-04 05:08:09', '2020-12-04 06:20:50', 2),
(30, 'Tablet', '', '', '', '2020-12-04 06:20:41', '0000-00-00 00:00:00', 3),
(31, 'Máy tính', '', '', '', '2020-12-04 06:20:59', '0000-00-00 00:00:00', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `Contact_ID` int(10) UNSIGNED NOT NULL,
  `Contact_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact_Subject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact_Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Contact_Phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact_Message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Contact_Create` datetime NOT NULL,
  `Contact_Update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `Orders_ID` int(10) UNSIGNED NOT NULL,
  `Orders_Code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Orders_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Orders_Phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Orders_Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Orders_Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Orders_Mess` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Orders_Price` int(10) NOT NULL,
  `Orders_Payway` tinyint(1) NOT NULL COMMENT '1: tiền mặt, 2: Online',
  `Orders_Rec` tinyint(1) NOT NULL COMMENT '1: giao hàng tận nơi, 2: nhận hàng',
  `Orders_Status` tinyint(1) NOT NULL COMMENT '0: Mới, 1: đang vận chuyển, 2: Thành công',
  `Orders_Product_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Orders_Created` datetime NOT NULL,
  `Orders_Update` datetime NOT NULL,
  `Orders_Update_ID` int(10) UNSIGNED NOT NULL,
  `Orders_Update_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`Orders_ID`, `Orders_Code`, `Orders_Name`, `Orders_Phone`, `Orders_Email`, `Orders_Address`, `Orders_Mess`, `Orders_Price`, `Orders_Payway`, `Orders_Rec`, `Orders_Status`, `Orders_Product_ID`, `Orders_Created`, `Orders_Update`, `Orders_Update_ID`, `Orders_Update_Name`) VALUES
(20, '', 'test', '0937226422', 'hoangphat@gmail.com', 'etestse', 'awewef', 57330000, 0, 0, 0, '1,2', '2020-12-05 03:12:30', '0000-00-00 00:00:00', 0, ''),
(21, '', 'test', '0937226422', 'hoangphat@gmail.com', 'etestse', 'test', 40950000, 0, 0, 0, '1,2', '2020-12-05 03:24:27', '0000-00-00 00:00:00', 0, ''),
(22, '', 'test', '0937226422', 'hoangphat@gmail.com', '234234', 'cwe', 47950000, 0, 0, 0, '3,1', '2020-12-05 03:36:19', '0000-00-00 00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `Order_Detail_ID` int(10) UNSIGNED NOT NULL,
  `Order_Detail_Price` int(10) NOT NULL,
  `Order_Detail_Quanlity` int(5) UNSIGNED NOT NULL,
  `Order_Detail_Order` int(10) UNSIGNED NOT NULL,
  `Order_Detail_Product` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `Post_ID` int(10) UNSIGNED NOT NULL,
  `Post_Title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Post_Thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Post_Desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Post_Content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Post_Keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Post_Created` datetime NOT NULL,
  `Post_Update` datetime NOT NULL,
  `Post_Order` int(10) NOT NULL,
  `Post_Created_ID` int(10) UNSIGNED NOT NULL,
  `Post_Created_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Post_Cat` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `Product_ID` int(10) UNSIGNED NOT NULL,
  `Product_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_Thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Product_Imgs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Product_Desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Product_Spec` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thông số kỹ thuật',
  `Product_Gift` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Quà tặng',
  `Product_Content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Product_Discount` int(10) DEFAULT NULL,
  `Product_Price` int(10) DEFAULT NULL,
  `Product_Keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Product_Created` datetime NOT NULL,
  `Product_Update` datetime NOT NULL,
  `Product_Hot` tinyint(1) NOT NULL,
  `Product_Order` int(10) NOT NULL,
  `Product_Created_ID` int(10) UNSIGNED NOT NULL,
  `Product_Created_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_Cat` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Product_Thumbnail`, `Product_Imgs`, `Product_Desc`, `Product_Spec`, `Product_Gift`, `Product_Content`, `Product_Discount`, `Product_Price`, `Product_Keywords`, `Product_Created`, `Product_Update`, `Product_Hot`, `Product_Order`, `Product_Created_ID`, `Product_Created_Name`, `Product_Cat`) VALUES
(1, 'Vivo V20', '1607127171_p5.png', '', '																																																																																																																																																																																																																																																															', NULL, NULL, '																																																																																																																																																																																																																																																																																																																																										Thiết kế thời trang, tràn viền\r\nVivo V20 có thiết kế hiện đại theo xu hướng của những smartphone cao cấp hiện nay với thiết kế nguyên khối kết hợp cùng mặt lưng kính cao cấp tạo nên độ bóng bẩy, ấn tượng ngay từ cái nhìn đầu tiên.\r\nHơn thế nữa, các chi tiết máy được hoàn thiện tỉ mỉ đến từng chi tiết, cạnh viền được bo tròn nhẹ nhàng để tạo nên tổng thể mềm mại, vừa cho vẻ đẹp sang trọng, lại vừa cho cảm giác cầm nắm mượt mà và không bám dấu vân tay.																																																																																																																																																																																																																																																																																																																																																															', NULL, 8190000, NULL, '2020-12-04 10:46:40', '2020-12-05 01:12:51', 1, 1, 0, '', 28),
(2, 'OPPO Reno 4', '1607134299_hinh.png', '', '																																																																																																																								OPPO Reno4 - Chiếc điện thoại có thiết kế thời thượng, hiệu năng mạnh mẽ cùng bộ 4 camera siêu ấn tượng, tối ưu hóa cho ch', NULL, NULL, '																																																																																																																								Đầu tiên, OPPO Reno 4 có sự nâng cấp toàn diện so với người anh em Reno3, khi sử dụng chất liệu nhôm nguyên khối và được bọc kính cường lực Gorilla Glass 3 ở phần mặt trước và vỏ nhựa giả kính mặt lưng góp phần tăng độ cứng cáp lẫn nét sang trọng cho máy. \r\n\r\nTiếp đến là màn hình hyperbol kích thước 6.4 inch có phần viền benzel được làm siêu mỏng, độ phân giải Full HD+ (1080 x 2400 Pixels) trên nền màu AMOLED mang đến chất lượng hình ảnh rõ nét, sống động, trải nghiệm giải trí chơi game trên thiết bị này sẽ cực lỳ thích.																																																																																																																																													', NULL, 8190000, NULL, '2020-12-04 11:04:31', '2020-12-05 03:11:39', 1, 2, 0, '', 28),
(3, 'Acer Aspire A315 56 308N i3 1005G1 (NX.HS5SV.00C)', '1607118729_p2.jpg', '', '																																																												Mẫu laptop học tập văn phòng thuộc phân khúc giá thấp. Máy trang bị vi xử lí thế hệ mới của Intel, cho hiệu năng đủ dùng đối với các nhu cầu cơ bản, phù hợp với học sinh và sinh viên.												', NULL, NULL, '																																																												Acer Aspire A315 sử dụng vi xử lý Intel Core i3 thế hệ 10 mới, cho hiệu năng ổn định, khả năng kết nối tốt.\r\n\r\nMáy trang bị sẵn 4 GB RAM và một khe trống để người dùng có thể nâng cấp RAM lên tối đa 12 GB. \r\n\r\nĐây là một cấu hình không mạnh, nhưng đủ dùng đối với những ai chỉ sử dụng máy cho các nhu cầu cơ bản như Word, Excel, học tập trực tuyến qua Zoom, Teams,... hay lướt web, xem phim giải trí. 																																																																																					', NULL, 11690000, NULL, '2020-12-04 11:24:17', '2020-12-04 22:52:09', 0, 4, 0, '', 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `User_ID` int(10) UNSIGNED NOT NULL,
  `User_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Birthday` datetime DEFAULT NULL,
  `User_Pass` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Create` datetime NOT NULL,
  `User_Update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `User_Gender`, `User_Birthday`, `User_Pass`, `User_Role`, `User_Email`, `User_Phone`, `User_Create`, `User_Update`) VALUES
(1, 'hoangphat', 'male', '1993-03-05 00:00:00', 'e10adc3949ba59abbe56e057f20f883e', '0', 'hoangphat5393@gmai.com', '0937226422', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Contact_ID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Orders_ID`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Order_Detail_ID`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cat`
--
ALTER TABLE `cat`
  MODIFY `Cat_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `Contact_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `Orders_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Order_Detail_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `Post_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
