
const mysql = require('mysql2');
const express = require('express');
const app = express();
const cors = require('cors');

app.use(cors()); 

const connection = mysql.createConnection({ // Connection à la base de donnée MySQL
  host: 'localhost',
  user: 'root',
  password: 'root',
  port: 3306,
  database: 'cherchetoncbd'
});

console.log("dfg");
app.use(function (req, res, next) { // Empeche les erreur de CORS
  res.setHeader("Access-Control-Allow-Origin", "*");
  res.setHeader('Access-Control-Allow-Methods', '');
  res.setHeader("Access-Control-Allow-Headers", "*");
  next();
});


connection.connect((err) => {
  if (err) {
    console.error(`Error connecting to database: ${err.stack}`);
    return;
  }
  console.log(`Connected to database as id ${connection.threadId}`);
});

app.get('/api/data', (req, res) => {
  connection.query('SELECT coordlat, coordlng, name FROM store', (error, results) => {
    if (error){
      console.log("error", error);
      res.status(500).json({ error: "Une erreur s'est produite lors de la requête à la base de données" });
    } else {
      res.json(results);
      console.log("connected")
      }
  });
});

app.post('/api/data', (req, res) => {
  console.log("test3");
  let sql = req.body.sql;
  console.log(sql);
  connection.query(sql, (error, results) => {
    if (error) {
      console.error(`Error executing SQL query: ${error.stack}`);
      res.status(500).json({ error: "Une erreur s'est produite lors de l'exécution de la requête SQL" });
    } else {
      res.json(results);
    }
  });
});


app.listen(3000, () => { // Serveur Node
  console.log('Server is listening on port 3000');
});