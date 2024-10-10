CREATE TABLE qualityassurance_records (
    QA_Id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    gender VARCHAR (50),
    Department VARCHAR (50),
    Expertise_Area VARCHAR (50),
    Email VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);