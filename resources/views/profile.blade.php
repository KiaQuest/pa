<h1> this is profile page </h1>

<p> followers 0  -  following 0 </p>


{{--@if($check == 0)--}}
{{--<form action="{{route('profile.follow')}}" method="post">--}}

{{--    @csrf--}}
{{--    <input type="hidden" name="follower_id" value="5">--}}
{{--    <button type="submit">Follow</button>--}}
{{--</form>--}}
{{--@elseif($check == 1)--}}
{{--<form action="{{route('profile.unfollow')}}" method="post">--}}

{{--    @csrf--}}
{{--    <input type="hidden" name="follower_id" value="5">--}}
{{--    <button type="submit">unFollow</button>--}}
{{--</form>--}}
{{--@endif--}}



{{--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{--<meta name="csrf-token" content="{{ Session::token() }}">--}}
<meta name="csrf-token" content="{{ csrf_token() }}">
1.5
<form id="ajaxForm">
    @csrf
    <div id="button">

        <label for="name">Name:</label>
        <input type="text" id="name1" name="follower_id" value="5">
        <input type="text" id="name2" name="follow" value="0">
        <br>
        <button type="submit" id="followButton">Submit</button>

    </div>
</form>

<div id="responseMessage"></div>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#ajaxForm').on('submit', function (e) {
            e.preventDefault();

            let followInput = document.getElementById('name2');
            let SubmitButton = document.getElementById('followButton');
            // document.getElementById('button').style.display = 'none';
            let follow = followInput.getAttribute("value");
            // if(follow == 0){
            //     followInput.setAttribute("value", "1");
            //     // SubmitButton.innerHTML = 'unFollow';
            // }else if(follow == 1){
            //     followInput.setAttribute("value", "0");
            //     // SubmitButton.innerHTML = 'Follow';
            // }
            console.log(follow);
            console.log('follow');

            $.ajax({
                type: 'POST',
                url: '{{route('profile.follow')}}',
                data: $(this).serialize(),
                success: function (response) {
                    $('#responseMessage').html('<p>' + response.success + '</p>');
                },
                error: function (response) {
                    $('#responseMessage').html('<p>An error occurred</p>');
                }
            });
        });
    });
</script>

2

{{--<form action="http://127.0.0.1:8000/check_follow" method="post">--}}

{{--    <input type="text" name="yes" id="" value="okay">--}}
{{--    @csrf--}}
{{--    <button type="submit">Go</button>--}}
{{--</form>--}}
2.5
<script>
    function convertCurrency() {

        var fromCurrency = document.getElementById('select1').value;
        var toCurrency = document.getElementById('select2').value;
        var amount = document.getElementById('value').value;

        fetch("google.com", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                _token: "{{ csrf_token() }}",
                from: fromCurrency,
                to: toCurrency,
                value: amount,
            }),
        })
            .then(response => response.json())
            .then(data => {
                // Handle the server response
                if (data.status === 1) {
                    // Update the result in the HTML
                    document.getElementById('resultConvert').innerText = 📈: ${data.res};
                } else {
                    // Handle the error
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

</script>
3
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
