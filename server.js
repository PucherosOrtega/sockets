let express = require("express");
let http = require("http");
let logger = require("winston");

logger.remove(logger.transports.Console);
logger.add(new logger.transports.Console, {
	colorize: true,
	timestamp: true,
});

logger.info("port 3001");

let app = express();
var server    = app.listen(3001);
var io        = require('socket.io').listen(server);

let counter = 0;

io.on("connection", (data) => {
	//console.log(data);
	console.log(counter = counter + 1);
});


app.get("/", (req, res) => {
	res.send("Express");
});