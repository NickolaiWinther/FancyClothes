let express = require("express");
let app = express();
let mysql = require("mysql");

// Connection til db

let connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "fancyclothes"
});

// /api/product/id giver et product med det id

app.get("/api/product/:id", (req, res) => {
    console.log(`Fetching product with id: ${req.params.id}`);

    let productId = req.params.id;
    let queryString = "SELECT * FROM products WHERE productId = ?";
    connection.query(queryString, [productId], (err, rows, fields) => {
        if (err || rows == "") {
            console.log(`Failed to query for product: ${err}`);
            res.sendStatus(500);
            res.end();
            return;
        }
        console.log("Product fetched successfully");

        // Formatere JSON så det kun er brugbare ting som man kan se

        const formattedJson = rows.map(function(row) {
            return {
                overskrift: row.heading,
                stjerner: row.stars,
                indhold: row.copntent,
                pris: row.price,
                billedSti: row.imgSrc
            };
        });

        // Udskriver JSON
        res.json(formattedJson);
    });
});

app.get("/api/products", (req, res) => {
    connection.query("SELECT * FROM products", (err, rows, fields) => {
        if (err || rows == "") {
            console.log(`Failed to query for products: ${err}`);
            res.sendStatus(500);
            res.end();
            return;
        }
        console.log("Products fetched successfully");
        const formattedJson = rows.map(function(row) {
            return {
                overskrift: row.heading,
                stjerner: row.stars,
                indhold: row.copntent,
                pris: row.price,
                billedSti: row.imgSrc
            };
        });
        res.json(formattedJson);
    });
});

// Server kører på port 3000

app.listen(3000, () => {
    console.log(`Server is running on port 3000`);
});
