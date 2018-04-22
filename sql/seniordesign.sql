-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 10:38 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seniordesign`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `row_id` int(11) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `product` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `is_paid` int(11) DEFAULT NULL,
  `order_id` char(36) DEFAULT NULL,
  `tran_id` bigint(20) NOT NULL DEFAULT '-1',
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `is_shipped` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`row_id`, `user_email`, `user_name`, `date`, `product`, `image`, `qty`, `price`, `is_paid`, `order_id`, `tran_id`, `color`, `size`, `is_shipped`) VALUES
(53, 'test@test.com', 'test', '2018-04-22 16:59:37', 'Charcoal Grey Tie-Dyed Linen Kurta', '../MainImage/image15', 3, 0, 1, '8a184c7d-464e-11e8-8ab0-bc5ff496e86f', 8, 'Grey', 'L', 1),
(54, 'test@test.com', 'test', '2018-04-22 16:59:47', 'Black Appliqued Cotton Cushion Cover', '../MainImage/1cushionCover_NK', 5, 0, 1, '903f1916-464e-11e8-8ab0-bc5ff496e86f', 8, 'Black', 'L', 1),
(55, 'test@test.com', 'test', '2018-04-22 17:01:04', 'Black Linen Kurta with Printed Coaty', '../MainImage/image13', 1, 0, 1, 'be04d49e-464e-11e8-8ab0-bc5ff496e86f', 9, 'Black', 'L', 1),
(56, 'test@test.com', 'test', '2018-04-22 17:01:18', 'Black Nakshi Kantha Embroidered Cotton Bed Cover', '../MainImage/BedCover_nk', 6, 0, 1, 'c6592805-464e-11e8-8ab0-bc5ff496e86f', 9, 'Black', 'L', 1),
(57, 'test2@test.com', 'test2', '2018-04-22 17:05:19', 'Blue Printed and Embroidered Silk Shalwar Kameez', '../MainImage/image1', 3, 0, 1, '55d4ee77-464f-11e8-8ab0-bc5ff496e86f', 12, 'Blue', 'L', 1),
(58, 'test2@test.com', 'test2', '2018-04-22 17:05:32', 'Brown Nakshi Kantha Embroidered Silk Shawl', '../MainImage/shawl_nk', 4, 0.01, 1, '5df763ac-464f-11e8-8ab0-bc5ff496e86f', 12, 'Brown', 'L', 1),
(59, 'test2@test.com', 'test2', '2018-04-22 17:07:10', 'Black Nakshi Kantha Embroidered Cotton Bed Cover', '../MainImage/BedCover_nk', 5, 0, 1, '981df691-464f-11e8-8ab0-bc5ff496e86f', 13, 'Black', 'L', 1),
(60, 'test2@test.com', 'test2', '2018-04-22 17:50:13', 'Charcoal Grey Tie-Dyed Linen Kurta', '../MainImage/image15', 3, 0, 1, '9bc60c0c-4655-11e8-8ab0-bc5ff496e86f', 16, 'Grey', 'L', 1),
(61, 'test2@test.com', 'test2', '0000-00-00 00:00:00', 'Clay Terracotta Diya', '../MainImage/diya_acc', 4, 0, 1, 'a2483a37-4655-11e8-8ab0-bc5ff496e86f', 16, 'Brown', 'L', 1),
(62, 'test@test.com', 'test', '2018-04-22 18:37:40', 'Black Appliqued Cotton Cushion Cover', '../MainImage/1cushionCover_NK', 4, 0, 1, 'f2da83ab-4655-11e8-8ab0-bc5ff496e86f', 19, 'Black', 'L', 1),
(63, 'test@test.com', 'test', '2018-04-22 17:52:48', 'Black Nakshi Kantha Embroidered Cotton Bed Cover', '../MainImage/BedCover_nk', 5, 0, 1, 'f8710ea9-4655-11e8-8ab0-bc5ff496e86f', 19, 'Black', 'L', 0),
(64, 'test@test.com', 'test', '2018-04-22 17:55:09', 'Charcoal Grey Tie-Dyed Linen Kurta', '../MainImage/image15', 5, 0, 1, '4c0904dd-4656-11e8-8ab0-bc5ff496e86f', 21, 'Grey', 'L', 0),
(70, 'test@test.com', 'test', '2018-04-22 20:28:18', 'Blue Printed and Embroidered Silk Shalwar Kameez', '../MainImage/image1', 3, 0.06, 1, 'b1740b15-466b-11e8-8ab0-bc5ff496e86f', 31, 'Blue', 'M', 0),
(71, 'test@test.com', 'test', '2018-04-22 20:28:34', 'Blue Printed and Embroidered Silk Shalwar Kameez', '../MainImage/image1', 10, 0.07, 1, 'baa8c2c6-466b-11e8-8ab0-bc5ff496e86f', 31, 'Blue', 'L', 0),
(72, 'test@test.com', 'test', '2018-04-22 20:31:28', 'White Embroidered Cotton Bed Cover', '../MainImage/white_nk', 3, 50.01, 0, '229030e7-466c-11e8-8ab0-bc5ff496e86f', 33, 'White', 'Queen', 0),
(73, 'test@test.com', 'test', '2018-04-22 20:32:28', 'Brown Nakshi Kantha Embroidered Silk Shawl', '../MainImage/shawl_nk', 3, 0.03, 0, '464fb55e-466c-11e8-8ab0-bc5ff496e86f', 33, 'Brown', 'L', 0);

--
-- Triggers `customer_order`
--
DELIMITER $$
CREATE TRIGGER `before_insert_customer_order_trg` BEFORE INSERT ON `customer_order` FOR EACH ROW BEGIN
	if new.order_id IS NULL THEN
    	SET new.order_id = uuid();
    END If;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login_register_info`
--

CREATE TABLE `login_register_info` (
  `Username` varchar(100) NOT NULL,
  `Email Address` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_register_info`
--

INSERT INTO `login_register_info` (`Username`, `Email Address`, `password`) VALUES
('Nova', 'novarid25@gmail.com', '7b6dd7118b0b9ae3192875d38ca20c94'),
('taz', 'taznova25@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
('taznova25', 'taznova25@gmail.com', 'Helpdesk1@'),
('test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6'),
('test2', 'test2@test.com', '098f6bcd4621d373cade4e832627b4f6'),
('thename', 'email@email.com', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductTitle` varchar(100) NOT NULL,
  `productType` varchar(100) NOT NULL,
  `Price` decimal(7,2) NOT NULL,
  `Preference` varchar(20) NOT NULL,
  `Material` varchar(100) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `MainImage` varchar(100) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `prduct_info` varchar(500) DEFAULT NULL,
  `product_size` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductTitle`, `productType`, `Price`, `Preference`, `Material`, `Color`, `MainImage`, `qty`, `prduct_info`, `product_size`) VALUES
('Black Appliqued Cotton Cushion Cover', 'nakshikhanta', '0.05', 'Other', 'Cotton', 'Black', '..\\MainImage\\1cushionCover_NK', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Black Linen Kurta with Printed Coaty \r\n', 'traditionalattire', '0.05', 'women', 'Cotton', 'Black', '..\\MainImage\\image13', 10, 'Black linen kurta with metallic golden printed coaty.\r\n', 'L'),
('Black Nakshi Kantha Embroidered Cotton Bed Cover ', 'nakshikhanta', '0.05', 'Other', 'Cotton', 'Black', '..\\MainImage\\BedCover_nk', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Blue and Green Silk Blend Panjabi Pajama Coaty Set', 'traditionalattire', '0.05', 'Men', 'Silk', 'Blue', '..\\MainImage\\image3', 10, 'Blue silk panjabi with trimmed neckline and sleeves. Comes with silk and cotton pajama and green silk blend coaty.', 'L'),
('Blue Printed and Embroidered Silk Shalwar Kameez', 'traditionalattire', '0.05', 'women', 'Silk', 'Blue', '../MainImage/image1', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Brown Nakshi Kantha Embroidered Silk Shawl', 'nakshikhanta', '0.01', 'women', 'Silk', 'brown', '..\\MainImage\\shawl_nk', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Charcoal Grey Tie-Dyed Linen Kurta', 'traditionalattire', '0.05', 'women', 'Cotton', 'Grey', '..\\MainImage\\image15', 10, 'Charcoal grey tie-dyed linen with orange cowl pleat and metal buttons.', 'L'),
('Clay Five Diya Stand \r\n', 'accessories', '0.05', 'Home Decor', 'Clay', 'Brown', '..\\MainImage\\2diya_acc', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Clay Terracotta Diya \r\n', 'accessories', '0.05', 'Home Decor', 'Clay', 'Brown', '..\\MainImage\\diya_acc', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Deep Blue Embroidered Cotton Bed Cover ', 'nakshikhanta', '24.99', 'Other', 'Cotton', 'Blue', '..\\MainImage\\2bedcover_nk', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Deep Blue Striped Slim Fit Cotton Kurta ', 'traditionalattire', '26.45', 'Men', 'Cotton', 'Blue', '..\\MainImage\\image17', 10, 'Deep blue, yellow, red and grey striped cotton short kurta with metal buttons.', 'L'),
('Deep Brown Printed Slim Fit Mixed Cotton Kurta ', 'traditionalattire', '34.00', 'Men', 'Cotton', 'Brown', '..\\MainImage\\image16', 10, 'Deep brown slim fit mixed cotton short kurta with pink and green prints and metal buttons.', 'L'),
('Ecru Printed Endi Silk Shirt \r\n', 'traditionalattire', '25.99', 'Men', 'Silk', 'Pink', '..\\MainImage\\image14', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Embroidered Jute Bag', 'accessories', '19.99', 'Bag', 'Jute', 'Ivory', '..\\MainImage\\Bag_Access', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Exclusive Maroon Embroidered Silk Sherwani', 'nakshikhanta', '55.00', 'Men', 'Silk', 'Maroon', '..\\MainImage\\Sherwani', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Golden Cutwork Jewellery Box', 'accessories', '12.99', 'Jewellery Box', 'Leather', 'Goldenrod', '..\\MainImage\\jewelleryBox_Acc', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Jute Wall Hanging \r\n', 'accessories', '10.00', 'Home Decor', 'Cotton', 'Red', '..\\MainImage\\JuteWallHanging_Access', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Light Blue Nakshi Kantha Embroidered Pencil Box ', 'nakshikhanta', '15.99', 'Other', 'Cotton', 'Blue', '..\\MainImage\\PencilBox_nk', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Maroon Erri Embroidered Velvet Bag', 'accessories', '39.99', 'Bag', 'Velvet', 'Maroon', '..\\MainImage\\2Bag_Access', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Multicolour Bamboo Stick Cotton Runner ', 'accessories', '20.00', 'Home Decor', 'Cotton', 'Purple', '..\\MainImage\\multiRunner_Acc', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Nakshi Kantha Embroidered Silk Tapestry ', 'nakshikhanta', '19.99', 'Other', 'Silk', 'White', '..\\MainImage\\2WallHanging_NK', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Orange Printed and Appliqued Cotton Saree ', 'traditionalattire', '49.99', 'women', 'Cotton', 'Orange', '..\\MainImage\\image10', 10, 'Orange cotton saree with ivory, orange and blue embroidery and applique. Aanchal with tassel trim and comes with unstitched matching blouse piece.', 'L'),
('Orange Printed Cotton Kurta ', 'traditionalattire', '29.99', 'women', 'Cotton', 'Orange', '..\\MainImage\\image4', 10, 'Orange cotton kurta with red and blue prints. Blue and metallic golden printed mixed silk chosha panel on bottom.', 'L'),
('Orange Printed Cotton T-Shirt', 'traditionalattire', '15.00', 'Men', 'Cotton', 'Orange', '..\\MainImage\\orangeTshirt_traditionalattire', 10, 'Orange cotton t-shirt with metallic grey prints.', 'L'),
('Pink Lace Detailed Mixed Silk Batua \r\n', 'nakshikhanta', '30.00', 'Other', 'Silk', 'Pink', '..\\MainImage\\bag_nk', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Pink Nakshi Kantha Embroidered Endi Cotton Shawl ', 'nakshikhanta', '22.99', 'women', 'Cotton', 'pink', '..\\MainImage\\2shawl_nk', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Red Bengali Alphabet Applique Jute Wall Hanging ', 'accessories', '19.99', 'Home Decor', 'Cotton', 'Red', '..\\MainImage\\BengaliLetters_Access', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Red Nakshi Kantha Embroidered Cotton Tapestry', 'nakshikhanta', '24.99', 'Other', 'Cotton', 'Red', '..\\MainImage\\WallHanging_NK', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('White Embroidered Cotton Bed Cover', 'nakshikhanta', '50.00', 'Other', 'Cotton', 'White', '..\\MainImage\\white_nk', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('White Printed and Embroidered Cotton Panjabi ', 'traditionalattire', '32.00', 'Men', 'Cotton', 'White', '..\\MainImage\\image7', 10, 'White cotton panjabi with yellow and white prints and white embroidery on front and back.', 'L'),
('Wooden Wall Hanging \r\n', 'accessories', '45.00', 'Home Decor', 'Wood', 'Red', '..\\MainImage\\wall_Access', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Yellow Embroidered Cotton Frock ', 'traditionalattire', '19.99', 'women', 'Cotton', 'Yellow', '..\\MainImage\\image8', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Yellow Jewellery Box \r\n', 'accessories', '25.00', 'Jewellery Box', 'Leather', 'Yellow', '..\\MainImage\\jwelleryBox_acc', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt gravida est eget consectetur. Cras elementum eu dolor non pulvinar. Curabitur nec feugiat justo, nec imperdiet nisl. Nam porta vestibulum tortor nec varius. Sed nec scelerisque mauris. In dictum massa ut sem porttitor, nec luctus purus gravida. Etiam ut imperdiet ligula. Praesent ac congue est. Nulla accumsan tincidunt est vel eleifend. Duis aliquam lacus tortor, vitae scelerisque nisi ultrices id. Duis bibendum vestibulum ', 'L'),
('Yellow Tangail Sambalpuri Cotton Saree ', 'traditionalattire', '45.00', 'women', 'Cotton', 'Yellow', '..\\MainImage\\image6', 10, 'Yellow Tangail cotton saree with multicolour sambalpuri weaving. Aanchal with tassel trim and comes with striped unstitched blouse piece.', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_table`
--

CREATE TABLE `transaction_table` (
  `tran_id` bigint(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `tran_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_table`
--

INSERT INTO `transaction_table` (`tran_id`, `user_name`, `user_email`, `tran_date`) VALUES
(2, 'test', 'test@test.com', '2018-04-22 11:40:29'),
(3, 'test2', 'test2@test.com', '2018-04-22 11:41:36'),
(4, 'test', 'test@test.com', '2018-04-22 11:46:27'),
(5, 'test', 'test@test.com', '2018-04-22 11:50:34'),
(6, 'test', 'test@test.com', '2018-04-22 11:51:10'),
(7, 'test', 'test@test.com', '2018-04-22 11:54:19'),
(8, 'test', 'test@test.com', '2018-04-22 12:59:24'),
(9, 'test', 'test@test.com', '2018-04-22 13:00:33'),
(10, 'test', 'test@test.com', '2018-04-22 13:01:41'),
(11, 'test', 'test@test.com', '2018-04-22 13:04:48'),
(12, 'test2', 'test2@test.com', '2018-04-22 13:05:04'),
(13, 'test2', 'test2@test.com', '2018-04-22 13:05:59'),
(14, 'test2', 'test2@test.com', '2018-04-22 13:07:17'),
(15, 'test', 'test@test.com', '2018-04-22 13:35:30'),
(16, 'test2', 'test2@test.com', '2018-04-22 13:43:38'),
(17, 'test2', 'test2@test.com', '2018-04-22 13:50:40'),
(18, 'test2', 'test2@test.com', '2018-04-22 13:51:10'),
(19, 'test', 'test@test.com', '2018-04-22 13:52:29'),
(20, 'test', 'test@test.com', '2018-04-22 13:52:54'),
(21, 'test', 'test@test.com', '2018-04-22 13:54:54'),
(22, 'test', 'test@test.com', '2018-04-22 13:55:14'),
(23, 'test', 'test@test.com', '2018-04-22 13:55:29'),
(24, 'test', 'test@test.com', '2018-04-22 13:56:36'),
(25, 'test', 'test@test.com', '2018-04-22 14:25:58'),
(26, 'test', 'test@test.com', '2018-04-22 14:38:05'),
(27, 'test', 'test@test.com', '2018-04-22 15:14:40'),
(28, 'test', 'test@test.com', '2018-04-22 15:35:20'),
(29, 'test', 'test@test.com', '2018-04-22 16:21:44'),
(30, 'test', 'test@test.com', '2018-04-22 16:24:11'),
(31, 'test', 'test@test.com', '2018-04-22 16:25:53'),
(32, 'test', 'test@test.com', '2018-04-22 16:28:52'),
(33, 'test', 'test@test.com', '2018-04-22 16:31:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `login_register_info`
--
ALTER TABLE `login_register_info`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductTitle`);

--
-- Indexes for table `transaction_table`
--
ALTER TABLE `transaction_table`
  ADD PRIMARY KEY (`tran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `transaction_table`
--
ALTER TABLE `transaction_table`
  MODIFY `tran_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
