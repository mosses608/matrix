@extends('layout')


@section('content')
<br><br><br>

<center>
    <form action="/accounts" method="POST" class="authenticate-middle-wrapper">
        @csrf
        <h1>Setup Your Account For Free...</h1>
        <div class="customer-dash">
            <input type="hidden" name="customer_role" id="" value="customer">
        </div>
        <label for="">Name</label><br>
        <input type="text" name="name" id="" placeholder="Names"><br><br>
        <label for="">Phone Number</label>
        <br>
        <input type="text" name="username" id="" placeholder="Phone Number"><br><br>
        <label for="">Password</label><br>
        <input type="password" name="password" id="" placeholder="Password"><br><br>
        <button type="submit">Register</button></span> <p><a href="/login">Back to Login</a></p><br><br>
    </form>

    <script>
        const role_select=document.querySelector('.role-select');

        role_select.addEventListener('change', function(){
            const selectValue=role_select.value;
            document.querySelector('.customer-dash').style.display='none';
            document.querySelector('.business-dash').style.display='none';

            if(selectValue === 'Customer'){
                document.querySelector('.customer-dash').style.display='block';
            }else if(selectValue === 'Business'){
                document.querySelector('.business-dash').style.display='block';
            }
        });
    </script>
</center>

@endsection
