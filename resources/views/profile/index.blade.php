@extends('layouts.template')
@section('content')
    <style>
.profile-image-container {
    position: relative; /* Pastikan kontainer gambar menggunakan posisi relatif */
    display: flex;
    flex-direction: column;
    align-items: center;
}

.profile-user-img {
    width: 200px;
    height: 200px;
    object-fit: cover;
    border-radius: 50%;
}

.ubah-foto-btn {
    margin-top: 10px;
}

/* Hide the input file */
#upload_foto {
    display: none;
}

/* Style for the edit icon */
.edit-icon {
    position: absolute;
    bottom: 15px; /* Atur jarak dari bawah */
    right: 15px;  /* Atur jarak dari kanan */
    background-color: white;
    border-radius: 50%;
    padding: 8px;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    z-index: 10;  /* Pastikan ikon berada di atas gambar */
}

.edit-icon i {
    font-size: 18px;
    color: #007bff;
}

    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="profile-image-container">
                            <img class="profile-user-img img-fluid img-circle" src="{{ route('profile.photo') }}" alt="User profile picture">
                            <form action="{{ route('upload.foto') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="upload_foto" class="edit-icon">
                                    <i class="fas fa-edit"></i> <!-- Icon edit -->
                                </label>
                                <input type="file" id="upload_foto" name="foto" accept="image/*" onchange="this.form.submit()">
                            </form>
                        </div>

                        <h3 class="profile-username text-center">{{ auth()->user()->nama }}</h3>
                        <p class="text-muted text-center">{{ auth()->user()->level->level_nama }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Username</b> <a class="float-right" style="pointer-events: none; color:black">{{ auth()->user()->username }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Nama</b> <a class="float-right" style="pointer-events: none; color:black">{{ auth()->user()->nama }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tingkat Level</b> <a class="float-right" style="pointer-events: none; color:black">{{ auth()->user()->level->level_nama }}</a>
                            </li>
                        </ul>

                        <a href="{{ url('/') }}" class="btn btn-primary btn-block"><b>Kembali</b></a>
                        <button class="btn btn-sm btn-primary mt-1" onclick="modalAction('{{ url('/profile/' . auth()->user()->user_id . '/edit_ajax') }}')">Ubah Profil</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" databackdrop="static"
    data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('js')
<script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
</script>

@endpush


