-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: cmsc207
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rating` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'2025-05-01 08:38:47','2025-05-01 08:38:47','Bamboo Toothbrush','A biodegradable toothbrush with a 100% bamboo handle and BPA-free nylon bristles.',120,100,'/images/products/bamboo-toothbrush.jpeg',4),(2,'2025-05-01 08:38:47','2025-05-01 08:38:47','Metal Straw Set','A stainless steel straw set with a cleaning brush and pouch — perfect for reducing plastic waste.',150,100,'/images/products/metal-straws.jpg',3),(3,'2025-05-01 08:38:47','2025-05-01 08:38:47','Refillable Liquid Hand Soap (500ml)','Lavender-scented, non-toxic, cruelty-free hand soap in a refillable glass bottle.',280,100,'/images/products/hand-soap.jpeg',3),(4,'2025-05-01 08:38:47','2025-05-01 08:38:47','Natural Laundry Detergent (1kg)','Plant-based, hypoallergenic detergent with zero synthetic fragrances — safe for babies and sensitive skin.',380,100,'/images/products/laundry-detergent.webp',5),(5,'2025-05-01 08:38:47','2025-05-01 08:38:47','Natural Deodorant Stick','Aluminum-free, all-natural deodorant in a compostable or refillable container.',320,100,'/images/products/deo.jpg',4),(6,'2025-05-01 08:38:47','2025-05-01 08:38:47','Solar-Powered LED Lantern','Portable and collapsible lantern ideal for camping or emergencies. Charges via sunlight.',550,100,'/images/products/lantern.jpeg',5),(7,'2025-05-01 08:38:47','2025-05-01 08:38:47','Upcycled Denim Tote Bag','Handmade from repurposed denim jeans. Stylish, durable, and one-of-a-kind.',690,100,'/images/products/tote.jpg',3);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-02  0:42:19
