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

 Date: 21/11/2022 19:26:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for materi_tiga
-- ----------------------------
DROP TABLE IF EXISTS `materi_tiga`;
CREATE TABLE `materi_tiga` (
  `id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of materi_tiga
-- ----------------------------
BEGIN;
INSERT INTO `materi_tiga` VALUES (1, '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga` VALUES (2, '2022-11-21 00:00:00', '2022-11-21 00:00:00');
INSERT INTO `materi_tiga` VALUES (3, '2022-11-21 00:00:00', '2022-11-21 00:00:00');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
