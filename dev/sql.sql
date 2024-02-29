DROP DATABASE IF EXISTS ecotrade_db;
CREATE DATABASE ecotrade_db;

USE ecotrade_db;

CREATE TABLE General_User (
    id INT AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255),
    number INT NOT NULL,
    password VARCHAR(255),
    user_type VARCHAR(255),
    profile_image VARCHAR(255),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE Moderators (
    id INT AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255),
    number INT,
    password VARCHAR(255),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE Collectors (
    id INT AUTO_INCREMENT,
    nic VARCHAR(255),
    gender VARCHAR(50),
    address TEXT,
    com_name VARCHAR(255),
    com_email VARCHAR(255),
    com_address TEXT,
    telephone VARCHAR(255),
    company_type VARCHAR(255),
    reg_number VARCHAR(255),
    vehicle_type VARCHAR(255),
    vehicle_reg VARCHAR(255),
    make VARCHAR(255),
    model VARCHAR(255),
    insurance VARCHAR(255),
    color VARCHAR(255),
    district1 VARCHAR(255),
    district2 VARCHAR(255),
    district3 VARCHAR(255),
    district4 VARCHAR(255),
    district5 VARCHAR(255),
    FOREIGN KEY (id) REFERENCES General_User(id) ON DELETE CASCADE
);

CREATE TABLE forgot_password (
    pwdResetid INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    pwdResetemail TEXT NOT NULL,
    pwdResetSelector TEXT NOT NULL,
    pwdresetToken LONGTEXT NOT NULL,
    pwdResetExpires TEXT NOT NULL
);

CREATE TABLE Item_Ads (
    p_id INT AUTO_INCREMENT,
    seller_id INT,
    item_name VARCHAR(255),
    item_category VARCHAR(255),
    item_desc TEXT,
    item_condition VARCHAR(255),
    item_quantity INT,
    item_image VARCHAR(255),
    item_price DOUBLE,
    item_location VARCHAR(255),
    selling_format VARCHAR(255),
    negotiable VARCHAR(255),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(255),
    PRIMARY KEY(p_id),
    FOREIGN KEY (seller_id) REFERENCES General_User(id) ON DELETE CASCADE
);

CREATE TABLE Featured_Ads (
    f_id INT AUTO_INCREMENT,
    p_id INT,
    package VARCHAR(255),
    duration VARCHAR(255),
    PRIMARY KEY(f_id),
    starting_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (p_id) REFERENCES Item_Ads(p_id) ON DELETE CASCADE
);

CREATE TABLE Recycle_Item_Ads (
    r_id INT AUTO_INCREMENT,
    seller_id INT,
    item_name VARCHAR(255),
    item_category VARCHAR(255),
    item_desc TEXT,
    item_image VARCHAR(255),
    item_location VARCHAR(255),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(255),
    PRIMARY KEY(r_id),
    FOREIGN KEY (seller_id) REFERENCES General_User(id) ON DELETE CASCADE
);

CREATE TABLE Re_Centers (
    rad_id INT AUTO_INCREMENT,
    item_category VARCHAR(255),
    item_desc TEXT,
    item_location VARCHAR(255),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(255),
    PRIMARY KEY(rad_id)
);

CREATE OR REPLACE VIEW v_ads AS
    SELECT
        Item_Ads.p_id as ad_id,
        General_User.id as seller_id, 
        General_User.username as seller_name,
        Item_Ads.item_name as item_name,
        Item_Ads.item_category as item_category,
        Item_Ads.item_desc as item_desc,
        Item_Ads.item_condition as item_condition,
        Item_Ads.item_image as item_image,
        Item_Ads.item_price as item_price,
        Item_Ads.item_location as item_location,
        Item_Ads.selling_format as selling_format,
        Item_Ads.negotiable as negotiable,
        Item_Ads.created_at as item_created_at
    FROM Item_Ads INNER JOIN General_User
    ON Item_Ads.seller_id = General_User.id
ORDER BY Item_Ads.created_at DESC;

DROP TABLE IF EXISTS Messages;

CREATE TABLE Messages(
    message_id INT AUTO_INCREMENT,
    ad_id INT,
    user_id INT,
    user_type VARCHAR(255),
    content TEXT NOT NULL,
    reply TEXT,
    msg_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(message_id),
    FOREIGN KEY(ad_id) REFERENCES Item_Ads(p_id) ON DELETE CASCADE,
    FOREIGN KEY(user_id) REFERENCES General_User(id) ON DELETE CASCADE
);


DROP TABLE IF EXISTS Offers;

CREATE TABLE Offers(
    offer_id INT AUTO_INCREMENT,
    ad_id INT,
    user_id INT,
    offer_amount INT,
    offer_status VARCHAR(255) DEFAULT NULL,
    ofr_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(offer_id),
    FOREIGN KEY(ad_id) REFERENCES Item_Ads(p_id) ON DELETE CASCADE,
    FOREIGN KEY(user_id) REFERENCES General_User(id) ON DELETE CASCADE
);

CREATE TABLE Wishlist(
    w_id INT AUTO_INCREMENT,
    ad_id INT,
    user_id INT,
    w_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(w_id),
    FOREIGN KEY(ad_id) REFERENCES Item_Ads(p_id) ON DELETE CASCADE,
    FOREIGN KEY(user_id) REFERENCES General_User(id) ON DELETE CASCADE,
    UNIQUE KEY unique_wishlist (user_id, ad_id)
);



DROP TABLE IF EXISTS Notifications;

CREATE TABLE Notifications(
    notif_id INT AUTO_INCREMENT,
    user_id INT,
    ad_id INT,
    message TEXT,
    seen VARCHAR(255),
    notif_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(notif_id),
    FOREIGN KEY(user_id) REFERENCES General_User(id) ON DELETE CASCADE,
    FOREIGN KEY(ad_id) REFERENCES Item_Ads(p_id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS Bidding_Details;

CREATE TABLE Bidding_Details(
    bd_id INT AUTO_INCREMENT,
    ad_id INT,
    auction_duration VARCHAR(255),
    starting_bid DOUBLE,
    starting_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(bd_id),
    FOREIGN KEY(ad_id) REFERENCES Item_Ads(p_id) ON DELETE CASCADE
);

CREATE TABLE Bids(
    bid_id INT AUTO_INCREMENT,
    ad_id INT,
    user_id INT,
    bid_amount INT,
    bid_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(bid_id),
    FOREIGN KEY(ad_id) REFERENCES Item_Ads(p_id) ON DELETE CASCADE,
    FOREIGN KEY(user_id) REFERENCES General_User(id) ON DELETE CASCADE
);

CREATE TABLE Non_Verified_Users(
    id INT AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255),
    number INT NOT NULL,
    password VARCHAR(255),
    user_type VARCHAR(255),
    token VARCHAR (255),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)

);