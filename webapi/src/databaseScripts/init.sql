DROP TABLE IF EXISTS 'users';

CREATE TABLE IF NOT EXISTS 'users' (
  'username' varchar(255) NOT NULL,
  'passwd' varchar(255) NOT NULL,
  'name' varchar(255) NOT NULL,
  'email' varchar(255) NOT NULL,
  'role' varchar(255) NOT NULL,
  'created' timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY('username'),
  CONSTRAINT chk_role CHECK(role IN ('Manager', 'Assistant'),
  CONSTRAINT chk_email CHECK(
      email like '%_@__%.__%' AND email like '%@%.%'            -- Must contain at least one @ and one subsequent .
    and email NOT like '%..%'                                   -- Cannot have two periods in a row
    and email NOT like '%@%@%'                                  -- Cannot have two @ anywhere
    and email NOT like '%.@%' AND user_email NOT like '%@.%'    -- Cant have @ and . next to each other
      )
);

INSERT INTO users ('username', 'password', 'name', 'email', 'role', 'created') VALUES
('karanrj', 'password', 'Karan', 'karan@email.com', 'Manager','2019-01-01 02:03:04');

INSERT INTO users ('username', 'password', 'name', 'email', 'role', 'created') VALUES
('alexa', 'password', 'Alexa', 'alexa@email.com', 'Assistant','2019-01-01 02:03:04');