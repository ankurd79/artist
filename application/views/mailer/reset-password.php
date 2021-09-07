  <?php $this->view('mailer/mail-header.php'); 
  //print_r($alldata);
  $resetUrl="".base_url()."reset-password/".base64_encode($alldata['email'])."";

  ?>
  <tr>
    <td style="padding:5%;">
	<p>Hello!</p>
	<p>Please use the following url <a href="<?php echo $resetUrl ?>"><?php echo $resetUrl ?></a> to reset password for your account</p>
	<p>You have received this mail since you had requested to reset the password. Incase you didn't initiate the request, you may ignore this email.</p>
	</td>
  </tr>
  <?php $this->view('mailer/mail-footer.php'); ?>
  
