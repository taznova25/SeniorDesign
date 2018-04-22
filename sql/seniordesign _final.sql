-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 12:51 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(75, 'test@test.com', 'test', '2018-04-22 21:20:08', 'Charcoal Grey Tie-Dyed Linen Kurta', '../MainImage/image15', 3, 0.06, 1, '87510913-4673-11e8-a715-34e6d781c404', 1, 'Grey', 'M', 1),
(77, 'test@test.com', 'test', '2018-04-22 21:22:58', 'Black Appliqued Cotton Cushion Cover', '../MainImage/1cushionCover_NK', 2, 0.06, 1, '030e7a5d-4674-11e8-a715-34e6d781c404', 1, 'Black', 'M', 1),
(78, 'test@test.com', 'test', '2018-04-22 21:23:22', 'Orange Printed Cotton Kurta', '../MainImage/image4', 2, 30, 0, 'a08b485d-4674-11e8-a715-34e6d781c404', 3, 'Orange', 'M', 0),
(86, 'martha@yahoo.com', 'Martha', '2018-04-22 21:49:42', 'Charcoal Grey Tie-Dyed Linen Kurta', '../MainImage/image15', 6, 0.05, 0, '4de43b49-4678-11e8-a715-34e6d781c404', 6, 'Grey', 'S', 0),
(87, 'peter@gmail.com', 'Peter', '2018-04-22 22:02:35', 'Blue Printed and Embroidered Silk Shalwar Kameez', '../MainImage/image1', 2, 0.06, 1, '1b0f09f1-467a-11e8-a715-34e6d781c404', 7, 'Blue', 'M', 0),
(88, 'peter@gmail.com', 'Peter', '2018-04-22 22:02:49', 'Blue and Green Silk Blend Panjabi Pajama Coaty Set', '../MainImage/image3', 3, 0.06, 1, '230a5724-467a-11e8-a715-34e6d781c404', 7, 'Blue', 'M', 0),
(89, 'peter@gmail.com', 'Peter', '2018-04-22 22:19:39', 'Charcoal Grey Tie-Dyed Linen Kurta', '../MainImage/image15', 4, 0.06, 1, '7d5d6a76-467c-11e8-a715-34e6d781c404', 9, 'Grey', 'M', 0),
(90, 'peter@gmail.com', 'Peter', '2018-04-22 22:37:22', 'Charcoal Grey Tie-Dyed Linen Kurta', '../MainImage/image15', 1, 0.05, 1, 'f6f846ef-467e-11e8-a715-34e6d781c404', 10, 'Grey', 'S', 0),
(91, 'peter@gmail.com', 'Peter', '2018-04-22 22:38:20', 'Brown Nakshi Kantha Embroidered Silk Shawl', '../MainImage/shawl_nk', 4, 0.02, 1, '1993f04d-467f-11e8-a715-34e6d781c404', 11, 'Brown', 'M', 0);

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
('Martha', 'martha@yahoo.com', '098f6bcd4621d373cade4e832627b4f6'),
('Nova', 'novarid25@gmail.com', '7b6dd7118b0b9ae3192875d38ca20c94'),
('Peter', 'peter@gmail.com', '51dc30ddc473d43a6011e9ebba6ca770'),
('taz', 'taznova25@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
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
(1, 'test', 'test@test.com', '2018-04-22 17:15:09'),
(2, 'test', 'test@test.com', '2018-04-22 17:19:28'),
(3, 'test', 'test@test.com', '2018-04-22 17:23:10'),
(4, 'Peter', 'peter@gmail.com', '2018-04-22 17:33:49'),
(5, 'Peter', 'peter@gmail.com', '2018-04-22 17:37:27'),
(6, 'Martha', 'martha@yahoo.com', '2018-04-22 17:40:03'),
(7, 'Peter', 'peter@gmail.com', '2018-04-22 18:00:30'),
(8, 'Peter', 'peter@gmail.com', '2018-04-22 18:05:03'),
(9, 'Peter', 'peter@gmail.com', '2018-04-22 18:06:41'),
(10, 'Peter', 'peter@gmail.com', '2018-04-22 18:22:12'),
(11, 'Peter', 'peter@gmail.com', '2018-04-22 18:37:50'),
(12, 'Peter', 'peter@gmail.com', '2018-04-22 18:38:41');

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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `transaction_table`
--
ALTER TABLE `transaction_table`
  MODIFY `tran_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
