/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80029
 Source Host           : localhost:55000
 Source Schema         : ujian

 Target Server Type    : MySQL
 Target Server Version : 80029
 File Encoding         : 65001

 Date: 21/11/2022 19:26:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for materi_tiga_detail
-- ----------------------------
DROP TABLE IF EXISTS `materi_tiga_detail`;
CREATE TABLE `materi_tiga_detail` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `materi_tiga_id` bigint DEFAULT NULL,
  `kolom` tinyint DEFAULT NULL,
  `a` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `b` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `c` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `d` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `e` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materi_tiga_detail_ibfk_1` (`materi_tiga_id`),
  CONSTRAINT `materi_tiga_detail_ibfk_1` FOREIGN KEY (`materi_tiga_id`) REFERENCES `materi_tiga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of materi_tiga_detail
-- ----------------------------
BEGIN;
INSERT INTO `materi_tiga_detail` VALUES (8, 2, 1, 'K', 'R', 'Z', 'S', 'T', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (9, 2, 2, 'O', 'G', 'C', 'P', 'Y', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (10, 2, 3, 'X', 'A', 'J', 'B', 'I', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (11, 2, 4, 'E', 'F', 'Q', 'H', 'L', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (12, 2, 5, 'V', 'N', 'M', 'W', 'U', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (13, 2, 6, 'K', 'R', 'Z', 'S', 'T', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (14, 2, 7, 'O', 'G', 'C', 'P', 'Y', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (15, 2, 8, 'X', 'A', 'J', 'B', 'I', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (16, 2, 9, 'E', 'F', 'Q', 'H', 'L', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (17, 2, 10, 'V', 'N', 'M', 'W', 'U', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (18, 3, 1, '< ', '=', '»', '«', '> ', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (19, 3, 2, 'ƕ', '@', '±', 'Ω', '¤', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (20, 3, 3, '§', '©', '±', '¶', 'æ', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (21, 3, 4, 'ǂ', 'Ǯ', 'ɠ', 'ɮ', 'ɶ', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (22, 3, 5, 'ʨ', 'Ξ', 'Ϡ', 'Җ', '҂', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (23, 3, 6, '< ', '=', '»', '«', '> ', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (24, 3, 7, 'ƕ', '@', '±', 'Ω', '¤', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (25, 3, 8, '§', '©', '±', '¶', 'æ', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (26, 3, 9, 'ǂ', 'Ǯ', 'ɠ', 'ɮ', 'ɶ', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (27, 3, 10, 'ʨ', 'Ξ', 'Ϡ', 'Җ', '҂', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (28, 1, 1, '6', '4', '7', '2', '1\r', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (29, 1, 2, '0', '2', '6', '3', '7\r', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (30, 1, 3, '0', '2', '6', '3', '7\r', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (31, 1, 4, '7', '1', '5', '2', '4\r', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (32, 1, 5, '8', '3', '6', '0', '9\r', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (33, 1, 6, '6', '4', '7', '2', '1\r', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (34, 1, 7, '0', '2', '6', '3', '7\r', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (35, 1, 8, '5', '7', '8', '1', '3\r', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (36, 1, 9, '7', '1', '5', '2', '4\r', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga_detail` VALUES (37, 1, 10, '8', '3', '6', '0', '9', '2022-11-21 00:00:00', '2022-11-21 00:00:00');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
