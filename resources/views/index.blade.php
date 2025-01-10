<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Tabel Daftar Buku</h1>
        

        <form method="GET" action="{{ route('index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari" value="{{ request()->get('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>

        <a href="{{ route('create') }}" class="btn btn-primary mb-3">Tambah Data Buku Baru</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Book</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Publisher</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->book_name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>
                            <a href="{{ route('edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?')">Hapus</button>
                            </form>                                                                                   
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
