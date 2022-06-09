<center>
    <a href="{{route('Page.home')}}">Logout |</a> 
    <a href="{{route('User.dashboard')}}"> Dashboard |</a> 
    <a href="{{route('User.details',['id'=>$value = session('c_id')])}}"> Details </a> 
</center>
