<h1> this is profile page </h1>

<p> followers 0  -  following 0 </p>


@if($check == 0)
<form action="{{route('profile.follow')}}" method="post">

    @csrf
    <button type="submit">Follow</button>
</form>
@elseif($check == 1)
<form action="{{route('profile.unfollow')}}" method="post">

    @csrf
    <button type="submit">unFollow</button>
</form>
@endif


{{--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{--<meta name="csrf-token" content="{{ Session::token() }}">--}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<div id="demo">
    <h2>The XMLHttpRequest Object</h2>
    <button type="button" onclick="check_follow()">Change Content</button>
</div>

<script>

    function check_follow() {


        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        //
        // $.ajax({
        //     url: 'http://127.0.0.1:8000/check_follow/3',
        //     method: 'post',
        //     data: $('#form-id').serialize(), // prefer use serialize method
        //     success:function(data){
        //         console.log(data);
        //     }
        // });
        //
        // return;
        // Karşi adamin ID'si
        const id = 3;


        // $.ajaxSetup({
        //     headers: {'X-CSRF-Token': $('#_token').val()}
        // });

        $.ajax({
            url: "http://127.0.0.1:8000/check_follow/"+id,
            type: 'GET',
            success: function(response) {
                // Handle successful response
                var data = JSON.parse(response);
                console.log(data.follow);
                const check = data.follow;
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Error:', error);
            }
        });

    }

    // window.onload = check_follow();
    // if(check == true){
    //     console.log('ssdsd');
    // }
</script>
