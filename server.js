var express = require('express');
var mysql = require('mysql');
var app = express();

var connection = mysql.createConnection({
	host:'localhost',
	user:'root',
	password:'password',
	database: 'quotes_db'
	
});

var PORT=process.env.PORT || 8000;

connection.conect(function(err){
	if(err) throw err;
	
	app.get('/', function(req,res)){
		
		
		
	}






})