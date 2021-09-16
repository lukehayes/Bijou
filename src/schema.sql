DROP TABLE if exists users;

-- Users Table
CREATE TABLE users(id integer PRIMARY KEY, username text, email integer, password text);

INSERT INTO users(id, username, email, password) VALUES
    (1, "developer", "developer@app.com", "$2y$10$9cLVIkAV5U4zKz/wI4MGEexSk91/e5TS6DODu/Dkd/Zkih19OpA7O"),
    (2, "admin", "admin@app.com", "$2y$10$9cLVIkAV5U4zKz/wI4MGEexSk91/e5TS6DODu/Dkd/Zkih19OpA7O");

