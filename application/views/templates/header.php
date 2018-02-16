<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>To Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/index.css">
</head>
<body>
<div class="navbar navbar-expand-lg navbar-light bg-light bg-primary">
    <div class="container">
        <a href="<?php echo base_url(); ?>" class="navbar-brand">To Do List</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <a class="nav-link" href="<?php echo base_url(); ?>">Alle lijsten</a>
            <a class="nav-link" href="<?php echo base_url(); ?>create">Toevoegen</a>
          </ul>
        </div>
    </div>
</div>
<div class="container">
<br>