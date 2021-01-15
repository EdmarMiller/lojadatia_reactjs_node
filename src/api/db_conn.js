const mysql = require('mysql');

const db_conn = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'lojadatia'
});

module.exports = db_conn