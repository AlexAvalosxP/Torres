// Broadcast to all.


console.log('SERVIDOR CORRIENDO EXITOSAMENTE!');
console.log('Cargando webSocket');

var miSocket = require('ws');
var partidas = [];
var jugadores = [];

var wss = new miSocket.Server({port:2222});

wss.broadcast = function broadcast(data) {
  wss.clients.forEach(function each(client) {
    if (client.readyState === WebSocket.OPEN) {
      client.send(data);
    }
  });
};
 
wss.on('connection', function connection(ws) {
	console.log('HAY ALGUIEN CONECTADO!');
  ws.on('message', function(data) {
    // Broadcast to everyone else.
    wss.clients.forEach(function each(client) {
      client.send(data);
      });
    });
  });
