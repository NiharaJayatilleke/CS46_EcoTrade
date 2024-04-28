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
    status INT DEFAULT 1,
    PRIMARY KEY(id)
);

INSERT INTO General_User(username, email,number, password, user_type,status) VALUES ('admin','admin@gmail.com','090192','$2y$10$46HNERR3yFUe.fLbfRjSBeCGqlpJS7h5krkDUbJjjXmV0M.Y/XZ6u','moderator',1);

CREATE TABLE Collectors (
    id INT AUTO_INCREMENT,
    nic VARCHAR(255),
    gender VARCHAR(50),
    address TEXT,
    com_name VARCHAR(255),
    com_email VARCHAR(255),
    com_address VARCHAR(255),
    telephone VARCHAR(255),
    company_type VARCHAR(255),
    vehicle_type VARCHAR(255),
    reg_number VARCHAR(255),
    vehicle_reg VARCHAR(255),
    model VARCHAR(255),
    color VARCHAR(255),
    FOREIGN KEY (id) REFERENCES General_User(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE Districts (
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    PRIMARY KEY (id)
);

INSERT INTO Districts (name) VALUES 
('Colombo'),
('Gampaha'),
('Kalutara'),
('Kandy'),
('Matale'),
('Nuwara Eliya'),
('Galle'),
('Matara'),
('Hambantota'),
('Jaffna'),
('Kilinochchi'),
('Mannar'),
('Vavuniya'),
('Mullaitivu'),
('Batticaloa'),
('Ampara'),
('Trincomalee'),
('Kurunegala'),
('Puttalam'),
('Anuradhapura'),
('Polonnaruwa'),
('Badulla'),
('Monaragala'),
('Ratnapura'),
('Kegalle');

CREATE TABLE CollectorDistricts (
    collector_id INT,
    district_id INT,
    FOREIGN KEY (collector_id) REFERENCES Collectors(id) ON DELETE CASCADE,
    FOREIGN KEY (district_id) REFERENCES Districts(id) ON DELETE CASCADE,
    PRIMARY KEY (collector_id, district_id)
);

DROP TABLE IF EXISTS RecycleCenters;

CREATE TABLE RecycleCenters (
    id INT AUTO_INCREMENT,
    nic VARCHAR(255),
    owner_name VARCHAR(255),
    owner_address VARCHAR(255),
    com_name VARCHAR(255),
    com_email VARCHAR(255),
    com_address VARCHAR(255),
    com_tel VARCHAR(255),
    company_type VARCHAR(255),
    reg_number VARCHAR(255),
    website VARCHAR(255),
    operation_days VARCHAR(255),
    FOREIGN KEY (id) REFERENCES General_User(id) ON DELETE CASCADE
);

CREATE TABLE Categories(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    PRIMARY KEY (id)
);

INSERT INTO Categories (name) VALUES 
('Paper'),
('Cardboard'),
('Plastic'),
('Polyethylene'),
('Chemical recycling'),
('Styrofoam'),
('Rubber'),
('Glass'),
('Metal'),
('Electronics (e-waste)'),
('Batteries'),
('Other');

CREATE TABLE RecycleCentersCategories (
    center_id INT,
    category_id INT,
    FOREIGN KEY (center_id) REFERENCES RecycleCenters(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES Categories(id) ON DELETE CASCADE,
    PRIMARY KEY (center_id, category_id)
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
    item_expiry INT,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(255),
    PRIMARY KEY(p_id),
    FOREIGN KEY (seller_id) REFERENCES General_User(id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS Secondhand_Ad_Images;

CREATE TABLE Secondhand_Ad_Images (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    item_id INT,
    image_name VARCHAR(255),
    FOREIGN KEY (item_id) REFERENCES Item_Ads(p_id) ON DELETE CASCADE
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

DROP TABLE IF EXISTS Recycle_Center_Requirements;

CREATE TABLE Recycle_Center_Requirements (
    rad_id INT AUTO_INCREMENT,
    center_id INT, 
    item_category VARCHAR(255),
    item_desc TEXT,
    item_location VARCHAR(255),
    item_quantity INT,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(255),
    PRIMARY KEY(rad_id),
    FOREIGN KEY (center_id) REFERENCES General_User(id) ON DELETE CASCADE
);

CREATE OR REPLACE VIEW v_ads AS
    SELECT
        Item_Ads.p_id as ad_id,
        General_User.id as seller_id, 
        General_User.username as seller_name,
        Item_Ads.item_name as item_name,
        Item_Ads.item_category as item_category,
        Item_Ads.item_quantity as item_quantity,
        Item_Ads.item_desc as item_desc,
        Item_Ads.item_condition as item_condition,
        Item_Ads.item_image as item_image,
        (SELECT GROUP_CONCAT(Secondhand_Ad_Images.image_name) FROM Secondhand_Ad_Images WHERE Secondhand_Ad_Images.item_id = Item_Ads.p_id) as item_images,
        Item_Ads.item_price as item_price,
        Item_Ads.item_location as item_location,
        Item_Ads.selling_format as selling_format,
        Item_Ads.negotiable as negotiable,
        Item_Ads.created_at as item_created_at,
        Item_Ads.status as status,
        Featured_Ads.package as feature_package,
        Featured_Ads.duration as feature_duration,
        Featured_Ads.starting_time as feature_starting_time,
        NOW() > DATE_ADD(Featured_Ads.starting_time, INTERVAL Featured_Ads.duration DAY) as is_package_over,
        TIMESTAMPDIFF(SECOND, NOW(), DATE_ADD(Featured_Ads.starting_time, INTERVAL Featured_Ads.duration DAY)) as remaining_time
    FROM Item_Ads 
    RIGHT JOIN General_User ON Item_Ads.seller_id = General_User.id
    LEFT JOIN Featured_Ads ON Item_Ads.p_id = Featured_Ads.p_id
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

DROP TABLE IF EXISTS Reported_Ads;

CREATE TABLE IF NOT EXISTS Reported_Ads(
    report_id INT AUTO_INCREMENT,
    ad_id INT,
    reporter_id INT,
    report_reason TEXT,
    report_comments TEXT,
    report_contact VARCHAR(255),
    report_status VARCHAR(255),
    report_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(report_id),
    FOREIGN KEY(ad_id) REFERENCES Item_Ads(p_id) ON DELETE CASCADE,
    FOREIGN KEY(reporter_id) REFERENCES General_User(id) ON DELETE CASCADE
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

DROP TABLE IF EXISTS Seller_Rating;

CREATE TABLE Seller_Rating(
    rating_id INT AUTO_INCREMENT,
    ad_id INT,
    seller_id INT,
    rated_by_id INT,
    rating INT,
    rating_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(rating_id),
    FOREIGN KEY(ad_id) REFERENCES Item_Ads(p_id) ON DELETE CASCADE,
    FOREIGN KEY(rated_by_id) REFERENCES General_User(id) ON DELETE CASCADE
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

DROP TABLE IF EXISTS Buyer_Responses;

CREATE TABLE Buyer_Responses (
    response_id INT AUTO_INCREMENT,
    notif_id INT,
    response ENUM('Confirmed', 'Declined'),
    rejection_reason TEXT,
    PRIMARY KEY(response_id),
    FOREIGN KEY(notif_id) REFERENCES Notifications(notif_id)
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
    verified BOOLEAN DEFAULT FALSE,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)

);

CREATE TABLE Activity_Log (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    action_type VARCHAR(255),
    action_details TEXT,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE OR REPLACE VIEW v_re_ads AS
    SELECT
        Recycle_Item_Ads.r_id as ad_id,
        General_User.id as seller_id, 
        General_User.username as seller_name,
        Recycle_Item_Ads.item_name as item_name,
        Recycle_Item_Ads.item_category as item_category,
        -- Recycle_Item_Ads.item_quantity as item_quantity,
        Recycle_Item_Ads.item_desc as item_desc,
        -- Recycle_Item_Ads.item_condition as item_condition,
        Recycle_Item_Ads.item_image as item_image,
        Recycle_Item_Ads.item_location as item_location,
        Recycle_Item_Ads.created_at as item_created_at
    FROM Recycle_Item_Ads 
    JOIN General_User ON Recycle_Item_Ads.seller_id = General_User.id
    ORDER BY Recycle_Item_Ads.created_at DESC;

CREATE OR REPLACE VIEW v_notifs AS
SELECT
    Notifications.notif_id as notif_id, 
    Notifications.user_id as user_id, 
    General_User.username as username,
    Notifications.ad_id as ad_id,
    Item_Ads.item_name as item_name,
    Notifications.message as message,
    Notifications.notif_created_at as notif_created_at,
    Notifications.seen as seen
FROM Notifications
JOIN General_User ON Notifications.user_id = General_User.id
JOIN Item_Ads ON Notifications.ad_id = Item_Ads.p_id
ORDER BY Notifications.notif_created_at DESC;

CREATE OR REPLACE VIEW v_re_reqs AS
    SELECT
        Recycle_Center_Requirements.rad_id as rad_id,
        Recycle_Center_Requirements.center_id as center_id,
        General_User.number as center_number,
        Recycle_Center_Requirements.item_category as item_category,
        Recycle_Center_Requirements.item_desc as item_desc,
        Recycle_Center_Requirements.item_location as item_location, 
        Recycle_Center_Requirements.item_quantity as item_quantity,
        Recycle_Center_Requirements.created_at as created_at,
        Recycle_Center_Requirements.status as status
    FROM Recycle_Center_Requirements
    JOIN General_User ON Recycle_Center_Requirements.center_id = General_User.id
    ORDER BY Recycle_Center_Requirements.created_at DESC;

    CREATE TABLE Saved_Requirements(
        collector_id INT,
        req_id INT,
        FOREIGN KEY(collector_id) REFERENCES General_User(id) ON UPDATE CASCADE ON DELETE CASCADE,
        FOREIGN KEY(req_id) REFERENCES Recycle_Center_Requirements(rad_id) ON UPDATE CASCADE ON DELETE CASCADE
    );