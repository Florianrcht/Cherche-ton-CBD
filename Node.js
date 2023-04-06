const mysql = require('mysql2');
const express = require('express');
const app = express();
const app2 = express();
const cors = require('cors');

app.use(cors()); 
app.use(express.json())
app2.use(express.json())

const connection = mysql.createConnection({ // Connection à la base de donnée MySQL
  host: 'localhost',
  user: 'root',
  password: 'root',
  port: 3306,
  database: 'cherchetoncbd'
});

app.use(function (req, res, next) { // Empeche les erreur de CORS
  res.setHeader("Access-Control-Allow-Origin", "*");
  res.setHeader('Access-Control-Allow-Methods', '');
  res.setHeader("Access-Control-Allow-Headers", "*");
  next();
});

app2.use(function (req, res, next) { // Empeche les erreur de CORS
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
  console.log(`Connection à la database avec l'ID ${connection.threadId}`);
});

//Affichage boutiques
app.get('/api/data', (req, res) => {
  connection.query('SELECT coordlat, coordlng, enseigne, type FROM store WHERE statut = 1', (error, results) => {
    if (error){
      console.log("error", error);
      res.status(500).json({ error: "Une erreur s'est produite lors de la requête à la base de données" });
    } else {
      res.json(results);
      console.log("Connecté")
      }
  });
});

//Création boutiques
app2.post('/api/data2', (req, res) => {
  let sql = req.body.sql;
  connection.query(sql, (error, results) => {
    if (error) {
      console.error(`Error executing SQL query: ${error.stack}`);
      res.status(500).json({ error: "Une erreur s'est produite lors de l'exécution de la requête SQL" });
    } else {
      console.log(results);
      res.json(results);
    }
  });
});


app.listen(3000, () => { // Serveur Node
  console.log('Le serveur GET écoute sur le port 3000');
});
app2.listen(3001, () => { // Serveur Node
  console.log('Le serveur POST écoute sur le port 3001');
});