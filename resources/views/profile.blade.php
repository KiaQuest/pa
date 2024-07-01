<h1>
    this is profile page

</h1>

<p>
    followers 0
</p>
<p>
    following 0
</p>

<form action="{{route('profile.follow')}}" method="post">

    @csrf
    <button type="submit">Follow</button>
</form>
<form action="{{route('profile.unfollow')}}" method="post">

    @csrf
    <button type="submit">unFollow</button>
</form>
