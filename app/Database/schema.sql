# DB 생성
DROP DATABASE IF EXISTS DailyLaboratory_Coding_Test;
CREATE DATABASE DailyLaboratory_Coding_Test;
USE DailyLaboratory_Coding_Test;

# 주소 테이블 생성
CREATE TABLE place (
    `id` INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` TEXT NOT NULL COMMENT '명칭', 
    `address` TEXT NOT NULL COMMENT '주소',
    `latitude` DOUBLE NOT NULL COMMENT '위도',
    `longitude` DOUBLE NOT NULL COMMENT '경도'
);

INSERT INTO place
SET `name` = '데일리레보라토리',
`address` = '대전 서구 월평로 65',
`latitude` = 36.35635686268696,
`longitude` = 127.36443329436729;