console.log('SERVIDOR CORRIENDO EXITOSAMENTE!');
console.log('Cargando webSocket');

var miSocket = require('ws');
var partidas = [];
var jugadores = [];

var servidorSocket = new miSocket.Server({port:2222});

servidorSocket.on('connection', function(ws)
{
	console.log('HAY ALGUIEN CONECTADO!');
	ws.on('message', function(msj)
	{
		mensaje = JSON.parse(msj);
		
		if (mensaje.tipo == '1')
		{
			console.log(mensaje.coordX + ' ' + mensaje.coordY + ' ' + mensaje.action + ' ' + mensaje.tipo);
			coords = {
				'tipoN':'1',
				'actionN': mensaje.action,
				'coordXN': mensaje.coordX,
				'coordYN': mensaje.coordY
			}
			ws.send(JSON.stringify(coords));
		}

		if (mensaje.tipo == '2')
		{
			console.log(mensaje.coordX + ' ' + mensaje.coordY + ' ' + mensaje.action + ' ' + mensaje.tipo);
			coords = {
				'tipoN':'2',
				'actionN': mensaje.action,
				'coordXN': mensaje.coordX,
				'coordYN': mensaje.coordY
			}
			ws.send(JSON.stringify(coords));
		}
	});
})