var http = require('http').Server();
var io = require('socket.io')(http, {
    origins:'clannader.dev:* http://clannader.com:* http://www.clannader.com:*'}
);
var Redis = require('ioredis');
var redis = new Redis();

redis.psubscribe('*');

function handler(req, res) {
    res.writeHead(200);
    res.end('');
}

redis.on('pmessage', function (subscribed, channel, message) {
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

io.on('connection', function (socket) {

});

http.listen(6001, function () {
    console.log('Server is running at 6001!');
});