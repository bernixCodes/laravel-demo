<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Erns | Home</title>
</head>
<body>
    @auth
    <p>You are logged in </p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>
    <div style="border:3px solid black; margin-top:10px">
        <h2>Create a New Post</h2>
        <form action="/create-post" method="POST" >
            @csrf
            <input type="text" name="title" placeholder="post title"/>
            <textarea name="body" placeholder="post content..."></textarea>
            <button>Save Post</button>
        </form>
    </div>

    <div style="border:3px solid black; margin-top:10px">
        <h2>All Posts</h2>
        @foreach ($posts as $post)
            <div style="background-color: gray; padding: 10px; margin: 10px">
                <h3>{{$post->title}} <span style="font-size: 12px">by {{$post->user->name}}</span></h3>
                {{$post->body}}
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>

                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endforeach
    </div>
        
        @else
        <div style="border:3px solid black;">
            <h1>Register</h1>
    
            <form action="/register" method="POST" style=" margin: 10px">
                @csrf
                <input type="text" name="name" placeholder="name"/>
                <input type="text" name="email" placeholder="email"/>
                <input type="password" name="password" placeholder="password"/>
                <button>Register</button>
            </form>
        </div>

        <div style="border:3px solid black; margin-top: 10px">
            <h1>Login</h1>
    
            <form action="/login" method="POST" style=" margin: 10px">
                @csrf
                <input type="text" name="loginName" placeholder="name"/>
                <input type="password" name="loginPassword" placeholder="password"/>
                <button>Login</button>
            </form>
        </div>
    @endauth
   
</body>
</html>
