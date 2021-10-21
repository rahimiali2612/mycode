<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
               
    <h1 class="h2 mt-3 mb-3">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a class="btn btn-success btn-sm" href="{{ route('admin.create') }}">Create User</a>
        </div>
     
      </div>
    <div class="table-responsive mt-3">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.update', $item->id) }}">Update</a>
                        <a class="btn btn-danger btn-sm" href="{{ route('admin.delete', $item->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>