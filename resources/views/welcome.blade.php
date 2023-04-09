<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-light justify-content-end bg-info bg-gradient px-3">
        <a class="text-dark" href="{{route('logout')}}" style="text-decoration:none;">Logout</a>
    </nav>
    <header class="bg-info py-3">
        <h1 class="text-center">to-Do List</h1>
    </header>
    <section class="d-flex bg-light py-5 h-100">
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
                    @foreach ($listItems as $listItem)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $listItem->name }}</td>
                        <td>{{ $listItem->description }}</td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('markComplete', $listItem->id) }}" accept-charset="UTF-8" onsubmit="return confirm('Completed?');">
                                        {{csrf_field()}}
                                        <button class="btn text-success rounded-circle" type="submit">
                                            <i class="fa fa-check"></i></button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form method="post" action="{{route('markDelete',$listItem->id)}}" accept-charset="UTF-8" onsubmit="return confirm('Delete?');">
                                        {{csrf_field()}}
                                        <button class="btn text-danger rounded-circle" type="submit">
                                            <i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form method="post" accept-charset="UTF-8" onsubmit="return confirm('Update?');">
                                        {{csrf_field()}}
                                        <button class="btn text-warning rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#edModal">
                                            <i class="fa fa-pencil-square-o"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
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
    <div class="modal" id="edModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Item Form</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                @foreach ($listItems as $listItem)
                    <form method="post" action="{{route('markUpdate',$listItem->id)}}" accept-charset="UTF-8">
                        {{csrf_field()}}
                        <p><input class="form-control px-3" type="text" name="updateItem" placeholder="To do item" required value="{{ $listItem->name }}"></p>
                        <p><textarea class="form-control px-3" name="updateDesc" rows="4" cols="50" placeholder="To do description">{{ $listItem->description }}</textarea></p>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                @endforeach
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