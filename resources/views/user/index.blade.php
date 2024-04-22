<div class="card">
    <div class="card-body">
        <a href="user/create" class="btn btn-primary"><i class=" fas fa-plus"></i>Tambah</a>
        {{-- jika kita memiliki session success maka eksekusi alert
            berikut pesannya
            --}}
        @if (session()->has('success'))
            <div class="alert alert-success mt-2"><i class="fas fa-check"></i>
                {{ session('success') }}
            </div>
        @endif


        <table class="table mt-1">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="/user/{{ $item->id }}/edit" class="btn btn-info btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                {{-- <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}

                                {{-- delete data --}}
                                <form action="/user/{{ $item->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm ml-1" type="submit"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
