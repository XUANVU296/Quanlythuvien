@extends('index')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <!-- Thêm đường dẫn đến Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <style>
        .header_title {
            color: red;
            background-color: aqua;
            padding: 10px;
        }

        .book-list-title {
            color: red;
            background-color: aqua;
            padding: 10px;
        }

        .margin-top {
            margin-top: 32px;
        }

        .color {
            color: rgba(243, 239, 239, 0.868);
        }
    </style>
</head>

<body>
    <script>
        @if (session('errorMessage'))
            Swal.fire({
                icon: 'error',
                text: '{{ session('errorMessage') }}',
                confirmButtonText: 'Đóng'
            });
        @endif
    </script>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h4 class="header_title text-center">Thông tin phiếu mượn</h4>
            </div>
            <div class="col-md-8">
                <h4 class="book-list-title text-center">Danh sách sách</h4>
            </div>
        </div>
        <div class="row">
            <!-- Form thêm mới phiếu mượn -->
            <div class="col-md-4">
                <form action="{{ route('borrowns.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="student_name">Tìm kiếm tên sinh viên:</label>
                            <div class="input-group">
                                <input type="text" id="student_name" name="student_name" class="form-control" placeholder="Tìm kiếm tên sinh viên">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="search_button">Tìm kiếm</button>
                                </div>
                            </div>
                            @error('student_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="container" id="student_info" style="display: none;">
                                <h4>Thông tin sinh viên</h4>
                                <p id="student_name_info"></p>
                                <p id="borrow_date_info"></p>
                                <!-- Thêm các thông tin khác của sinh viên nếu cần -->
                            </div>
                        </div>
                        
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-outline-success btn-block">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Danh sách sách trong thư viện -->
            <div class="col-md-8">
                <div class="row">
                    @foreach ($books as $key => $book)
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="book{{ $book->id }}" name="books[]" value="{{ $book->id }}">
                                <label class="form-check-label" for="book{{ $book->id }}">{{ $book->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Thêm đường dẫn đến Bootstrap JS (nếu cần) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


@endsection
