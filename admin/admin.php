<?php 
$page = 'Users';
require 'inc/header.php';
require 'inc/menu.php'; 
requireAdmin();
?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mainSection">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Admin</h1>
          
          
        <div class="btn-toolbar mb-2 mb-md-0">
          <a class="nbLink" href="http://www.nibtrek.com" target="_blank">
            <p class="text-muted font-italic mb-0">Powered by <img style="max-width:30px; position:relative; top: -8px;" src="img/nibtrek_logo_sm.png"> NibTrek</p>
          </a>
        </div>
          
      </div>

        
        <?php echo display_errors(); echo display_success(); echo display_neutral(); ?>
        <div class="panel">
            <h4>Users</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Registered</th>
                        <th>Admin</th>
                        <th>Promote/Demote</th>
                        <th>Delete</th>
                    </tr>     
                </thead>
                <tbody>
                    <?php foreach (getAllUsers() as $user): ?>
                    <tr>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['created_at']; ?></td>
                        <td><?php if($user['role_id'] == 1){echo '<span data-feather="award"></span>';} ?></td>
                        <td>
                        <?php if (!isOwner($user['id'])): ?>
                            <?php if ($user['dev'] == 1): ?>
                            <span class="text-muted">Web Developer</span>
                            <?php elseif ($user['super'] == 1): ?>
                            <span class="text-muted">Website Owner</span>
                            <?php elseif ($user['role_id'] == 1): ?>
                            <a href="procedures/adjustRole.php?role=demote&userId=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-warning">Demote from Admin</a>
                            <?php elseif ($user['role_id'] == 2): ?>
                            <a href="procedures/adjustRole.php?role=promote&userId=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-success">Promote to Admin</a>
                            <?php endif; ?>
                        <?php endif; ?>
                        </td>
                        
                         <td>
                        <?php if (!isOwner($user['id'])): ?>
                            <?php if ($user['dev'] == 1): ?>
                            <span class="text-muted">--</span>
                            <?php elseif ($user['super'] == 1): ?>
                            <span class="text-muted">--</span>
                            <?php elseif ($user['role_id'] == 1 || $user['role_id'] == 2): ?>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete<?php echo $user['id']?>">
                              Delete
                            </button>

                            
                            <?php endif; ?>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
             <?php foreach (getAllUsers() as $user): ?>
            
               <!-- Modal -->
                <div class="modal fade" id="delete<?php echo $user['id']?>" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="delete<?php echo $user['id']; ?>">Are you Sure?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        This action can not be undone. The user will be able to register again and be promoted to an admin if desired.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="procedures/deleteUser.php?userId=<?php echo $user['id']; ?>" class="btn btn-danger">Yes, Delete User</a>
                      </div>
                    </div>
                  </div>
                </div>     
            
             <?php endforeach; ?>
        </div>


      <img class="mt-4" style="display: block; margin: 0 auto; max-width: 300px;" src="img/gear_back-min.png">
      
        
    </main>
      
<?php require 'inc/footer.php'; ?>