<?php
//print_r($results);
?>

</style>
        <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Client</th>
                      <th>Added On</th>
                      <th>Updated On</th>
                      <th>Added By</th>
                      <th>Updated By</th>
                      <th style="width: 40px">Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if (count($results)) {
                        $i = 1;
                        $j=1;
                        foreach ($results as $recs) {
                    ?>
                      <tr>
                        <td><?php echo $i++ ?>.</td>
                        <td><?php echo $recs['client_name'] ?></td>
                        <td>
                          <?php echo formatDateTime($recs['added_on']) ?>
                        </td>
                        <td>
                          <?php 
                              if($recs['updated_on']<>''){
                                  echo formatDateTime($recs['updated_on']);
                              }else{
                                echo '--';
                              }

                           ?>
                          
                        </td>
                        <td>Admin</td>
                        <td>Admin</td>
                        <td>
                          <label class="switch">
                            <input type="checkbox" class="m" name="chk_active" id="p_<?php echo $recs['id'] ?>_<?php echo $recs['is_active'] ?>" value="1" <?php if($recs['is_active']==1) {?>checked="checked"<?php } ?>>
                            <span class="slider round"></span>
                          </label>
                        </td>
                        <td><a href="<?php echo base_url() ?>manage-client-say/edit/<?php echo base64_encode($recs['id']) ?>"><i class="fas fa-edit"></i></a></td>
                        
                        <td><i class="far fa-trash-alt delete" id="del_<?php echo $recs['id'] ?>"></i></td>
                      </tr>
                    <?php } }?> 
                  </tbody>
                </table>