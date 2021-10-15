var mysql = require("mysql");

var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "ezwork",
});

async function getAll() {
  const sql = "SELECT * FROM client";
  const [rows] = await connection.promise().query(sql);
  return rows;
}

module.exports = connection;
