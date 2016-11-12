<form action="{{url('/search')}}" method="POST">
    {!! csrf_field() !!}
    <input type="text" name="keyword" />
    <input type="submit" value="search" />
</form>