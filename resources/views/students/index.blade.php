    <!DOCTYPE html>
    <html>

    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }

            .header_title {
                color: red;
                background-color: aqua;
                text-align: center;
            }

            .topi_create {
                float: right;
                padding: 10px 15px;
            }

            .border {
                border-bottom: 1px solid #000000;
                padding: 10px 100px;
            }

            .top {
                margin-top: 60px;
            }

            tr,
            th,
            td {
                text-align: center;
            }

            .icon-wrapper {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .edit-icon,
            .delete-form {
                margin-right: 10px;
            }

            .delete-icon {
                background: none;
                border: none;
                cursor: pointer;
                padding: 0;
                color: #007bff;
            }
        </style>
    </head>

    <body>
        <script>
            @if (session('successMessage'))
                Swal.fire({
                    icon: 'success',
                    text: '{{ session('successMessage') }}',
                    confirmButtonText: 'Đóng'
                });
            @endif
        </script>
        <script>
            @if (session('errorMessage'))
                Swal.fire({
                    icon: 'error',
                    text: '{{ session('errorMessage') }}',
                    confirmButtonText: 'Đóng'
                });
            @endif
        </script>
        <div class="border">
            <h2 class="header_title">Danh mục sinh viên</h2>
            <a href="{{ route('students.create') }}" class="topi_create btn btn-outline-success">Thêm mới</a>
            <table class="top">
                <tr>
                    <th>STT</th>
                    <th>Tên sinh viên</th>
                    <th>Mã sinh viên</th>
                    <th>Mã lớp</th>
                    <th>Hành động</th>
                </tr>
                @foreach ($students as $item => $student)
                    <tr>
                        <th>{{ $item + 1 }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->code }}</td>
                        <td>{{ $student->group }}</td>
                        <td>
                            <div class="icon-wrapper">
                                <a href="{{ route('students.edit', $student->id) }}" class="edit-icon"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="post"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="delete-icon"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            var deleteButtons = document.getElementsByClassName('delete-icon');
            Array.from(deleteButtons).forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    swal({
                        title: "Bạn có chắc chắn muốn xóa?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            button.parentNode.submit();
                        }
                    });
                });
            });
        </script>
    </body>

    </html>
