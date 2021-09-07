  <?php $this->view('mailer/mail-header.php'); 
  print_r($alldata);

  ?>
  <tr>
    <td style="padding:5%;">
	<p>Hi, <strong><?php echo ucfirst($alldata['first_name']) ?> <?php echo ucfirst($alldata['last_name']) ?></strong></p>
	<p>Congratulations!You have successfully created an account on our site!</p>
	<p>Login with the following details:</p>
	<p>Username: <?php echo $alldata['email']?></p>
	<p>Password: <?php echo $alldata['password']?></p>
	</td>
  </tr>
  <?php $this->view('mailer/mail-footer.php'); ?>
  
