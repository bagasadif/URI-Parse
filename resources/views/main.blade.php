<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>URI Parser</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('mdb/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('mdb/css/mdb.min.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Content -->
    <br><br>
    <div class="container text-break">
        <h2 class="text-center">URI Parser</h2>

        <form method="post" action="{{route('parse')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="uri">
                    <h5>URI</h5>
                </label>
                <input type="url" class="form-control" id="uri" minlength="1" required name="uri" rows="3" @isset ($uri) value="{{$uri}}" @endisset></input>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>

        <br>
        @isset ($parse_uri)
        <h5>Parse Result:</h5>
        <table class="table table-bordered text-center" style="font-size:medium;">
            <tbody>
                @isset($parse_uri['scheme'])
                <tr>
                    <td>Scheme</td>
                    <td>{{$parse_uri['scheme']}}</td>
                </tr>
                @endisset

                @isset($parse_uri['host'])
                <tr>
                    @php
                    $authority = $parse_uri['host'];

                    if(array_key_exists('port', $parse_uri))
                    $authority .= ':'.$parse_uri['port'];

                    if(array_key_exists('user', $parse_uri))
                    $user_info = $parse_uri['user'];

                    if(array_key_exists('pass', $parse_uri))
                    $user_info .= ':'.$parse_uri['pass'];
                    
                    if(array_key_exists('user', $parse_uri))
                    $authority = $user_info.'@'.$authority
                    @endphp

                    <td>Authority</td>
                    <td>{{$authority}}</td>
                </tr>

                <tr>
                    <td>Host </td>
                    <td>{{$parse_uri['host']}}</td>
                </tr>
                @endisset

                @isset($parse_uri['port'])
                <tr>
                    <td>Port </td>
                    <td>{{$parse_uri['port']}}</td>
                </tr>
                @endisset

                @isset($parse_uri['user'])
                <tr>
                    <td>Username </td>
                    <td>{{$parse_uri['user']}}</td>
                </tr>
                @endisset

                @isset($parse_uri['pass'])
                <tr>
                    <td>Password </td>
                    <td>{{$parse_uri['pass']}}</td>
                </tr>
                @endisset

                @isset($parse_uri['path'])
                <tr>
                    <td>Path</td>
                    <td>{{$parse_uri['path']}}</td>
                </tr>
                @endisset

                @isset($parse_uri['query'])
                <tr>
                    <td>Query</td>
                    <td>{{$parse_uri['query']}}</td>
                </tr>
                @endisset

                @isset($parse_uri['fragment'])
                <tr>
                    <td>Fragment </td>
                    <td> {{$parse_uri['fragment']}}</td>
                </tr>
                @endisset
            </tbody>
        </table>
        @endisset
    </div>
    <br>
    <!-- Content -->

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2022 Copyright. Bagas Adi Firdaus.
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('mdb/js/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('mdb/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('mdb/js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('mdb/js/mdb.min.js') }}"></script>
</body>

</html>