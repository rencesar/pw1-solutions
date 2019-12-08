<?php
const DB = 'pgsql';
const DBHOST = 'localhost';
const DBNAME = 'pokedb';
// const DBUSER = 'postgres';
// const DBPWD = 'postgres';
// ifpb
const DBUSER = 'postgres';
const DBPWD = 'ifpb';

function connect(){
  $dsn = DB.":dbname=".DBNAME.";host=".DBHOST;
  try {
    return new PDO($dsn, DBUSER, DBPWD);
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
}
