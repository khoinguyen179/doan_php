-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 21, 2021 lúc 03:16 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhasach`
--
CREATE DATABASE IF NOT EXISTS `nhasach` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nhasach`;

DELIMITER $$
--
-- Thủ tục
--
DROP PROCEDURE IF EXISTS `capnhatgia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `capnhatgia` (IN `ma_sach` VARCHAR(15), IN `gia_moi` INT(10))  BEGIN
UPDATE sach
SET gia=gia_moi
WHERE masach=ma_sach;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethd`
--

DROP TABLE IF EXISTS `chitiethd`;
CREATE TABLE IF NOT EXISTS `chitiethd` (
  `mahd` varchar(100) NOT NULL,
  `masach` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `gia` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`mahd`,`masach`),
  KEY `masach` (`masach`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitiethd`
--

INSERT INTO `chitiethd` (`mahd`, `masach`, `soluong`, `gia`) VALUES
('abcd@yahoo.com1541841165', 'td01', 9, 450000),
('abcd@yahoo.com1541841165', 'th03', 2, 76000),
('abcd@yahoo.com1541907522', 'td01', 1, 450000),
('abcd@yahoo.com1541907522', 'td02', 5, 195000),
('abcd@yahoo.com1541909715', 'td02', 5, 195000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coments`
--

DROP TABLE IF EXISTS `coments`;
CREATE TABLE IF NOT EXISTS `coments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` char(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(150) NOT NULL,
  `comment` mediumtext NOT NULL,
  `postingdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `coments`
--

INSERT INTO `coments` (`id`, `post`, `name`, `email`, `comment`, `postingdate`) VALUES
(1, 'th12', 'khoi', 'khoi179@gmail.com', 'good', '2021-12-18 16:22:36'),
(2, 'td03', 'khoi', 'khoi179@gmail.com', 'good\r\n', '2021-12-18 16:22:45'),
(3, 'td04', 'khoi', 'khoi179@gmail.com', 'good\r\n', '2021-12-18 16:24:20'),
(4, 'th06', 'khoi', 'khoi179@gmail.com', 'good\r\n', '2021-12-18 16:24:38'),
(5, 'td01', 'khoi', 'khoi179@gmail.com', 'good\r\n', '2021-12-18 16:25:10'),
(6, 'th12', 'khoi', 'khoi179@gmail.com', '', '2021-12-20 09:59:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `mahd` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `ngayhd` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tennguoinhan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachinguoinhan` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaynhan` date NOT NULL DEFAULT '0000-00-00',
  `dienthoainguoinhan` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`mahd`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `email`, `ngayhd`, `tennguoinhan`, `diachinguoinhan`, `ngaynhan`, `dienthoainguoinhan`) VALUES
('abcd@yahoo.com1541840637', 'abcd@yahoo.com', '2018-11-10 16:03:57', 'a', 'b', '2018-11-22', '1234567'),
('abcd@yahoo.com1541840769', 'abcd@yahoo.com', '2018-11-10 16:06:09', 'a', 'b', '2018-11-22', '1234567'),
('abcd@yahoo.com1541841019', 'abcd@yahoo.com', '2018-11-10 16:10:19', 'a', 'b', '2018-11-22', '1234567'),
('abcd@yahoo.com1541841165', 'abcd@yahoo.com', '2018-11-10 16:12:45', 'a', 'g', '2018-11-15', '1234567'),
('abcd@yahoo.com1541907522', 'abcd@yahoo.com', '2018-11-11 10:38:42', 'a', 'v', '2018-11-22', '132546457'),
('abcd@yahoo.com1541909715', 'abcd@yahoo.com', '2018-11-11 11:15:15', 'a', 's', '2018-11-22', '5436546');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `email` varchar(50) NOT NULL DEFAULT '',
  `matkhau` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenkh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`email`, `matkhau`, `tenkh`, `diachi`, `dienthoai`) VALUES
('abcd@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Minh Triết', 'Q1', '99999999'),
('hung.stu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Đại Ca - Trần văn Hùng', 'Quận 3', '090090999');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `maloai` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
('an', 'Anime'),
('l1', 'loai 1'),
('l2', 'loai 2'),
('l3', 'loai 3'),
('l4', 'loai 4'),
('l5', 'loai 5b'),
('ln', 'Light novel'),
('mg', 'Manga'),
('nn', 'Ngoại Ngữ'),
('pl', 'Pháp Luật'),
('td', 'Từ Điển'),
('test', 'Loai Moi'),
('th', 'Tin Học'),
('to', 'Toán Học'),
('tt', 'The Thao Du Lich'),
('vh', 'Văn Học'),
('vhxh', 'Van Hoa xa Hoi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxb`
--

DROP TABLE IF EXISTS `nhaxb`;
CREATE TABLE IF NOT EXISTS `nhaxb` (
  `manxb` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tennxb` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manxb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nhaxb`
--

INSERT INTO `nhaxb` (`manxb`, `tennxb`) VALUES
('gd', 'Giáo dục'),
('hcm', 'Tổng Hợp Hồ Chí Minh'),
('hnv', 'Hội Nhà Văn'),
('pn', 'Phụ Nữ'),
('tn', 'Thanh Niên'),
('vh', 'Văn Học'),
('vhtt', 'Văn Hóa Thông Tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantri`
--

DROP TABLE IF EXISTS `quantri`;
CREATE TABLE IF NOT EXISTS `quantri` (
  `username` varchar(30) NOT NULL,
  `matkhau` varchar(32) DEFAULT NULL,
  `hoten` varchar(100) CHARACTER SET utf8 NOT NULL,
  `quyen` int(1) NOT NULL COMMENT '1:  supper admin, 2:nhan viên, 3:...',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `quantri`
--

INSERT INTO `quantri` (`username`, `matkhau`, `hoten`, `quyen`) VALUES
('abcd', '81dc9bdb52d04dc20036dbd8313ed055', 'Nguyễn văn A', 2),
('hung', 'e10adc3949ba59abbe56e057f20f883e', 'Lên Văn An', 2),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Trần Văn Hùng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

DROP TABLE IF EXISTS `sach`;
CREATE TABLE IF NOT EXISTS `sach` (
  `masach` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tensach` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `luotxem` int(10) DEFAULT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `manxb` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maloai` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date DEFAULT NULL,
  PRIMARY KEY (`masach`),
  KEY `manxb` (`manxb`,`maloai`),
  KEY `maloai` (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `mota`, `luotxem`, `hinh`, `manxb`, `maloai`, `ngaydang`) VALUES
('ac1', 'xxxxx', 'yyyyyy', NULL, 'td01.jpg', 'gd', 'ln', NULL),
('ac2', 'xxxxxxxxxxxx', 'yyyyyyyyyyyyyy', NULL, 'anime-arifureta-shokugyou-de-sekai-saikyou.jpg', 'gd', 'an', NULL),
('td01', 'Manga Kaguya-sama: Love is War bước vào Arc cuối', 'Số 45 Weekly Young Jump năm nay của Shueisha đã tiết lộ vào 07/10/2021 rằng manga Kaguya-sama: Love is War (Kaguya-sama wa Kokurasetai – Tensai-tachi no Renai Zunōsen) của Aka Akasaka đang bước vào Arc cuối cùng. Manga cũng sẽ tạm nghỉ trong số tiếp theo của tạp chí và sẽ trở lại trong số 47 vào ngày 21 tháng 10.\r\n\r\nBộ manga đã tạm ngừng hoạt động vào tháng 5 để Akasaka có thể viết và sáng tác phần hành động mới của manga.', 24589, 'td01.jpg', 'gd', 'mg', '2021-10-07'),
('td02', 'Manga Nhà có 5 nàng dâu sắp xuất hiện tại Việt Nam', 'Mới đây, Fanpage NXB Kim Đồng đã hé lộ ảnh bìa tập 1 của manga 5Toubun no Hanayome, được độc giả', 11367, 'td02.png', 'vhtt', 'mg', '2021-07-12'),
('td03', 'Dự đoán Tensei Shitara Slime Datta Ken chap 91', 'Tensei Shitara Slime Datta Ken - Chuyển Sinh Thành Slime 91 dự kiến phát hành ngày 24 tháng 12 năm 2021.', 22356, 'rimuru.jpg', 'hcm', 'mg', '2021-11-29'),
('td04', 'Dragon Ball Super 2022 : SUPER HERO – Teaser ', 'Ngày 15/12, TOEI tiếp tục nhá hàng với Poster mới. Nhìn sắc thái của Poster thì có vẻ', 17634, 'dragonball.jpg', 'tn', 'an', '2021-12-16'),
('td05', 'Makoto Shinkai tiết lộ Movie Anime mới Suzume no Tojimari', 'Makoto Shinkai đã tiết lộ tác phẩm mới của mình Suzume no Tojimari vào 15/12/2021 trong một cuộc họp ', 14983, 'anime-moi-suzume-no-tojimari.jpg', 'hcm', 'an', '2021-12-16'),
('td06', 'Saori Hayami vào vai Yamato trong Anime One Piece', 'Tài khoản Twitter chính thức cho series One Piece của Eiichiro Oda đã thông báo vào 31/08/2021 rằng anime đã chọn Saori Hayami vào vai Yamato', 17243, 'one-piece.jpg', 'hcm', 'an', '2021-08-31'),
('th01', 'Anime Date A Live IV bị trì hoãn đến 2022, tiết lộ thêm nhân sự', 'Trang web chính thức của series anime truyền hình Date A Live IV đã bắt đầu phát trực tuyến video quảng cáo', 19687, 'DAL.jpg', 'hcm', 'an', '2021-09-13'),
('th02', 'Phần 2 Mùa Cuối Attack on Titan sẽ chiếu vào tháng 1!', 'Trang web chính thức của anime Attack on Titan The Final Season đã thông báo vào Chủ nhật rằng Phần 2 của mùa sẽ ra mắt với tập 76', 22335, 'AOT.jpg', 'hcm', 'an', '2021-10-15'),
('th03', 'Anime My Hero Academia sẽ có Mùa 6', 'Tập thứ 25 và là tập cuối cùng của mùa thứ năm của anime My Hero Academia (tập thứ 113 tổng thể) đã thông báo vào thứ Bảy rằng anime sẽ có mùa thứ sáu', 20147, 'MHA.jpg', 'hcm', 'an', '2021-09-26'),
('th04', 'JoJo’s bizarre adventure sẽ ra mắt vào tháng 12', 'Số tháng 11 của tạp chí Ultra Jump xuất bản bởi Shueisha đã thông báo vào thứ Ba (19/10) rằng manga ngoại truyện', 18000, 'jojo.jpg', 'hcm', 'an', '2021-10-19'),
('th05', 'Anime Tonikaku Kawaii sẽ có tập mới và Mùa 2', 'Trang web chính thức của anime TONIKAWA: Over The Moon For You', 21004, 'anime-tonikaku-kawaii.jpg', 'vhtt', 'an', '2021-11-07'),
('th06', 'Showtime!: Uta no Oneesan datte Shitai sẽ có Mùa 2', 'Kênh YouTube chính thức của khối chương trình phim hoạt hình dành cho người lớn AnimeFesta ', 20486, 'anime-showtime-uta-no-oneesan-datte-shitai.jpeg', 'hcm', 'an', '2021-11-22'),
('th07', 'Arifureta Shokugyou de Sekai Saikyou Mùa 2 ', 'Trang web Comic Natalie đã thông báo thêm về dàn diễn viên và buổi ra mắt ngày 13 tháng 1 ', 13366, 'anime-arifureta-shokugyou-de-sekai-saikyou.jpg', 'tn', 'an', '2021-11-25'),
('th08', 'Movie Kitarou Tanjou: Gegege no Nazo tiết lộ Teaser', 'Movie nằm trong 4 “đại dự án” kỷ niệm 100 năm ngày sinh của Shigeru Mizuki. Mizuki qua đời năm 2015,', 16322, 'movie-kitarou-tanjou-gegege-no-nazo.jpg', 'hcm', 'an', '2021-11-29'),
('th09', 'Anime Eiyuuou, Bu wo Kiwameru Tame Tenseisu ', 'Tài khoản Twitter chính thức của nhà xuất bản HJ Bunko thuộc Hobby Japan đã thông báo vào 29/11/2021', 17483, 'eiyuuou-bu-wo-kiwameru-tame-tenseisu.jpg', 'tn', 'an', '2021-11-30'),
('th10', 'Anime Karakai Jouzu no Takagi-san 3 tiết lộ ra mắt vào 07/01', 'Trang web chính thức của anime truyền hình chuyển thể từ manga Teasing Master Takagi-san', 13654, 'anime-karakai-jouzu-no-takagi-san-3.jpg', 'tn', 'an', '2021-12-10'),
('th11', 'Anime Magia Record bị trì hoãn đến Mùa Xuân 2022', 'Trang web chính thức của Magia Record: Puella Magi Madoka Magica Side Story đã thông báo', 11845, 'anime-magia-recordi.jpg', 'gd', 'an', '2021-12-14'),
('th12', 'Shijou Saikyou no Daimaou với video quảng cáo đầu tiên', 'Trang web chính thức của anime chuyển thể từ tiểu thuyết The Greatest Demon Lord is Reborn as a Typical Nobody', 15903, 'anime-shijou-saik.jpg', 'gd', 'an', '2021-12-17'),
('th13', 'Fairy Tail: 100 Years Quest Sequel sẽ có Anime truyền hình', 'Buổi phát trực tiếp “Hiro Mashima Fan meeting @ Mixalive Tokyo” đã kết thúc vào11/09/2021', 15543, 'fairy-tail.jpeg', 'gd', 'an', '2021-09-13'),
('th14', 'Movie thứ 2 của Gundam: có thể phải ra mắt sau năm 2024', 'Shukou Murase – đạo diễn của dự án anime Mobile Suit Gundam Hathaway ', 12743, 'gundam.jpg', 'gd', 'ln', '2021-12-04');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `sachgiacao`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `sachgiacao`;
CREATE TABLE IF NOT EXISTS `sachgiacao` (
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `sachgiacao`
--
DROP TABLE IF EXISTS `sachgiacao`;

DROP VIEW IF EXISTS `sachgiacao`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sachgiacao`  AS  select `sach`.`masach` AS `masach`,`sach`.`tensach` AS `tensach`,`sach`.`mota` AS `mota`,`sach`.`gia` AS `gia`,`sach`.`hinh` AS `hinh`,`sach`.`manxb` AS `manxb`,`sach`.`maloai` AS `maloai` from `sach` order by `sach`.`gia` desc limit 0,2 ;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `chitiethd_ibfk_1` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiethd_ibfk_2` FOREIGN KEY (`masach`) REFERENCES `sach` (`masach`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`email`) REFERENCES `khachhang` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`manxb`) REFERENCES `nhaxb` (`manxb`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
