@extends('layout')


@section('content')
<style>
    .alert.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    padding: 15px;
    border-radius: 5px;
}

</style>
<br><br><br>

<center>
    <form action="/accounts" method="POST" class="authenticate-middle-wrapper" id="registration-form">
        @csrf
        <h1>Setup Your Account For Free...</h1>
        <div class="customer-dash">
            <input type="hidden" name="customer_role" value="customer">
        </div>
         <!-- Display validation errors -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" placeholder="Names"><br><br>
        <label for="username">Phone Number</label><br>
        <input type="text" name="username" id="username" placeholder="Phone Number"><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" placeholder="Password"><br><br>
        <button type="submit">Register</button>
        <p><a href="/login">Back to Login</a></p><br><br>
    </form>

    <script>
        document.getElementById('registration-form').addEventListener('submit', function(event) {
            var name = document.getElementById('name').value.trim();
            var username = document.getElementById('username').value.trim();
            var password = document.getElementById('password').value;
        
            // Regular expression to validate username (letters only)
            var usernamePattern = /^[A-Za-z]+$/;
            // Regular expression to validate phone number
            var phonePattern = /^(07|06)\d{8}$/;
        
            // Validation checks
            if (name === "") {
                alert('Name cannot be empty');
                event.preventDefault();
                return;
            }
        
            if (username === "") {
                alert('Phone number cannot be empty');
                event.preventDefault();
                return;
            }
        
            if (!usernamePattern.test(name)) {
                alert('Username should only contain letters');
                event.preventDefault();
                return;
            }
        
            if (!phonePattern.test(username)) {
                alert('Phone number must start with 07 or 06 and be 10 digits long');
                event.preventDefault();
                return;
            }
        
            if (password.length < 8) {
                alert('Password must be at least 8 characters long');
                event.preventDefault();
                return;
            }
        });
        </script>

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
