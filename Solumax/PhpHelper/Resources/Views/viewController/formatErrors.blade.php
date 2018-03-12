<!DOCTYPE html>
<html>

<head>
    <title>Error</title>
</head>

<body>
    @foreach($viewData['errors'] as $error) @if(isset($error['type']) && $error['type'] == 'confirm')
    <script type="text/javascript">
    if (confirm("{{ $error['text'] }}")) {

        if (window.location.href.indexOf('?') != false) {
            window.location.href = window.location.href + '&' + "{{ $error['if_confirmed'] }}" + '=true'
        } else {
            window.location.href = window.location.href + '?' + "{{ $error['if_confirmed'] }}" + '=true'
        }
    }
    </script>
    <p>{{ $error['text'] }}</p>
    @else
    <p>{{ $error }}</p>
    @endif @endforeach
</body>

</html>
\
