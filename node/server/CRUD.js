module.exports.insertarRegistro = function(db, callback){
  let coleccion = db.collection("usuarios")
  coleccion.insert([
    {login:"na@mail.com", nombre: "Nancy Ramirez", password: "12345"}
  ], (err, result) => {
    console.log("Resultado de insert: "+result.toString())
  })
}

module.exports.eliminarRegistro = function(db, callback) {
  let coleccion = db.collection("users")
  try{
    coleccion.deleteOne({nombre: "David"})
    console.log("Se eliminó el registro correctamente")
  }catch(e){
    console.log("Se generó un error: "+e)
  }
}

module.exports.consultarYActualizar = function(db, callback) {
    let coleccion = db.collection("users")
    coleccion.find().toArray((error, documents)=> {
    if(error)console.log(error)
    console.log(documents)
    callback()
  })
  try{
    coleccion.updateOne({nombre :"Fernando"}, {$set:{peso :15}})
    console.log("Se ha actualizado el registro correctamente")
  }catch(e){
    console.log("Error actualizando el registro: "+e)
  }
  coleccion.find().toArray((error, documents)=> {
  if(error)console.log(error)
  console.log(documents)
  callback()
  })
}
