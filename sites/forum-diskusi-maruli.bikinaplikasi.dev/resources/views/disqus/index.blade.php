<div class="text-center">
    <h5>Silakan Berdiskusi Secara Bebas Bertanggung Jawab dan Tidak Menggandung SARA</h5>
    <small class="bg-danger text-white">Jika melanggar akan mendapatkan konsekuensi berupa penghapusan komentar hingga
        blokir akun oleh admin</small>
</div>

<div class="row mr-0 pl-3">
    <div class="card col-md-8 mt-5 pt-4">
        @foreach($post->komens->sortByDesc('is_the_best_komen')->take(50) as $komen)
            <div class="mb-3">
                <div class="card-body border-success" style="background-color: rgba(80, 80, 80, .05)">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ url($komen->user->foto_profile ?? "img/anonymous.png") }}" class="img-fluid rounded-start" alt="" width="40"
                                 height="40" style="float: left; margin-right: 20px;">
                            <div class="row">
                                <div class="col-12">
                                    <strong style="display: inline-block;">{{ $komen->user->name }}</strong>

                                    @if($komen->is_the_best_komen)
                                        <button class="btn btn-warning btn-sm">Komentar terbaik</button>
                                    @elseif(auth()->user()->id && !$komen->where('is_the_best_komen', 1)->count())
                                        <a href="{{ url("post/{$post->slug}/set-as-the-best-komen/" . $komen->id) }}"
                                           class="btn btn-secondary btn-sm"
                                           onclick="return confirm('Yakin akan memilih komentar ini sebagai komentar terbaik?');">Pilih
                                            sebagai komentar terbaik </a>
                                    @endif

                                    @if(auth()->id() == $komen->user_id)
                                        <a data-bs-toggle="modal" data-bs-target="#modal-komen-{{ $komen->id }}"
                                           class="btn btn-secondary btn-sm">Edit</a>

                                        <form action="{{ url('posts/' . $post->slug . '/komen/' . $komen->id) }}" method="post"
                                              class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin akan menghapus komentar ini?')">Hapus</button>
                                        </form>
                                    @endif

                                    <div class="modal fade" id="modal-komen-{{ $komen->id }}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <form method="post"
                                                          action="{{ url('posts/' . $post->slug . '/komen/' . $komen->id) }}"
                                                          class="mb-5"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <h5>Ubah</h5>
                                                            @error('body')

                                                            <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                            <textarea id="modal-komen-textarea-{{ $komen->id }}"
                                                                      type="hidden" name="isi"
                                                                      value="{{ old('isi') }}">{{ $komen->isi }}</textarea>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Ubah Jawaban
                                                        </button>
                                                    </form>

                                                    <script>
                                                        setTimeout(() => {
                                                            CKEDITOR.replace('modal-komen-textarea-{{ $komen->id }}', {
                                                                height: 200,
                                                                filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
                                                            });
                                                        }, 1000);
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <small
                                        style="display: inline-block; float: right; color: grey;">{{ $komen->created_at == $komen->updated_at ? $komen->created_at->diffForHumans() : "Diupdate: " . $komen->updated_at->diffForHumans() }}</small>

                                </div>

                                <div class="col-12">
                                    <p>{!!  $komen->isi !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($komen->balasans as $balasan)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="{{ url($balasan->user->foto_profile ?? "img/anonymous.png") }}" class="img-fluid rounded-start" alt=""
                                             width="40"
                                             height="40" style="float: left; margin-right: 20px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <strong
                                                    style="display: inline-block;">{{ $balasan->user->name }}</strong>
                                                <small
                                                    style="display: inline-block; float: right; color: grey;">{{ $balasan->created_at->diffForHumans() }}</small>
                                            </div>

                                            <div class="col-12">
                                                <p>{!! $balasan->isi !!} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <img src="{{ url(auth()->user()->foto_profile ?? "img/anonymous.png") }}" class="img-fluid rounded-start" alt=""
                                 width="40"
                                 height="40" style="float: left; margin-right: 20px;">
                            <form method="post" action="{{ url("posts/komen/$komen->id/balasan") }}"
                                  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-10">
                                        @csrf
                                        <div class="mb-3">
                                            @error('body')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <textarea rows="2" name="isi"
                                                      class="form-control form-control-sm"
                                                      placeholder="ketik isi balasan disini..."></textarea>
                                        </div>

                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-outline-primary btn-sm">Jawab
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-lg-4 mt-5">
        <form method="post" action="{{ url('posts/' . $post->slug . '/komen') }}" class="mb-5"
              enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <h5>Jawaban</h5>
                @error('body')

                <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea id="isi" type="hidden" name="isi" value="{{ old('isi') }}"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Jawab</button>
        </form>
    </div>
</div>

{{-- Trix Editor --}}
<link rel="stylesheet" type="text/css" href="{{url("css/trix.css")}}">
<script type="text/javascript" src="{{url("js/trix.js")}}"></script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    // ini harus dibuat supaya ck editor bisa upload gambar
    CKEDITOR.config.filebrowserUploadMethod = 'form';

    // ini adalah inisialisasi setiap ck editor, dari id 0 sampai 3, jadi kalo perlu ckeditornya
    // kita tinggal pasang aja id yang tersedia dibawah ini, dan ck editor pun langsung tampil
    CKEDITOR.replace('isi', {
        height: 200,
        filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
    });
</script>
