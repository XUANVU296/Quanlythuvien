<style>
    /* Căn giữa form */
    .center-form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Form */
    .form-group input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Bảng */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .card-title {
            color: red;
            background-color: aqua;
            text-align: center;
        }

    /* Thông báo */
    .alert {
        padding: 15px;
        background-color: #f44336;
        color: white;
        border-radius: 5px;
        margin-bottom: 20px;
    }
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card center-form">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Xem chi tiết phiếu mượn</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Số phiếu</th>
                                    <th>Tên sách</th>
                                    <th>Ngày tạo phiếu</th>
                                    <th>Ghi chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrownDetails as $detail)
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    value="{{ $detail->id }}" readonly>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    value="{{ $detail->book->name }}" readonly>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    value="{{ $detail->borrown->borrownDate }}" readonly>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input style="width:350px;" type="text" class="form-control"
                                                    value="{{ $detail->note }}" readonly>
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
    </div>
</div>
