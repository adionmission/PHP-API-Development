<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Assignment</title>
</head>
<body>

<div class="container" style="margin-top: 30px;">
    <h3 align="center" style="margin-bottom: 20px;">Student Details</h3>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Course ID</th>
                <th scope="col">Date of Joining</th>
                <th scope="col">Course Name</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <br>
    <br>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Insert</a></li>
        <li><a data-toggle="tab" href="#menu1">Update</a></li>
        <li><a data-toggle="tab" href="#menu2">Filter</a></li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <br>
            <form method="POST" id="api_form">
                <div class="form-group">
                    <input type="text" name="first_name" class="form-control" id="fname" placeholder="First Name">
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" class="form-control" id="lname" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <input type="text" name="course_name" class="form-control" id="cname" placeholder="Course Name">
                </div>
                <div class="form-group">
                    <input type="text" name="date_of_joining" class="form-control" id="date" placeholder="Date of Joining">
                </div>
                <input type="hidden" name="action" id="action" value="adddata" />
                <input type="submit" id="submitNewAdd" name="submitNewAdd" class="btn btn-primary" value="Add" />
            </form>
        </div>
        <div id="menu1" class="tab-pane fade">
            <br>
            <form method="POST" id="ap_form">
                <div class="form-group">
                    <input type="text" name="first_name" class="form-control" id="fname" placeholder="First Name">
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" class="form-control" id="lname" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <input type="text" name="course_name" class="form-control" id="cname" placeholder="Course Name">
                </div>
                <div class="form-group">
                    <input type="text" name="date_of_joining" class="form-control" id="date" placeholder="Date of Joining">
                </div>
                <input type="hidden" name="action" id="action" value="updatedata" />
                <input type="submit" id="submitUpdate" name="submitUpdate" class="btn btn-warning" value="Update" />
            </form>
        </div>
        <div id="menu2" class="tab-pane fade">
            <br>
            <form method="POST" id="a_form">
                <input type="hidden" name="action" id="action" value="filterdata" />
                <input type="submit" id="submitFilter" name="submitFilter" class="btn btn-success" value="Filter" />
            </form>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        outputData();
            
        // fetch
        function outputData(){
            $.ajax({
                url: "output.php",
                success:function(data){
                    $('tbody').html(data);
                }
            });
        }

        // insert
        $('#api_form').on('submit', function(event){
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: "controller.php",
                method: "POST",
                data: formData,
                success:function(data){
                    outputData();
                    $('#api_form')[0].reset();
                }
            });
        });

        // update
        $('#ap_form').on('submit', function(event){
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: "controller.php",
                method: "POST",
                data: formData,
                success:function(data){
                    outputData();
                    $('#api_form')[0].reset();
                }
            });
        });

        // filter
        function filterData(){
            $.ajax({
                url: "filter.php",
                success:function(data){
                    $('tbody').html(data);
                }
            });
        }

        $('#a_form').on('submit', function(event){
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: "controller.php",
                method: "POST",
                data: formData,
                success:function(data){
                    filterData();
                    $('#api_form')[0].reset();
                }
            });
        });

    });
</script>
<br>
<br>
<br>
<br>
</body>
</html>
