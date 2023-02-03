
const mysql = require('mysql2');
const express = require('express');
const app = express();
const cors = require('cors');

app.use(cors());

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'root',
  port: 3306,
  database: 'cherchetoncbd'
});

console.log("dfg");
app.use(function (req, res, next) {
  res.setHeader("Access-Control-Allow-Origin", "*");
  res.setHeader('Access-Control-Allow-Methods', '');
  res.setHeader("Access-Control-Allow-Headers", "*");
  next();
});

app.get('/products/:id', function (req, res, next) {
  res.json({msg: 'This is CORS-enabled for all origins!'})
})



connection.connect((err) => {
  if (err) {
    console.error(`Error connecting to database: ${err.stack}`);
    return;
  }
  console.log(`Connected to database as id ${connection.threadId}`);
});

app.get('/api/data', (req, res) => {
  connection.query('SELECT * FROM producteur', (error, results) => {
    if (error){
      console.log("error", error);
      res.status(500).json({ error: "Une erreur s'est produite lors de la requête à la base de données" });
    } else {
      res.json(results);
      console.log("connected")
      res.json({data: 'This is some data from the API'});
    }
  });
});



app.listen(3000, () => {
  console.log('Server is listening on port 3000');
});