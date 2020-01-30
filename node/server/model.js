const mongoose = require('mongoose')
const Schema = mongoose.Schema

let UserSchema = new Schema({
  login: { type: String, required: true, unique: true},
  nombre: { type: String, required: true },
  password: { type: String, required: true}
})

let UserModel = mongoose.model('usuarios', UserSchema)

let EventosSchema = new Schema({
  email: { type: String, required: true},
  title: { type: String, required: true},
  start: { type: String, required: true},
  end:   { type: String}
})

let EventosModel = mongoose.model('eventos', EventosSchema)

exports.usuario = UserModel;
exports.eventos = EventosModel;
