<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>WEB SIMULATION</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Web Simulation API
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                       <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Menu <span class="caret"></span>
                                </a>
                            <ul class="dropdown-menu">
                                <a href="#"  role="button" aria-expanded="false" aria-haspopup="true">
                                   a 
                                </a>

                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $('.tombol').on('click',function(){
            $url=$('.url').val();
            $method=$('.method').val();
            $apikey=$('.apikey').val();
            $accesstoken=$('.accesstoken').val();
            $pecah=$url.split("/");
            $model=$pecah[0]+"s";
            processApi($url,$method,$apikey,$accesstoken,$model);
           
        });

        $('.test').on('click',function(){
            const test=$('#body').val();
            const obj = JSON.parse(test);
            const propertyname=Object.keys(obj);
            const propertyvalue=Object.values(obj);
            for(i=0;i<propertyname.length;i++){
                var a = propertyname[i]+' : '+propertyvalue[i];
            }
            console.log(a);
            console.log(obj);

        });


        function processApi($url,$method,$apikey,$accesstoken,$model){
            $('.hasil').html('Loading . . .');
            let content='';
            var isibody=$('#body').val();
            if (isibody != ''){
            var obj = JSON.parse(isibody);
            }else{
                obj="";
            }
            $.ajax({
                url:"http://gcdwebservice.herokuapp.com/api/"+$url,
		        type:$method,
                dataType: 'json',
                headers:{  
                    apikey:$apikey,
                    accessToken:$accesstoken
                },
                data:
                    obj
                ,
                success:function(result){
                if(result.status == 0){
                    $('.hasil').html(result.message);  
                }else{
                    if(result.data != ''){
                    var isidata=result.data[''+$model+''];
                    $.each(isidata,function(i,data){
                        content+=`
                        `+JSON.stringify(data)+`
                        `;
                        
                    });
                    if(content !=''){
			            $('.hasil').html(`<textarea class="form-control" rows="`+isidata.length+`">`+content+`</textarea>`);
		                	}
			            else{
			            $('.hasil').html('Data belum Ada');
			            }
                    }
                    else{
                        $('.hasil').html(result.message); 
                    }
                }

                },
                error:function(){
                    $('.hasil').html('Failed, open inspect browser to see the message');
                }
            })

        } 

        $(document).ready(function(){
	        
        });



    </script>
</body>
</html>
