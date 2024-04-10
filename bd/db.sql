CREATE DATABASE OHTLI;

    use OHTLI;
    CREATE TABLE `OHTLI_Wave` (
        SKU INT(10) NOT NULL AUTO_INCREMENT,
        Nonprod VARCHAR(50),
        Descprod VARCHAR(200),
        Stockprod VARCHAR(10),
        Prixprod DECIMAL(8, 4),
        PRIMARY KEY (SKU)
    );
    use OHTLI;
    CREATE TABLE `OHTLI_Cactus` (
        SKU INT(10) NOT NULL AUTO_INCREMENT,
        Nonprod VARCHAR(50),
        Descprod VARCHAR(200),
        Stockprod VARCHAR(10),
        Prixprod DECIMAL(8, 4),
        PRIMARY KEY (SKU)
    );

    use OHTLI;
    CREATE TABLE `OHTLI_Msg`(
        ID INT(10) NOT NULL AUTO_INCREMENT,
        DateMsg DATE,
        Msg VARCHAR(300),
        NetP VARCHAR(50),
        Email VARCHAR(50),
        Phone VARCHAR(15),
        PRIMARY KEY (ID)
    );

    use OHTLI;
    CREATE TABLE `OHTLI_Trnprs`(
        ID INT(10) NOT NULL AUTO_INCREMENT,
        DateArch DATE,
        Month VARCHAR(15),
        Agno VARCHAR(15),
        Arch VARCHAR(100),
        PRIMARY KEY (ID)
    )

    use OHTLI;
    CREATE TABLE `OHTLI_lookbook`(
        ID INT(10) NOT NULL AUTO_INCREMENT,
        DateLK DATE,
        Imglk VARCHAR(100),
        PRIMARY KEY (ID)
    )

    use OHTLI;
    CREATE TABLE `OHTLI_Avis`(
        ID INT(10) NOT NULL AUTO_INCREMENT,
        DateAvis DATE,
        Avis VARCHAR(300),
        NomAvis VARCHAR(50),
        PRIMARY KEY (ID) 
    )

    use OHTLI;
    CREATE TABLE `Admin`(
        ID INT(10) NOT NULL AUTO_INCREMENT,
        prenom VARCHAR(50),
        password VARCHAR(50),
        PRIMARY KEY (ID) 
    )
    