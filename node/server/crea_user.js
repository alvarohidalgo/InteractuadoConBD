var MongoClient = require('mongodb').MongoClient
var url = "mongodb://localhost/agenda"
var Operaciones = require('./CRUD.js')
MongoClient.connect(url, function (err, db){
  if(err)console.log(err)
  console.log("Conexión establecida con la B.D.")
  Operaciones.insertarRegistro(db, (error, result)=> {
    if (error)console.log("Error insertando registros: "+error)
  })
})
