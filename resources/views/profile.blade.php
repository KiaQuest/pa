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



<script src="https://code.jquery.com/jquery-1.10.2.js"></script>


<div id="demo">
    <h2>The XMLHttpRequest Object</h2>
    <button type="button" onclick="check_follow()">Change Content</button>
</div>

<script>

    function check_follow() {
        // Karşi adamin ID'si
        const id = 3;

        $.ajax({
            url: "http://127.0.0.1:8000/check_follow/"+id,
            type: 'GET',
            success: function(response) {
                // Handle successful response
                var data = JSON.parse(response);
                console.log(data.follow);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Error:', error);
            }
        });

    }
</script>
