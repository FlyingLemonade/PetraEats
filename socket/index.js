const express = require("express");
const app = express();
const http = require("http").Server(app);
const io = require("socket.io")(http, {
    cors: { origin: "*" },
});

const mysql = require("mysql");
const moment = require("moment");
const connectedSockets = [];

const connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "petraeats",
});

connection.connect(function (err) {
    if (err) throw err;
    console.log("Database Conected ...");
});

//   Cek Apakah Ada User Connect

io.on("connection", function (socket) {
    const userEmail = socket.handshake.query.email;
    const existingSocket = connectedSockets.find(
        (s) => s.user.email === userEmail
    );
    if (!existingSocket) {
        connectedSockets.push({
            socket,
            user: {
                email: userEmail,
            },
        });
    }

    // Kontak semua yang terkonek
    // socket.broadcast.emit('user_connected',socket.handshake.query.email);
    console.log("User Connected", socket.handshake.query.email);

    // Cek tolak / terima dari kantin ke mahasiswa
    function findSocketByEmail(email) {
        return connectedSockets.find((socket) => socket.user.email === email);
    }
    socket.on("pesanTerima", ({ order_id, statusTerima, userTujuan }) => {
        console.log(statusTerima + " " + userTujuan);
        const targetSocket = findSocketByEmail(userTujuan);
        // Masukan Ke Data Database
        const query =
            "UPDATE pe_order SET status_pesanan = ? WHERE order_id = ?";
        var num;
        if (statusTerima == "terima") {
            num = 2;
        } else if (statusTerima == "selesai") {
            num = 3;
        } else {
            num = 0;
        }

        connection.query(query, [num, order_id]);

        // Kalo Receiver Online kirim ke Receiver
        if (targetSocket) {
            console.log(statusTerima);
            targetSocket.socket.emit("pesanTerimaServer", {
                statusTerima,
                order_id,
            });
        }
    });

    // User Disconect
    socket.on("disconnect", function () {
        const index = connectedSockets.findIndex((s) => s.socket === socket);
        if (index !== -1) {
            connectedSockets.splice(index, 1);
            console.log("User Just Disconnected");
        }
    });
});

http.listen(3000);
