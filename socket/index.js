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
    // Pesan Buka atau Tutup Toko
    socket.on("pesanBukaTutup", ({ sender, statusTutup }) => {
        console.log(sender + " " + statusTutup);

        // Masukan Ke Data Database
        // const query =
        //     "UPDATE pe_toko SET tutup = ? WHERE toko_id = ?";

        // connection.query(query, [statusTutup, sender]);

        // Kalo Receiver Online kirim ke Receiver

        socket.broadcast.emit("pesanBukaTutupServer", {
            sender,
            statusTutup,
        });
    });
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

    socket.on(
        "kirimOrder",
        ({ pemesan, pemilikToko, shoppingCart, totalHarga, deskripsi }) => {
            console.log(
                "================================================\n" +
                    pemesan +
                    "\n" +
                    shoppingCart +
                    "\n" +
                    pemilikToko +
                    "\n" +
                    "================================================\n"
            );

            const dataOrder = JSON.parse(shoppingCart);
            const targetSocket = findSocketByEmail(pemilikToko);
            
            const query =
                "INSERT INTO pe_order(status_pesanan,nominal,deskripsi,email_user,email_toko) VALUES (1,?,?,?,?)";
            connection.query(
                query,
                [totalHarga, deskripsi, pemesan, pemilikToko],
                (error, results, fields) => {
                    if (error) {
                        console.error(error.message);
                    } else {
                        //Ambil order tadi IDnya brp
                        const lastOrderId = results.insertId;

                        //Masukin detail order ke sini

                        dataOrder.forEach((detailOrder) => {
                            const insertDetailQuery =
                                "INSERT INTO pe_detail_order VALUES (?, ?, ?, ?)";
                            connection.query(
                                insertDetailQuery,
                                [
                                    lastOrderId,
                                    detailOrder["idMenu"],
                                    detailOrder["quantity"],
                                    parseInt(
                                        detailOrder["quantity"] *
                                            detailOrder["harga"]
                                    ),
                                ],
                                (error2, results2, fields2) => {
                                    if (error2) {
                                        console.error(error2.message);
                                    } else {
                                        console.log(
                                            "Row inserted successfully into pe_detail_order"
                                        );
                                    }
                                }
                            );
                        });

                        if (targetSocket) {
                            console.log("Emitting kirimOrderServer to target socket:", lastOrderId);
                            targetSocket.socket.emit("kirimOrderServer", {
                                pemesan,
                                lastOrderId,
                            });
                        }

                    }
                }
            );
            
            
        }
    );

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
