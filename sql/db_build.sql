CREATE DATABASE T3G;
USE T3G;

CREATE TABLE Rounds (
    SDate INT NOT NULL,
    Round INT NOT NULL,
    League_ID INT NOT NULL
);

INSERT INTO Rounds VALUES (1724092623, 1, 72);

CREATE TABLE numatches (
    Game_ID INT NOT NULL,
    SID_A INT NOT NULL,
    SID_B INT NOT NULL,
    Round INT NOT NULL,
    League_ID INT NOT NULL
);

INSERT INTO numatches VALUES (1, 1, 2, 1, 72);
INSERT INTO numatches VALUES (1, 3, 4, 1, 72);
INSERT INTO numatches VALUES (1, 5, 6, 1, 72);

CREATE TABLE Squads (
    Squad_ID INT NOT NULL,
    League_ID INT NOT NULL,
    SquadName VARCHAR(100) NOT NULL,
    GamesPlayed INT NOT NULL,
    Wins INT NOT NULL,
    Losses INT NOT NULL,
    Points INT NOT NULL,
    Owner_ID INT NOT NULL,
    Coowner1_ID INT NOT NULL,
    Coowner2_ID INT NOT NULL
);

INSERT INTO Squads VALUES (1, 72, "Strangle", 0, 0, 0, 0, 0, 0, 0);
INSERT INTO Squads VALUES (2, 72, "Strong", 0, 0, 0, 0, 0, 0, 0);
INSERT INTO Squads VALUES (3, 72, "=VeCToR=", 0, 0, 0, 0, 0, 0, 0);
INSERT INTO Squads VALUES (4, 72, "Authority", 0, 0, 0, 0, 0, 0, 0);
INSERT INTO Squads VALUES (5, 72, "Oblivion", 0, 0, 0, 0, 0, 0, 0);
INSERT INTO Squads VALUES (6, 72, "Cardcaptors", 0, 0, 0, 0, 0, 0, 0);

CREATE TABLE Flags (
    League_ID INT NOT NULL,
    Active INT NOT NULL,
    Description VARCHAR(100) NOT NULL
);

INSERT INTO Flags VALUES (72, 1, "T3G League 8");