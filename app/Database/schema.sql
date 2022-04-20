# DB 생성
DROP DATABASE IF EXISTS DailyLaboratory_Coding_Test;
CREATE DATABASE DailyLaboratory_Coding_Test;
USE DailyLaboratory_Coding_Test;

# 장소 테이블 생성
CREATE TABLE place (
    `id` INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `slug` VARCHAR(128) NOT NULL,
    `name` TEXT NOT NULL COMMENT '명칭', 
    `address` TEXT NOT NULL COMMENT '주소',
    `latitude` DOUBLE NOT NULL COMMENT '위도',
    `longitude` DOUBLE NOT NULL COMMENT '경도'
);

# 장소 테스트 데이터
INSERT INTO place
SET `name` = '데일리레보라토리',
`address` = '대전 서구 월평로 65',
`latitude` = 36.35635686268696,
`longitude` = 127.36443329436729;

INSERT INTO place
SET `name` = '이마트 트레이더스',
`address` = '대전 서구 월평로 510',
`latitude` = 36.35769042563793,
`longitude` = 127.36301062633002;

INSERT INTO place
SET `name` = '대전 갈마초등학교',
`address` = '대전 서구 갈마동 114-26',
`latitude` = 36.35639131478072,
`longitude` = 127.36935508700289 ;

INSERT INTO place
SET `name` = '대전둔산여자고등학교',
`address` = '대전 서구 갈마동 823',
`latitude` = 36.353242913558326,
`longitude` = 127.37331746649743;

INSERT INTO place
SET `name` = '갤러리아백화점 타임월드',
`address` = '대전 서구 둔산동 1038',
`latitude` = 36.35177677067463,
`longitude` = 127.37816774820548;

INSERT INTO place
SET `name` = '은평공원',
`address` = '대전 서구 월평동 313',
`latitude` = 36.359611050016916,
`longitude` = 127.36264072847618;

INSERT INTO place
SET `name` = '서대전고등학교',
`address` = '대전 서구 월평동 307',
`latitude` = 36.36078158610525,
`longitude` = 127.36885216496617;

INSERT INTO place
SET `name` = '월평역',
`address` = '대전광역시 서구 월평동 1503-1',
`latitude` = 36.358272688787025,
`longitude` = 127.36416090315797 ;

INSERT INTO place
SET `name` = '월평중학교',
`address` = '대전 서구 월평동 663',
`latitude` = 36.35632229443437,
`longitude` = 127.36762787409542;