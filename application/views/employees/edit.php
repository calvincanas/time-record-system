<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Employee</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <style>
        .mt40 {
            margin-top: 40px;
        }
    </style>
</head>
<body>

<div class="container">

<div class="row">
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h2>Edit Employee</h2>
        </div>
    </div>
</div>


<form action="<?php echo base_url('employee/store/') ?>" method="POST">
   <input type="hidden" name="id" value="<?php echo $employee->id ?>">
     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Title</strong>
                <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo $employee->first_name ?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Title</strong>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $employee->last_name ?>">
            </div>
        </div>
        <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>

</body>
</html>
