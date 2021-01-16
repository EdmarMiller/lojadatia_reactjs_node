const express = require('express');
const app = express();
const db_conn = require('./db_conn');
const cors = require('cors');
const port = 3001;
// usado para que o F.E e B.E possam rodar no mesmo server sem conflito
app.use(cors());
// sinaliza pro express que os dados da api serão json
app.use(express.json());

app.get('/',(req, res, next)=>{
  db_conn.query('Select * from wv2_produtos',
  (error, result) =>{
    res.json(result)
    
  });
});

app.listen(port,() => {
  console.log(`O servidor subiu na porta ${port}`);
});


