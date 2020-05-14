<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
  .myprofile {
    padding: 2%;
    background-color: white;
    border-radius: 10px;
    padding: 3%;
  }

  input:active {
    border: 1px solid black;
  }

  input {
    border: 1px solid black;
  }
</style>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Create Class
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"> Create Class</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="myprofile">
              <form method="POST" action="createclass_data.php" name="createclass">
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                </div>
                <hr>
                <h4>Add Category</h4><br>
                <div class="form-group row">
                  <label for="category" class="col-md-4 col-form-label text-md-right">Category Name</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="category" name="category" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
                  <div class="col-md-6">
                    <input type="number" class="form-control" min="0" id="price" name="price" required>
                  </div>
                </div>
                <hr>
                <h4>Add Sub Category</h4><br>
                <div class="form-group row subcategory">
                  <label for="subcategory" class="col-md-4 col-form-label text-md-right">Sub Category name</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="subcategory" name="subcategory[]" required>
                  </div>
                </div>
                <button class="add btn btn-primary" type="button"><i class="fa fa-plus"></i> Add</button>
                <button class="sub btn btn-danger" type="button"><i class="fa fa-minus"></i> Remove</button>
                <hr>

                <button type="submit" class="btn btn-success btn-flat" name="createclass"><i class="fa fa-check-square-o"></i> Create Class</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php include 'includes/footer.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script language="javascript">
    $(document).ready(function() {
      $('.add').on('click', function() {
        var element1 = $('<div class="form-group row subcategory"><label for = "subcategory" class = "col-md-4 col-form-label text-md-right"> Sub Category name </label><div class = "col-md-6" ><input type="text" class="form-control" id="subcategory" name="subcategory[]" required ></div></div>');
        $('.add').before(element1);
      });
      $('.sub').on('click', function() {
        var size = $('.myprofile').find('.subcategory').length;
        if (size > 1) {
          $('.myprofile').find('.subcategory').last().remove();
        }
      });
    });
  </script>
</body>

</html>