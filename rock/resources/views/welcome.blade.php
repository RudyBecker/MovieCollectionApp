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
                    'url':'https://api.themoviedb.org/3/movie/popular?api_key=d1da20fbfa65312b857fb7b517bf855c&language=en-US&page=1'+pageNumber,
                    "method": "GET",
                    "headers": {
                        "content-type":"application/json;charset=utf-8",
                        "authorization":"Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMWRhMjBmYmZhNjUzMTJiODU3ZmI3YjUxN2JmODU1YyIsInN1YiI6IjVmNjJlMGI2MWJmMjY2MDAzYWU0Njg3NCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.j-vJcybvOcmdwWH5_ZX1VQ7j38XFJJP2jZH9pXSzxmA"
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



