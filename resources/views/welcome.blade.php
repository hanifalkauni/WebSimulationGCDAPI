@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">SIMULASI GET DATA API</div>
                
                <div class="panel-body">
                    <div class="input-group">
                    <span class="input-group-addon">Method</span>
                    <select class="form-control method" id="method" name="method">
                        <option value="get">GET</option>
                        <option value="post">POST</option>
                        <option value="put">PUT</option>
                        <option value="delete">DELETE</option>
                    </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">http://gcdwebservice.herokuapp.com/api/</span>
                        <input id="url" type="text" class="form-control url" name="url" placeholder="url">
                    </div>
                </div>
                    <div class="panel-heading">HEADER</div>
                <div class="panel-body">
                    <div class="input-group">
                        <span class="input-group-addon">ApiKey</span>
                        <input id="apikey" type="text" class="form-control apikey" name="apikey" placeholder="put your apikey here">
                    </div>
    
                    <div class="input-group">
                        <span class="input-group-addon">AccessToken</span>
                        <input id="accesstoken" type="text" class="form-control accesstoken" name="accesstoken" placeholder="put your accesstoken here">
                    </div>
                </div>
                    <div class="panel-heading">BODY</div>
                        <label>Input body with format json</label>
                        <textarea class="form-control body" rows="6" id="body" placeholder='{ "key" : "value", }'></textarea>

    
                <div class="panel-body">
                    <div class="panel aja">
                        <a href="#" type="button" class="btn btn-success tombol">SEND REQUEST API</a>
                        <!-- <a href="#" type="button" class="btn btn-success test">test</a> !-->
                    </div>
                    <label> Response API:</label>

                    <div class="panel-footer hasil">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
