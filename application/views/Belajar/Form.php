<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<form action="<?php echo site_url('belajar/sendSms'); ?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Number</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Number" name="number">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Message</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="message" placeholder="Message">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>