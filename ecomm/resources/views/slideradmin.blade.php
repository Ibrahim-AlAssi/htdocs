@extends('masteradmin')
@section('content')

<div id="wrapper">
    <div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
    <div class="col-md-12">
        <h1 style="text-align: center" class="page-head-line">Images</h1>
        @foreach ($slider as $index => $item)
        <div class="item {{$index==0?'active':''}}">
            <img style="width:30%" src="{{$item->slider}}">
            <div style="margin-top: 10px" class="col-sm-3">
                <a href="/removeimage-{{$item->id}}" class="btn btn-warning" >Remove Image</a>
                <form class="form-horizontal" action="addimage" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <input  id="filebutton" name="image" class="input-file" type="file">
                        <input type='hidden' name="id" value="{{$item['id']}}" >
                      </div><br>
                      <button type="submit" name="singlebutton" class="btn btn-warning">Submit</button>
                </form>
             </div>
             
            <hr>
            
            
          </div>

        @endforeach
        <form class="form-horizontal" action="imagnew" method="POST" enctype="multipart/form-data">
            @csrf
            <input  id="filebutton" name="image" class="input-file" type="file">
            <div class="control-group">
                <input type="text" name="line1" placeholder="line1" class="input-xlarge"/>
                <input type="text" name="line2" placeholder="line2" class="input-xlarge"/>
            </div>
            <button type="submit" name="singlebutton" class="btn btn-warning">Submit</button>
        </form>
    </div>
        </div>
    </div>
</div>
</div>





@endsection