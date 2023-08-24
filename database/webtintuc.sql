-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 24, 2023 lúc 09:23 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webtintuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(4) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idTinTuc` int(11) NOT NULL,
  `NoiDung` longtext NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `idUser`, `idTinTuc`, `NoiDung`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'qua hay', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `id` int(4) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `idTheLoai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitin`
--

INSERT INTO `loaitin` (`id`, `Ten`, `created_at`, `updated_at`, `idTheLoai`) VALUES
(1, 'Phim tháng 10', NULL, NULL, 4),
(2, 'Phim tháng 11', NULL, NULL, 4),
(3, 'Phim tháng 12', NULL, NULL, 4),
(4, 'Truyện tranh', NULL, NULL, 5),
(5, 'Truyện cười', NULL, NULL, 5),
(6, 'Bóng đá', NULL, NULL, 1),
(7, 'Showbiz', NULL, NULL, 2),
(8, 'Khởi nghiệp', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(4) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `Hinh` varchar(255) NOT NULL,
  `NoiDung` mediumtext NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(4) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `Ten`, `created_at`, `updated_at`) VALUES
(1, 'Sports', NULL, NULL),
(2, 'Entertainment', NULL, NULL),
(3, 'Business', NULL, NULL),
(4, 'Movies', NULL, NULL),
(5, 'Books', NULL, NULL),
(29, 'dadsadsa1', '2023-07-29 03:56:51.000000', '2023-07-29 03:57:01.000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(4) NOT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `TomTat` varchar(255) NOT NULL,
  `NoiDung` mediumtext DEFAULT NULL,
  `Hinh` varchar(255) NOT NULL,
  `NoiBat` int(4) DEFAULT NULL,
  `SoLuotXem` int(4) DEFAULT NULL,
  `idLoaiTin` int(4) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `TieuDe`, `TomTat`, `NoiDung`, `Hinh`, `NoiBat`, `SoLuotXem`, `idLoaiTin`, `created_at`, `updated_at`) VALUES
(1, 'Fan Việt có thể “nhuộm đỏ” World Cup cổ vũ ĐT nữ Việt Nam: Có cả nghìn vé miễn phí', 'World Cup 2023 đăng cai ở 2 nước Australia và New Zealand năm nay nhưng trong khi Australia tỏ ra khá hào hứng với sự kiện này (nhất là đội tuyển của họ vừa mạnh vừa sở hữu một trong những siêu sao lớn nhất thế giới là tiền đạo Sam Kerr), người dân New Ze', 'Trong một cuộc phỏng vấn cho tờ New Zealand Herald, bà Sarai Bareman đứng đầu bộ phận bóng đá nữ của FIFA cho biết lượng vé bán được cho các trận đấu tổ chức tại New Zealand đã gây ra sự lo lắng từ phía FIFA. Một trong những nhà tài trợ của giải đấu, hãng công nghệ Xero có trụ sở tại New Zealand, đã công bố họ sẽ phát 5.000 vé miễn phí cho các trận đấu tổ chức tại 4 thành phố của nước này là Dunedin, Wellington, Hamilton và Auckland kể từ ngày 20/7 trở đi.\r\n\r\nNick Sautner, giám đốc điều hành của công ty Eden Park chuyên quản lý các sân vận động ở New Zealand, cũng tỏ ra lo lắng và đặt câu hỏi liệu người dân New Zealand có biết được tầm quan trọng của sự kiện World Cup 2023 tổ chức ở nước mình hay không. “Đây sẽ là một sự kiện dự kiến thu hút 2 tỷ khán giả theo dõi và chúng tôi bán vé ở mức chỉ 10 USD cho trẻ em và 20 USD cho người lớn. Chúng tôi cần người dân trân trọng sự quý giá từ những trải nghiệm giải đấu này mang lại”, ông nói.\r\n\r\nTheo New Zealand Herald, tổng số vé phát miễn phí cho các trận đấu tại New Zealand đã lên tới 20.000 vé, cho thấy vé bán khá chậm dù giải đấu 1 tuần nữa là khởi tranh. Thậm chí cựu Thủ tướng nước này Jacinda Ardern đã dùng tài khoản Instagram của bà để kêu gọi đồng bào đi lấy vé, thậm chí gắn cả đường dẫn tới địa chỉ phát vé.', 'bongda.jpg', 1, 114, 6, '2023-07-14 11:04:11.000000', NULL),
(2, 'MU tính giải cứu \"tiểu Ronaldo\" Felix, quyết đấu 2 đại gia PSG và Newcastle', 'MU đang miệt mài tìm kiếm một chân sút đẳng cấp ở kỳ chuyển nhượng hè 2023 nhằm tăng cường sức mạnh cho hàng công. Tuy nhiên, quá trình theo đuổi các mục tiêu hàng đầu của \"Quỷ đỏ\" như Harry Kane (Tottenham), Victor Osimhen (Napoli), Goncalo Ramos (Benfic', 'Trước tình cảnh đó, theo kênh truyền hình ABC (Tây Ban Nha), HLV Erik Ten Hag đang xem xét khả năng chuyển hướng sang chân sút bị thất sủng ở Atletico Madrid, Joao Felix. Do mâu thuẫn với HLV Diego Simeone, Felix bị đẩy sang Chelsea theo dạng cho mượn ở giai đoạn lượt về mùa giải 2022/23. Tuy nhiên, tiền đạo người Bồ Đào Nha chỉ đóng góp 4 bàn sau 20 trận trên mọi đấu trường, còn Chelsea cũng quyết định không bỏ ra số tiền 100 triệu euro (87 triệu bảng) mua đứt Felix.\r\n\r\nTrở lại Atletico, tình hình chẳng mấy khả quan hơn với cầu thủ 23 tuổi. Anh phải xuống tập luyện cùng đội trẻ vì thái độ thiếu chuyên nghiệp, đồng thời bị tước áo số 7 để trao cho Antoine Griezmann. Hiện Felix đã yêu cầu người đại diện Jorge Mendes tìm bến đỗ mới vào mùa hè này. ABC cho biết MU là 1 trong 3 đại diện Ngoại hạng Anh bày tỏ sự quan tâm tới cầu thủ 23 tuổi , bên cạnh Newcastle và Aston Villa. Cá nhân Felix cũng tỏ ra hứng thú với viễn cảnh trở lại Ngoại hạng Anh.', 'bongda2.jpg', 0, 209, 6, '2023-07-15 11:04:48.000000', NULL),
(3, '\'Quỷ quyệt 5\' vượt mặt \'Indiana Jones 5\' về doanh thu', 'Theo Hollywood Reporter, phần 5 thuộc loạt phim kinh dị ăn khách Insidious gây bất ngờ khi thu về 32,7 triệu USD từ thị trường nội địa. Khởi chiếu ngày 7/7, Insidious: The Red Door dễ dàng soán ngôi vương phòng vé của Indiana Jones and the Dial of Destiny', 'Theo Hollywood Reporter, phần 5 thuộc loạt phim kinh dị ăn khách Insidious gây bất ngờ khi thu về 32,7 triệu USD từ thị trường nội địa. Khởi chiếu ngày 7/7, Insidious: The Red Door dễ dàng soán ngôi vương phòng vé của Indiana Jones and the Dial of Destiny chỉ sau 3 ngày đầu ra mắt.\r\n\r\nBất chấp đánh giá thấp từ giới phê bình, Insidious 5 được coi là thành công về mặt thương mại khi thu về 64 triệu USD toàn cầu so với kinh phí vỏn vẹn 16 triệu USD. Bên cạnh vai chính, bộ phim đánh dấu màn chào sân của Patrick Wilson trong vai trò đạo diễn.\r\n\r\nNgược lại, bom tấn có sự góp mặt của Harrison Ford chật vật khi chỉ thu về 26,5 triệu USD vào cuối tuần qua. Số liệu từ Box Office Mojo cho thấy Indiana Jones 5 đã sụt giảm hơn 55%. Hiện tại, bộ phim mới đạt mốc 247 triệu USD toàn cầu so với ngân sách sản xuất đồ sộ lên tới 300 triệu USD.', 'phim.jpg', 1, 364, 3, '2023-07-12 11:05:58.000000', NULL),
(4, 'Khủng hoảng của Disney', 'Phòng vé toàn cầu bị thu hẹp, các phim kinh phí lớn ghi nhận doanh thu nhỏ giọt, kinh doanh bấp bênh... là những khó khăn Disney phải đối mặt lúc này.', 'Theo Variety, Disney là hãng phim bất khả xâm phạm trong thập kỷ qua nhờ khả năng thích nghi tốt với những thay đổi mang tính kiến tạo của ngành điện ảnh, đồng thời được củng cố vững chắc bởi kho tài sản chủ chốt gồm Marvel, Lucasfilm và Pixar.\r\n\r\nNhưng năm nay, \"gã khổng lồ phòng vé\" bộc lộ rạn nứt khi 4 trong nhiều phim của họ gặp khó khăn, từ màn chào sân tệ của Ant-Man and the Wasp: Quantumania, phiên bản live-action của The Little Mermaid không đạt kỳ vọng, Elemental - phim Pixar có doanh thu mở màn tệ nhất (29,6 triệu USD), cho đến Indiana Jones and the Dial of Destiny - tác phẩm có kinh phí 300 triệu USD đang chật vật tại phòng vé.', 'phim2.jpg', 0, 221, 2, '2023-07-11 11:06:20.000000', NULL),
(5, 'Doctor Strange tái xuất', 'Trước đó, cảnh post-credit của Doctor Strange in the Multiverse of Madness hé lộ vai trò quan trọng của nhân vật trong tương lai. Điều này khiến nhiều khán giả cảm thấy thắc mắc liệu Marvel Studios có ưu tiên ra mắt phần 3 của Dr. Strange hay tập trung ph', 'GIẢI TRÍ\r\n\r\nDoctor Strange tái xuất\r\nTống Khang Thứ tư, 5/7/2023 16:42 (GMT+7)Tài tử Benedict Cumberbatch tiết lộ rằng sẽ trở lại với vai phù thủy tối thượng trong năm 2024, tờ The Direct đưa tin ngày 4/7.\r\nTrước đó, cảnh post-credit của Doctor Strange in the Multiverse of Madness hé lộ vai trò quan trọng của nhân vật trong tương lai. Điều này khiến nhiều khán giả cảm thấy thắc mắc liệu Marvel Studios có ưu tiên ra mắt phần 3 của Dr. Strange hay tập trung phát triển các dự án xoay quanh trận chiến Kang Dynasty.\r\n\r\nMới đây, xuất hiện với tư cách khách mời trong JW3 Speaker Series, nam diễn viên Benedict Cumberbatch xác nhận sẽ trở lại với vai Doctor Strange và tham gia ghi hình cho dự án được bấm máy trong năm tới.\r\n\r\nTheo The Direct, có khả năng tài tử đang đề cập đến việc quay phim Avengers: The Kang Dynasty. Song, xem xét trong bối cảnh những sự kiện Marvel Studios hé lộ gần đây, điều này dường như vẫn còn khá mơ hồ. Thời điểm hiện tại, hãng vẫn chưa có động thái công bố dự án Doctor Strange 3.', 'phim3.jpg', 1, 254, 1, '2023-07-10 11:06:42.000000', NULL),
(6, 'Johnny Depp được trả lại nhà từng bị tịch thu', 'Hai ngôi nhà tổng trị giá 10 triệu USD được trả lại cho Johnny Depp sau khi bị tịch thu làm tài sản thế chấp.\r\nTheo NY Post, ngôi nhà trên đại lộ N. Sweetzer (khu Tây Hollywood) đã được trả lại cho Depp sau khi tài tử thanh toán khoản vay của mình. Năm 20', 'Lâu đài kiểu gothic của tài tử diện tích khoảng 690 mét vuông, có tám phòng ngủ, 10 phòng tắm, các tháp canh và mái nhọn. Diễn viên mua cơ ngơi này vào năm 1995 với giá 2,15 triệu USD. Căn hộ nằm trong một ngõ cụt, lối vào được trồng nhiều cây để tạo sự riêng tư.\r\n\r\nTheo Daily Mail, Depp đã vay ngân hàng City National Bank để lấy lại các bất động sản, sau khi tốn khoảng 650 triệu USD cho vụ kiện với vợ cũ Amber Heard và những lần \"mạnh tay\" chi tiêu khác. Dù bỏ ra khoản tiền lớn để giữ hai căn nhà, Depp không thường xuyên lui tới đây, tình trạng biệt thự xuống cấp, cây cối mọc um tùm. Thay vào đó, diễn viên Cướp biển vùng Caribe dành phần lớn thời gian rảnh tại hòn đảo ở Bahamas.\r\nHiện Depp thực hiện chuyến lưu diễn châu Âu với ban nhạc Hollywood Vampires do tài tử, Alice Cooper và Joe Perry thành lập. Hôm 10/7, các nghệ sĩ chơi nhạc ở London (Anh).', 'entertainment.jpg', 0, 212, 7, '2023-07-09 11:07:06.000000', NULL),
(7, 'Phong Thần Đã Cập nhật Chương Mới\r\n', 'Phong thần diễn nghĩa khởi đầu với chuyện kể về vua Trụ nhà Thương đến miếu thờ Thần Nữ Oa dâng hương, đã đề thơ với hàm ý bất kính khiến cho Nữ Oa nổi giận. Sau khi bấm tay biết vận số nhà Thương còn 28 năm mới chấm dứt', 'Phong thần diễn nghĩa khởi đầu với chuyện kể về vua Trụ nhà Thương đến miếu thờ Thần Nữ Oa dâng hương, đã đề thơ với hàm ý bất kính khiến cho Nữ Oa nổi giận. Sau khi bấm tay biết vận số nhà Thương còn 28 năm mới chấm dứt, Nữ Oa đã sai ba yêu quái ở mộ Hiên Viên mê hoặc vua Trụ nhằm nhanh chóng làm cho nhà Thương sụp đổ, nhưng không được giết người. Một trong ba yêu quái là hồ ly tinh đã đạt hỏa hầu tu luyện ngàn năm, chiếm thân xác Đát Kỷ, một cô gái đẹp, con gái Ký Châu Tô Hộ, được tiến cung để ra mắt nhà vua. Được nhà vua sủng ái, Đát Kỷ giả dần dần lộng hành, trừ khử các bề tôi trung thực bằng bào lạc (trụ đồng nung đỏ), bày mưu cùng Vu Hồn giết Khương hoàng hậu và toan giết cả hai hoàng tử là Ân Giao và Ân Hồng. Bên cạnh đó, Đát Kỷ giả còn tìm cách hại 4 chư hầu lớn, xui vua Trụ mời họ vào chầu rồi bắt Tây Bá Hầu là Cơ Xương bỏ ngục.', 'truyentranh.jpg', 0, 142, 4, '2023-07-08 11:07:28.000000', NULL),
(8, '10 truyện cười hot nhất tuần qua', 'Đêm tân hôn của đôi vợ chồng trẻ, hôn rất có hại cho sức khỏe, hay kinh nghiệm tán gái... là những truyện cười được yêu thích nhất.', '\r\nHệ thống bạch huyết trong cơ thể có khả năng thu thập và lọc các độc tố. Nhảy lên giúp kích thích hệ thống bạch huyết loại bỏ độc tố, giảm cholesterol và thậm chí giúp giảm viêm mô tế bào nguy hiểm. Đây là một hoạt động vận động đơn giản nhưng mang lại nhiều lợi ích cho sức khỏe.\r\nNghiên cứu cho thấy việc làm việc nhà lặt vặt thường xuyên có thể cải thiện chức năng của hệ thống tim mạch. Nó cung cấp lợi ích cho tim bằng cách cải thiện lượng lipid, giảm triglyceride và cholesterol, đồng thời ngăn ngừa các bệnh tim mạch. Việc làm việc nhà là một hoạt động vận động tốt cho quá trình trao đổi chất trong cơ thể và giúp loại bỏ độc tố.\r\n', 'truyencuoi.jpg', 0, 34, 5, '2023-07-07 11:07:46.000000', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `token` varchar(20) DEFAULT NULL,
  `password` mediumtext NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `status`, `token`, `password`, `created_at`, `updated_at`) VALUES
(1, 'phat', 'phatttps24519@fpt.edu.vn', 1, 0, NULL, '12345678', NULL, '2023-08-01 08:22:10.000000'),
(46, 'Truong Thanh Phat', 'phatdsw2303@gmail.com', 1, 1, '5g1xizLhld', '$2y$10$QrSd8LUX2ahn.D.egfhlC.4yT7dhbemVo/ZZ8JO4V2J5/LaWiBT4e', '2023-08-11 11:05:40.000000', '2023-08-11 11:25:38.000000');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_users` (`idUser`),
  ADD KEY `fk_comment_tintuc` (`idTinTuc`);

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_loaitin_theloai` (`idTheLoai`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tintuc_loaitin` (`idLoaiTin`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_tintuc` FOREIGN KEY (`idTinTuc`) REFERENCES `tintuc` (`id`),
  ADD CONSTRAINT `fk_comment_users` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `fk_loaitin_theloai` FOREIGN KEY (`idTheLoai`) REFERENCES `theloai` (`id`);

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `fk_tintuc_loaitin` FOREIGN KEY (`idLoaiTin`) REFERENCES `loaitin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
