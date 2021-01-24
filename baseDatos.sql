ALTER TABLE sistemainventario
ADD COLUMN existencia SMALLINT DEFAULT 0

CREATE TABLE ventasRealizadas (
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,    
fecha TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
nombreZapato VARCHAR(255) NOT NULL,
idZapato INT NOT NULL,
precio SMALLINT NOT NULL,
folio varchar(50) NOT NULL,
img_dir varchar(255) NOT NULL,
nombreVendedor varchar(100) NULL
)

CREATE TABLE `sistemainventario` (
  `id` int NULL AUTO_INCREMENT,
  `sucursal` varchar(50) "Centro" NOT NULL,
  `marca` varchar(20)  NOT NULL,
  `nombrezapato` varchar(30)  NOT NULL,
  `talla` int  NOT NULL,
  `color` varchar(30)  NOT NULL,
  `existencia` int NOT NULL, 
  `precio` DECIMAL  0.00 NULL,
  `img_dir` VARCHAR (200) NOT NULL
)