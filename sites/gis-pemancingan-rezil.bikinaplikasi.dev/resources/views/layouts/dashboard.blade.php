
                <div class="col-md-3">
                    <div  class="main-box mb-red">
                        <a  href="{{ route('map.index') }}">
                            <i class="fa fa-map fa-5x"></i>
                            <h5 >({{ $maps->count() }}) map</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('jenis.index') }}">
                            <i class="fa fa-pencil fa-5x"></i>
                            <h5>({{ $jeniss->count() }}) jenis</h5>
                        </a>
                    </div>
                </div>
            