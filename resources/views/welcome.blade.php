<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-light justify-content-end bg-info bg-gradient">
        <a class="text-dark" href="{{route('logout')}}">Logout</a>
    </nav>
    <header class="bg-info bg-gradient py-3">
        <h1 class="text-center">to-Do List</h1>
    </header>
    <section class="bg-dark py-5">
        <div class="container-fluid">
            <div class="d-flex flex-row-reverse">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal">New Item</button>
            </div>
            <div class="container mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Items</th>
                            <th>Description</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
    <footer class="container-fluid pt-3 pb-1 text-center text-black adjust bg-info bg-gradient" style="position:relative">
        <p><b>
                &copy; Developed by
                <a href="https://amputra.com" class="text-danger" style="text-decoration:none;">Amier Putra</a>
                | All Rights Reserved | Version Release: v1.0 | THIS IS FOR EDUCATION PURPOSE ONLY.
            </b></p>
    </footer>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">New Item Form</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{route('saveItem')}}">
                        {{csrf_field()}}
                        <p><input class="form-control px-3" type="text" name="listItem" placeholder="To do item"></p>
                        <p><textarea class="form-control px-3" name="description" rows="4" cols="50" placeholder="To do description"></textarea></p>
                        <button type="submit" class="btn btn-info">Save to-Do</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</body>

</html>