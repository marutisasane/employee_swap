<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>
<body>
       <nav class="mt-1 navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-grow-0 d-flex " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex " role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
       <div class="container">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                             <div class="col-md-8 offset-2">
                                    <div class="card">
                                            <div class="card-header d-flex align-items-center">
                                                <h5 class="mb-0"><b>Employee Details</b></h5>
                                                <a href="#" class="btn btn-success ml-auto">Add Employee</a>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3 row">
                                                    <div class="col-md-8 offset-2">
                                                        <label for="department"><b> Department :</b></label>
                                                        <select name="department" id="department" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-4 ml-5">
                                                    <div class="col-md-3 offset-1 ">
                                                            <label for="manager" style="margin-left: 25px"><b class="center"> MANAGER </b></label>
                                                            <select multiple name="manager" id="manager" class="form-control">
                                                            </select>
                                                    </div>

                                                    <div class="col-md-2 mt-4">
                                                       <button class="btn btn-primary d-flex ml-4 mt-2 mb-2" onclick="transfer('right')"> > </button>
                                                       <button class="btn btn-primary d-flex ml-4 mt-3 " onclick="transfer('left')"> <</button>
                                                    </div>


                                                    <div class="col-md-3">
                                                            <label for="employee" style="margin-left: 25px"><b> EMPLOYEE </b></label>
                                                            <select multiple name="employee" id="employee" class="form-control">
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
     <script>
        $(document).ready(function()
        {
            getDepartment();
        });


        function getDepartment()
        {
            var action ="department";
            $.ajax({
                url : 'code.php',
                method : "GET",
                dataType :'json',
                data : {action:action},
                success : function(response)
                {
                    var option = "";
                    response.forEach(Element => {
                       $('#department').append(`
                        <option value="${Element.department}"> ${Element.department} </option>
                       `);
                    });
                    getEmployee();
                }
            });
        }

        $('#department').change(function()
        {
             getEmployee();
        });

        function getEmployee()
        {
            var department = $('#department').val();
            var action = "employee";

            $.ajax({
                method: "POST",
                url: "code.php",
                data : {action:action,department:department},
                dataType: "json",
                success: function (response) {
                    $('#manager').html('');
                    $('#employee').html('');
                   response.forEach(element => {
                        if (element.target == 1)
                        {
                            $('#manager').append(
                                ` <option value="${element.id}"> ${element.name} </option> `
                            );
                        }
                        else
                        {
                           $('#employee').append(
                                ` <option value="${element.id}"> ${element.name} </option> `
                            );
                        }
                   });
                }
            });
        }


        function transfer(target)
        {
            var employee = $('#employee').val();
            var manager = $('#manager').val();
            var empId = [];
            if (target == "right") 
            {
                empId = manager; 
            }
            else if (target == "left") 
            {
               empId = employee;     
            }
            

            $('#employee').on('click',function () 
            {
                $('#manager').val("").trigger("change");
            });

            $('#manager').on('click',function () 
            {
                $('#employee').val("").trigger("change");
            });
            
            $.ajax({
                url : 'code.php',
                method : "POST",
                data : {empId:empId,target:target},
                dataType : 'json',
                success : function (response) 
                {
                    if (response.status == 'success') 
                    {
                        console.log(response.status);
                        getEmployee();
                    }
                }
            });


            
        }



     </script>

</body>
</html>