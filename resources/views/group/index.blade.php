<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/465dc63746.js"></script>

    <title>All Groups</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">All groups</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->description }}</td>
                   <td><a href="{{ route('groups.show', [$group]) }}"><i class="fas fa-eye"></i></a></td>
                    <td><a href="{{ route('groups.edit', [$group]) }}"><i class="fas fa-edit"></i></a></td>
                     <td>
                <a href="" onclick="var result = confirm('Are you sure delete this Group?');
                if (result) {
                    event.preventDefault();
                    document.getElementById('delete-form').submit();
                }">
                <i class="fas fa-archive"></i></a>
                <form id="delete-form" action="{{ route('groups.destroy', [$group->id]) }}" method="POST" style="display: none">
                    <input type="hidden" name="_method" value="delete">{{ csrf_field() }}
                </form>
              </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('groups.create') }}" class="btn btn-success btn-block">Create</a>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>