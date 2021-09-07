<?php
$arr=siteConfig();
?>
<!-- <tr>
      <td style="background: #d25b5b; padding-top:14px; text-align:center;">
      <a href="https://www.facebook.com/cygnetthotels/" target="_blank"><img src="http://cygnetthotels.com/mailer/images/f_icon.png" style="width:32px; background-repeat:no-repeat;"/></a>&nbsp;
    <a href="https://twitter.com/cygnetthotels" target="_blank"><img src="http://cygnetthotels.com/mailer/images/t_icon.png" style="width:32px; background-repeat:no-repeat;"/></a>&nbsp;&nbsp;
    <a href="https://www.instagram.com/hotelscygnett/" target="_blank"><img src="http://cygnetthotels.com/mailer/images/i_icon.png" style="width:32px; background-repeat:no-repeat;"/></a>&nbsp;&nbsp;  
      <a href="https://www.linkedin.com/company/cygnett-hotels-&-resorts/?originalSubdomain=in" target="_blank"><img src="http://cygnetthotels.com/mailer/images/l_icon.png" style="width:32px; background-repeat:no-repeat;"/></a>&nbsp;&nbsp; 
      <a href="https://www.youtube.com/user/CygnettHotels" target="_blank"><img src="http://cygnetthotels.com/mailer/images/y_icon.png" style="width:32px; background-repeat:no-repeat;"/></a> 
      </td>
    </tr> -->

    <tr>
      <td style="text-align:center; font-size: 14px; font-weight: 400; line-height: 150%; color:#fff; padding-bottom:14px; background: #d25b5b; padding:2% 0% 3% 0%;"><span style="font-size:18px;"><?php echo $arr['site_name'] ?></span><br>
    <?php echo $arr['address'] ?>, <?php echo $arr['city'] ?>, India<br>
    Email: <a href="mailto:<?php echo $arr['email'] ?>" style="color:#fff; text-decoration:none;"><?php echo $arr['email'] ?></a> <br>
<!--Phone: <a href="tel:01244262555"  style="color:#fff; text-decoration:none;">+91 124 4262555</a> |--> 
Mobile: <a href="tel:<?php echo $arr['mobile1'] ?>" style="color:#fff; text-decoration:none;">+91 <?php echo $arr['mobile1'] ?></a> | +91 <?php echo $arr['mobile2'] ?><br>
Phone : <a href="tel:<?php echo $arr['phone'] ?>" style="color:#fff; text-decoration:none;"><?php echo $arr['phone'] ?></a> <br>
<a href="<?php echo $arr['url'] ?>" style="color:#fff; text-decoration:none;"><?php echo $arr['url'] ?></a>   
    </td>
    </tr>
</table>
</body>
</html>