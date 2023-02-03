const mysql = require('mysql2');
const express = require('express');
const app = express();
const cors = require('cors');


const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'root',
  port: 3307,
  database: 'cherchetoncbd'
});


app.use(cors());


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

app.Use(async (ctx, next) =>
{
  await next();
  if (ctx.Response.StatusCode == 204)
  {
    ctx.Response.ContentLength = 0;
  }
});

app.listen(3306, () => {
  console.log('Server is listening on port 3306');
});