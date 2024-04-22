<div class="card">
    <div class="card-body">
        <h4><b>Tambah data</b></h4>
        {{-- isset : jika ada $user, maka tampilkan form user, jika tidak maka kosong  --}}
        @isset($user)
            <form action="/user/{{ $user->id }}" method="POST">
                @method('put')
            @else
                <form action="/user" method="POST">
                @endisset
                @csrf
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text"
                        class="form-control
              @error('name')
                is-invalid
              @enderror
              "
                        name="name" placeholder="Nama Lengkap" {{-- isset : jika ada $user, maka tampilkan namenya, jika tidak maka kosong  --}}
                        value="{{ isset($user) ? $user->name : '' }}">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text"
                        class="form-control @error('email')
                is-invalid
              @enderror"
                        name="email" placeholder="Email" {{-- isset : jika ada $user, maka tampilkan namenya, jika tidak maka kosong  --}}
                        value="{{ isset($user) ? $user->email : '' }}">

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control
                @error('password') is-invalid @enderror"
                        name="password" placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Konfirmasi Password</label>
                    <input type="password"
                        class="form-control @error('re_password')
                is-invalid
              @enderror"
                        name="re_password" placeholder="Password">
                    @error('re_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <a href="/user" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
    </div>
</div>
