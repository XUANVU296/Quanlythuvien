@extends('index')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
<style>
    table {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
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
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách phiếu mượn</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-8">
                    <input type="text" id="searchInput" onkeyup="searchFunction()" placeholder="Tìm kiếm tên sinh viên" class="form-control">
                </div>
                <div class="col-2">
                    <input type="submit" name="search" value="Tìm kiếm" class="btn btn-secondary">
                </div>
                <div class="col-2">
                    <a href="{{ route('borrowns.create') }}" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="borrownsTable" class="top">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sinh viên</th>
                            <th>Ngày mượn</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrowns as $item => $borrown)
                        <tr>
                            <td>{{ $item + 1 }}</td>
                            <td>{{ $borrown->student->name }}</td>
                            <td>{{ $borrown->borrownDate }}</td>
                            <td>
                                <div class="icon-wrapper">
                                    <a href="{{ route('borrowns.edit', $borrown->id) }}" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('borrowns.show', $borrown->id) }}" class="edit-icon">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('borrowns.destroy', $borrown->id) }}" method="post" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="delete-icon">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var deleteButtons = document.querySelectorAll('.delete-icon');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            swal({
                title: "Bạn có chắc chắn muốn xóa?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    button.closest('form').submit();
                }
            });
        });
    });

    function searchFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase().trim();  // Loại bỏ khoảng trắng thừa
    table = document.getElementById("borrownsTable");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            txtValue = txtValue.toUpperCase().trim();  // Loại bỏ khoảng trắng thừa
            if (txtValue.indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
