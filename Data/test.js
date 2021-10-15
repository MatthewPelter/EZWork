const connection = require("../util/connection");

async function getAll() {
  const sql = "SELECT * FROM client";
  const [rows] = await connection.promise().query(sql);
  return rows;
}
exports.getAll = getAll;
