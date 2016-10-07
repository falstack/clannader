var http = require('http').Server();
var io = require('socket.io')(http, {
    origins:'clannader.dev:* http://clannader.com:* http://www.clannader.com:*'}
);
var Redis = require('ioredis');
var redis = new Redis();

redis.psubscribe('*');

// var app = require('http').createServer(handler);
// hander是处理request和response
function handler(req, res) {
    res.writeHead(200);
    res.end('');
}

redis.on('pmessage', function (subscribed, channel, message) {
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

io.on('connection', function (socket) {
    console.log('a user connection');
});

http.listen(3001, function () {
    console.log('Server is running at 3001!');
});