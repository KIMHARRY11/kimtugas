<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Data</h1>
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="book_name" class="form-label">Book Name</label>
                <input type="text" class="form-control" id="book_name" name="book_name" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
