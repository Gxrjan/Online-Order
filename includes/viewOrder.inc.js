var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: ""
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});




function viewOrder(id){
			var opened = window.open("");
			opened.document.write("<html><body>HELLO"+id+"</body></html>");
		}