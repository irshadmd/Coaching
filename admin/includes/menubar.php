<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="changepassword.php"><i class="fa fa-key"></i> <span>Change Password</span></a></li>
      <li><a href="createclass.php"><i class="fa fa-users"></i> <span>Create Class</span></a></li>
      <li><a href="addcategory.php"><i class="fa fa-plus"></i> <span>Add Category</span></a></li>
      <li><a href="uploadcrousel.php"><i class="fa fa-image"></i> <span>Upload Crousel</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Classes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php
          $sql = "SELECT * FROM classes";
          $query = $conn->query($sql);
          if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {

          ?>
              <li><a href="openclass.php?id=<?php echo $row['class_name']; ?>"><i class="fa fa-circle-o"></i> <?php echo $row['class_name']; ?></a></li>
          <?php
            }
          }
          ?>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>