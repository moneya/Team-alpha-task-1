//jshint esversion:6
require('dotenv').config();

const express = require('express');
const bodyParser = require('body-parser');
const ejs = require('ejs');
const mongoose = require('mongoose');
const encrypt = require('mongoose-encryption');
// const encrypt = require('mongoose-encryption');

const app = express();

console.log(process.env.API_KEY);

app.use(express.static('public'));
app.set('view engine', 'ejs');
app.use(bodyParser.urlencoded({extended: true}));

mongoose.connect("mongodb+srv://admin-gabrielle:Test123@cluster0-od0qv.mongodb.net/AlphaDB", {useNewurlParser:true});

// Creating User Schema
const userSchema = new mongoose.Schema(
  {
    name: String,
    email: String,
    password: String
  }
) ;
// Low-quality encryption of passwords
userSchema.plugin(encrypt, { secret: process.env.SECRET, encryptedFields: ['password'] });

// Using userSchema to create a mongoose model with collection named User
const User = new mongoose.model("User", userSchema);
app.get("/", function(req, res){
  res.render("home");
});
app.get("/login", function(req, res){
  res.render("login");
});
app.get("/register", function(req, res){
  res.render("register");
});

app.post("/register", function(req, res){
  const newUser = new User({
    name: req.body.fname,
    email: req.body.username,
    password: req.body.password
  });
  // Saving the new user
  newUser.save(function(error){
    if(error){
      console.log(error);
    }
    else{
      res.render("welcome");
    }
  });

});

app.post("/login", function(req,res){
  const username = req.body.username;
  const password = req.body.password;

  User.findOne({email: username}, function(error, foundUser){
    if(error){
      console.log(error);
    }
    else{
      if(foundUser){
        if(foundUser.password === password){
          res.render("welcome");
        }
      }
    }
  });
});

app.listen(process.env.PORT || 3000, function(){
  console.log("Server is running on port 3000");
});
