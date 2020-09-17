@extends('layouts.frontend')
@section('styles')

@endsection


@section('content')
    <div class="container" id="app">
        <h1>@{{title}}</h1>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script type="text/javascript">
        new Vue({
            el:'#app',
            data:{
                title: "New Movie App",
                articles:''
            }, 

            created(){
                var self = this;
                let pageNumber = 1;
                var settings = {
                    "async":true,
                    "crossDomain": true, 
                    'url':'https://api.themoviedb.org/3/movie/popular?api_key=c&language=en-US&page=1'+pageNumber,
                    "method": "GET",
                    "headers": {
                        "content-type":"application/json;charset=utf-8",
                        "authorization":"Bearer "
                    }, 
                    "processData":false,
                    "data": "{}"
                }
                $.ajax(settings).done(function (response) {
                    self.articles = response.results;
                    console.log(self.articles);
                });
            }
        })
    </script>
@endsection



