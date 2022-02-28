-- CREATE TABLE IF NOT EXISTS departaments
-- (
--     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     name VARCHAR(40) NOT NULL
-- );

-- CREATE TABLE IF NOT EXISTS professor
-- (
--     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     title VARCHAR(10) NOT NULL,
--     name VARCHAR(20) NOT NULL,
--     surname VARCHAR(20) NOT NULL,
--     office_number TINYINT NOT NULL
-- );

-- CREATE TABLE IF NOT EXISTS studnets 
-- (
--     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     name VARCHAR(20) NOT NULL,
--     surname VARCHAR(20) NOT NULL,
--     index_number INT NOT NULL DEFAULT 0,
--     register_date DATETIME NOT NULL DEFAULT NOW(),
--     departament_id INT,
--     advisor_id INT,

--     CONSTRAINT fk_dep FOREIGN KEY (departament_id) 
--     REFERENCES departaments (id)
--     ON UPDATE CASCADE
--     ON DELETE SET NULL,

--     -- RESTRICT, SET NULL, CASCADE, NO ACTION
--     -- RESTRICT == NO ACTION
--    
--     CONSTRAINT fk_prof FOREIGN KEY (advisor_id) 
--     REFERENCES professor (id)
--     ON UPDATE CASCADE
--     ON DELETE SET NULL
-- );

-- CREATE TABLE IF NOT EXISTS subjects
-- (
--     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     title VARCHAR(45) NOT NULL,
--     credits INT NOT NULL,
--     semester TINYINT NOT NULL
-- );

-- CREATE TABLE IF NOT EXISTS subject_professor
-- (
--     subject_id INT,
--     professor_id INT,

--     CONSTRAINT fk_subj FOREIGN KEY (subject_id)
--     REFERENCES subjects (id)
--     ON UPDATE CASCADE
--     ON DELETE CASCADE,

--     CONSTRAINT fk_prof_sp FOREIGN KEY (professor_id)
--     REFERENCES professors (id)
--     ON UPDATE CASCADE
--     ON DELETE CASCADE
-- );


CREATE TABLE IF NOT EXISTS student_subject
(
    subject_id INT,
    student_id INT,

    CONSTRAINT fk_subj_ss FOREIGN KEY (subject_id)
    REFERENCES subjects (id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,

    CONSTRAINT fk_stud FOREIGN KEY (student_id)
    REFERENCES students (id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);






