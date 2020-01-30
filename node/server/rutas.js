var Router = require('express').Router();
var Models = require('./model.js');
var User   =  Models.usuario;
var Eventos =  Models.eventos;

//Obtener el usuario que hizo login
Router.get('/login', function(req, res) {
      let nombre = req.query.user,
      clave_ingresada = req.query.pass
      User.findOne({login: nombre}).exec(function(err, doc){
      if (err) {
          res.status(500)
          res.json(err)
      }
      clave_grabada = doc.password
      if(clave_grabada != clave_ingresada){
        res.json("Contrasena errada")
      }else{
        req.session.sesionLogin = doc.login
        res.json("Validado")
      }
  })
})

//Obtener todos los eventos
Router.get('/all', function(req, res) {
    Eventos.find({}).exec(function(err, docs) {
        if (err) {
            res.status(500)
            res.json(err)
        }
        res.json(docs)
    })
})

// Actualizar "Evento"
Router.post('/update/:id', (req, res) => {
  var fecha_inicial = req.body.ini
  var fecha_final = req.body.fin
  let id_ev = req.params.id
  Eventos.updateOne({_id: id_ev}, {$set: {start: fecha_inicial, end: fecha_final}}, function(error) {
    if(error) {
        res.status(500)
        res.json(error)
      }
      res.send("Evento actualizado")
    })
})

// Agregar "Evento"
Router.post('/nuevo_evento', (req, res) => {
    let evento = new Eventos({
        email: req.session.sesionLogin,
        title: req.body.title,
        start: req.body.start,
        end: req.body.end
        })
        evento.save(function(error) {
          if (error) {
            res.status(500)
            res.json(error)
          }
          res.send({total:1})
  });
})

// Eliminar un evento por su id
Router.post('/delete/:id', function(req, res) {
    let id_ev = req.params.id
    Eventos.deleteOne({_id: id_ev}, function(error) {
        if(error) {
            res.status(500)
            res.json(error)
        }
        res.send("Evento eliminado")
    })
})
module.exports = Router
