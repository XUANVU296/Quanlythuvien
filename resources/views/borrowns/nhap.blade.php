<h4 style="color:red; background-color: aqua; margin-top: 20px;">Danh sách sách trong thư viện</h4>
            <div class="row">
                @foreach ($books as $key => $book)
                    <div class="col-md-3 mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="book{{ $book->id }}" name="books[]" value="{{ $book->id }}">
                            <label class="form-check-label" for="book{{ $book->id }}">{{ $book->name }}</label>
                        </div>
                    </div>
                    @if (($key + 1) % 4 == 0)
                        </div><div class="row">
                    @endif
                @endforeach
            </div>