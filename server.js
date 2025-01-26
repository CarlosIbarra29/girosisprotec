const http = require('http');
const { Server } = require("socket.io");

const server = http.createServer();
const io = new Server(server, {
    cors: {
        origin: "http://ec2-54-236-5-7.compute-1.amazonaws.com",
        methods: ["GET", "POST"],
        credentials: true
    }
});

io.on('connection', (socket) => {
    console.log('\x1b[32m%s\x1b[0m', 'A user connected');

    socket.on('join_conversation', (conversationId) => {
        socket.join(conversationId);
        console.log(`\x1b[32m%s\x1b[0m`, `User joined conversation ${conversationId}`);
    });

    socket.on('message', (data) => {
        io.to(data.conversationId).emit('message', { userId: data.userId, message: data.message });
    });

    socket.on('disconnect', () => {
        console.log('\x1b[31m%s\x1b[0m', 'A user disconnected');
    });
});

server.listen(3000, () => {
    console.log('\x1b[36m%s\x1b[0m', 'listening on *:3000');
});