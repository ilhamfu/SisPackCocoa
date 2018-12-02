@extends('layout.app')

@section('content')
<div class="container-fluid pt-3 mb-3">
    <div class="row">
        <div class="col-md-4">
            <div class="card border-success text-center">
                <div class="card-body">
                    <h4 class="card-title">Daftar Penyakit</h4>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="" id="search1" aria-describedby="helpId"
                            placeholder="" onkeyup="updateListPenyakit()">
                    </div>
                    <ul class="list-group h-75 mb-3" id="list1">

                    </ul>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="pagination1">
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success text-center">
                <div class="card-body">
                    <h4 class="card-title">Daftar Gejala</h4>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="" id="search2" aria-describedby="helpId"
                            placeholder="" onkeyup="updateListGejala()">
                    </div>
                    <ul class="list-group h-75 mb-3" id="list2">
                        
                    </ul>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="pagination2">
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success text-center">
                <div class="card-body">
                    <h4 class="card-title">Gejala Yang Dipilih</h4>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="" id="search3" aria-describedby="helpId"
                            placeholder="">
                    </div>
                    <ul class="list-group h-75 mb-3" id="list3">
                        
                    </ul>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="pagination3">
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/script.js')}}"></script>    
@endsection